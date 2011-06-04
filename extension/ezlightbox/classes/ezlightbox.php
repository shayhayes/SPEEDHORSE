<?php
//
// Created on: <2007-11-21 13:01:28 ab>
//
// SOFTWARE NAME: eZ Lightbox extension for eZ Publish
// SOFTWARE RELEASE: 0.x
// COPYRIGHT NOTICE: Copyright (C) 1999-2010 eZ Systems AS
// SOFTWARE LICENSE: GNU General Public License v2.0
// NOTICE: >
//   This program is free software; you can redistribute it and/or
//   modify it under the terms of version 2.0  of the GNU General
//   Public License as published by the Free Software Foundation.
//
//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//
//   You should have received a copy of version 2.0 of the GNU General
//   Public License along with this program; if not, write to the Free
//   Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
//   MA 02110-1301, USA.
//
//

require_once( 'autoload.php' );

class eZLightbox extends eZPersistentObject
{

    const ERROR_NOT_FOUND        = 1;
    const ERROR_ACCESS_DENIED    = 2;
    const ERROR_OPERATION_FAILED = 3;

    const PREFERENCE_CURRENT_LIGHTBOX = 'currentLightboxID';
    const PREFERENCE_SESSION_HASHKEY  = 'lightboxSessionKey';

    const MOVE_DIRECTION_UP   = 0;
    const MOVE_DIRECTION_DOWN = 1;

    const CLEANUP_OWNER_ACTION_REMOVE  = 11;
    const CLEANUP_OWNER_ACTION_REPLACE = 12;

    private static $__lightbox_cache      = array( 'object' => array(), 'array' => array() ),
                   $__function_list       = null,
                   $__function_access_map = array( 'view'  => eZLightboxAccess::VIEW,
                                                   'edit'  => eZLightboxAccess::EDIT,
                                                   'grant' => eZLightboxAccess::GRANT,
                                                   'add'   => eZLightboxAccess::ADD,
                                                   'send'  => eZLightboxAccess::SEND,
                                                 );


    private $__permissions = array();

    function __construct( $row = array() )
    {
        $this->eZPersistentObject( $row );
    }

    public static function removeSessionVariable()
    {
        if ( isset( $_SESSION ) )
        {
            $http = eZHTTPTool::instance();
            if ( $http instanceof eZHTTPTool )
            {
                $http->removeSessionVariable( eZLightbox::PREFERENCE_SESSION_HASHKEY );
            }
            else
            {
                eZDebug::writeWarning( 'Failed to get eZHTTPTool instance to remove session variable.', __METHOD__ );
            }
        }
    }

    public static function generatePermissionFunctionList()
    {
        if ( eZLightbox::$__function_list !== null )
        {
            return eZLightbox::$__function_list;
        }

        $TypeID = array( 'name' => 'Type' );

        foreach ( eZLightboxObjectItem::itemsByIDAndType() as $itemType )
        {
            $TypeID['values'][] = array( 'Name'  => $itemType['name'],
                                         'value' => $itemType['id']
                                       );
        }

        $ClassID = array(
            'name'      => 'Class',
            'values'    => array(),
            'path'      => 'classes/',
            'file'      => 'ezcontentclass.php',
            'class'     => 'eZContentClass',
            'function'  => 'fetchList',
            'parameter' => array( 0, false, false, array( 'name' => 'asc' ) )
        );

        $Owner = array(
            'name'   => 'Owner',
            'values' => array( array( 'Name'  => 'Self',
                                      'value' => '1'
                                    ),
                               array( 'Name'  => 'Granted',
                                      'value' => '2'
                                    )
                             )
        );

        eZLightbox::$__function_list = eZLightbox::getLightboxItemPermissionFunctionList();
        eZLightbox::$__function_list['add']['Owner']   = $Owner;
        eZLightbox::$__function_list['add']['Type']    = $TypeID;
        eZLightbox::$__function_list['edit']['Owner']  = $Owner;
        eZLightbox::$__function_list['view']['Owner']  = $Owner;
        eZLightbox::$__function_list['send']['Owner']  = $Owner;
        eZLightbox::$__function_list['grant']['Owner'] = $Owner;
        return eZLightbox::$__function_list;
    }

    private static function getLightboxItemPermissionFunctionList()
    {
        $FunctionList = array();
        foreach ( array( 'add', 'create', 'edit', 'view', 'send', 'grant' ) as $functionName )
        {
            $FunctionList[$functionName] = array();
            foreach ( eZLightboxObjectItem::itemsByID() as $itemID => $itemObject )
            {
                $result = $itemObject->getPermissionFunctionListByName( $functionName );
                if ( $result !== false && is_array( $result ) )
                {
                    foreach ( $result as $index => $configuration )
                    {
                        foreach ( $configuration as $limitationName => $limitationConfiguration )
                        {
                            if ( isset( $limitationConfiguration['name'] ) )
                            {
                                $newLimitationName = $itemObject->getItemType() . '_' . $limitationConfiguration['name'];
                                $limitationConfiguration['name'] = $newLimitationName;
                                $FunctionList[$functionName][$newLimitationName] = $limitationConfiguration;
                            }
                        }
                    }
                }
            }
        }
        return $FunctionList;
    }

    public static function cleanUp( $ownerNotFoundAction, $ownerID = false )
    {
        switch ( $ownerNotFoundAction )
        {
            case eZLightbox::CLEANUP_OWNER_ACTION_REMOVE:
            {
                eZDebug::writeDebug( 'Removing lightboxes having invalid owners.', __METHOD__ );
            }
            break;
            case eZLightbox::CLEANUP_OWNER_ACTION_REPLACE:
            {
                $userObject = null;
                if ( $ownerID === false )
                {
                    $userObject = eZUser::fetchByName( 'admin' );
                }
                else
                {
                    $userObject = eZUser::fetch( (int)$ownerID );
                }
                if ( !is_object( $userObject ) )
                {
                    eZDebug::writeWarning( 'Failed to fetch user with ID ' . $ownerID, __METHOD__ );
                    return false;
                }
                eZDebug::writeDebug( 'Replacing owner of lightboxes having invalid owners with new owner ID: ' . $ownerID, __METHOD__ );
            }
            break;
            default:
            {
                eZDebug::writeWarning( 'Invalid action if owner is not found: ' . $ownerNotFoundAction, __METHOD__ );
                return false;
            }
            break;
        }
        $result = array( 'lightbox' => array( 'removed' => array(), 'skipped' => array(), 'changed' => array() ) );
        $query  = 'SELECT id FROM ezlightbox WHERE owner_id NOT IN ( SELECT contentobject_id FROM ezuser )';
        $db     = eZDB::instance();
        $invalidLightboxIDList = $db->arrayQuery( $query );
        if ( is_array( $invalidLightboxIDList ) && count( $invalidLightboxIDList ) > 0 )
        {
            foreach ( $invalidLightboxIDList as $invalidLightboxIDItem )
            {
                $lightboxObject = eZLightbox::fetch( $invalidLightboxIDItem['id'] );
                if ( !is_object( $lightboxObject ) )
                {
                    eZDebug::writeWarning( 'Failed to fetch lightbox with ID ' . $invalidLightboxIDItem['id'] . '. Skipping.', __METHOD__ );
                    $result['lightbox']['skipped'][] = $invalidLightboxIDItem['id'];
                }
                switch ( $ownerNotFoundAction )
                {
                    case eZLightbox::CLEANUP_OWNER_ACTION_REMOVE:
                    {
                        $db->begin();
                        $lightboxObject->purge();
                        $db->commit();
                        $result['lightbox']['removed'][] = $invalidLightboxIDItem['id'];
                    }
                    break;
                    case eZLightbox::CLEANUP_OWNER_ACTION_REPLACE:
                    {
                        $db->begin();
                        $lightboxObject->setAttribute( 'owner_id', $ownerID );
                        $lightboxObject->store();
                        $db->commit();
                        $result['lightbox']['changed'][] = $invalidLightboxIDItem['id'];
                    }
                    break;
                }
            }
        }
        return $result;
    }

    public static function definition()
    {
        return array( 'fields'              => array( 'id'           => array( 'name'     => 'ID',
                                                                               'datatype' => 'integer',
                                                                               'default'  => 0,
                                                                               'required' => true
                                                                             ),
                                                      'owner_id'     => array( 'name'              => 'Owner',
                                                                               'datatype'          => 'integer',
                                                                               'default'           => 0,
                                                                               'required'          => true,
                                                                               'foreign_class'     => 'eZUser',
                                                                               'foreign_attribute' => 'id',
                                                                               'multiplicity'      => '1..*'
                                                                             ),
                                                      'created'      => array( 'name'     => 'Created',
                                                                               'datatype' => 'integer',
                                                                               'default'  => 0,
                                                                               'required' => true
                                                                             ),
                                                      'name'         => array( 'name'     => 'Name',
                                                                               'datatype' => 'string',
                                                                               'default'  => '',
                                                                               'required' => true
                                                                             ),
                                                      'external_id'  => array( 'name'     => 'ExternalID',
                                                                               'datatype' => 'string',
                                                                               'default'  => '',
                                                                               'required' => false
                                                                             )
                                                    ),
                      'function_attributes' => array( 'is_owner'             => 'isOwner',
                                                      'owner'                => 'owner',
                                                      'item_count'           => 'fetchItemListCount',
                                                      'itemlist'             => 'fetchItemList',
                                                      'item_id_list'         => 'fetchItemIDList',
                                                      'can_edit'             => 'canEdit',
                                                      'can_view'             => 'canView',
                                                      'can_send'             => 'canSend',
                                                      'can_grant'            => 'canGrant',
                                                      'access_list'          => 'fetchAccessList',
                                                      'access_keys'          => 'fetchAccessKeys',
                                                      'access_object'        => 'fetchAccessObject',
                                                      'item_move_directions' => 'itemMoveDirections'
                                                    ),
                      'keys'                => array( 'id' ),
                      'increment_key'       => 'id',
                      'sort'                => array ( 'name' => 'desc' ),
                      'class_name'          => 'eZLightbox',
                      'name'                => 'ezlightbox' );
    }

    public static function itemMoveDirections()
    {
        return array( eZLightbox::MOVE_DIRECTION_UP   => ezi18n( 'class/ezlightbox/itemMoveDirections', 'Up'  ),
                      eZLightbox::MOVE_DIRECTION_DOWN => ezi18n( 'class/ezlightbox/itemMoveDirections', 'Down' )
                    );
    }

    public static function itemMoveDirectionsByName( $directionName )
    {
        switch ( strtolower( trim( $directionName ) ) )
        {
            case 'up':
                return eZLightbox::MOVE_DIRECTION_UP;
            case 'down':
                return eZLightbox::MOVE_DIRECTION_DOWN;
            default:
                eZDebug::writeWarning( 'Unkown direction name "' . $directionName . '". Should be one of "up" or "down".' );
                return null;
        }
    }

    public static function createSessionKey( $userID )
    {
        $user        = eZUser::fetch( $userID );
        $hashArray   = array( $userID );
        $hashArray[] = eZPreferences::value( eZLightbox::PREFERENCE_CURRENT_LIGHTBOX );

        // AB: Problem, what happens if there are some limitations?
        $accessArray = $user->hasAccessTo( 'lightbox', 'create' );
        if ( isset( $accessArray['accessWord'] ) )
        {
            $hashArray[] = $accessArray['accessWord'];
        }
        $lightboxes   = eZLightbox::fetchListByUser( $userID );
        foreach ( $lightboxes as $lightbox )
        {
            $hashArray[] = $lightbox->attribute( 'name' ) . '_' . $lightbox->fetchItemListCount();
        }
        $hashString = implode( ',', $hashArray );
        if ( function_exists( 'hash' ) )
        {
            $hashString = hash( 'md5', $hashString );
        }
        else
        {
            eZDebug::writeError( 'There is not function "hash". Make sure hash support is compiled into PHP.', __METHOD__ );
        }
        $http = eZHTTPTool::instance();
        $http->setSessionVariable( eZLightbox::PREFERENCE_SESSION_HASHKEY, $hashString );
        return $hashString;
    }

    public static function canCreate()
    {
        $allowed    = false;
        $userObject = eZUser::currentUser();
        if ( is_object( $userObject ) )
        {
            $accessResults = $userObject->hasAccessTo( 'lightbox' , 'create' );
            if ( !$accessResults || !array_key_exists( 'accessWord', $accessResults ) )
            {
                eZDebug::writeWarning( 'Failed to get permissions.',
                                       'eZLightbox::canCreate' );
            }
            else if ( $accessResults['accessWord'] == 'yes' )
            {
                $allowed = true;
            }
        }
        else
        {
            eZDebug::writeWarning( 'Failed to get current user.',
                                   'eZLightbox::canCreate' );
        }
        return $allowed;
    }

    public static function fetch( $id, $asObject = true )
    {
        $cacheKey = 'object';
        if ( !$asObject )
        {
            $cacheKey = 'array';
        }
        eZLightbox::$__lightbox_cache =& $GLOBALS['eZLighboxIDCache'];
        if ( isset( eZLightbox::$__lightbox_cache[ $cacheKey ][ $id ] ) )
        {
            return eZLightbox::$__lightbox_cache[ $cacheKey ][ $id ];
        }
        $conditions       = array( 'id' => array( '=', $id  ) );
        $persistentObject =  eZPersistentObject::fetchObject( eZLightbox::definition(),
                                                              null,
                                                              $conditions,
                                                              $asObject
                                                            );
        if ( (  $asObject && is_object( $persistentObject ) ) ||
             ( !$asObject && is_array( $persistentObject ) )
           )
        {
            eZLightbox::$__lightbox_cache[ $cacheKey ][ $id ] = $persistentObject;
            return $persistentObject;
        }
        eZDebug::writeError( 'Cannot fetch lightbox with ID ' . $id . '.', 'eZLightbox::fetch' );
        return false;
    }

    public static function fetchListByUser( $userID, $asObject = true, $countOnly = false, $sortBy = false,
                                            $offset = false, $limit = false, $otherMasks = array()
                                          )
    {
        $otherLightboxIDs = array();
        $otherLightboxes  = eZLightboxAccess::fetchListByUser( $userID, false, false, false, false, false, $otherMasks );
        if ( is_array( $otherLightboxes ) && count( $otherLightboxes ) > 0 )
        {
            foreach ( $otherLightboxes as $otherLightbox )
            {
                $otherLightboxIDs[] = $otherLightbox['lightbox_id'];
            }
        }
        $custom_fields     = array();
        $custom_conditions = ' WHERE owner_id=' . $userID;
        if ( count( $otherLightboxIDs ) > 0 )
        {
            $custom_conditions .= ' OR id IN (' . implode( ',', $otherLightboxIDs ) . ')';
        }
        $custom_tables     = null;
        //$conditions    = array( 'owner_id' => array( '=', $userID  ) );
        if ( $countOnly )
        {
            $rows = eZPersistentObject::fetchObjectList( eZLightbox::definition(),                      // Definition
                                                         array(),                                       // Field filters
                                                         null,                                          // Conditions
                                                         null,                                          // Sorting
                                                         null,                                          // Limit
                                                         false,                                         // As object
                                                         false,                                         // Grouping
                                                         array( array( 'operation' => 'count( id )',
                                                                       'name'      => 'count'
                                                                     )
                                                              ),
                                                         $custom_tables,
                                                         $custom_conditions
                                                       );
            return $rows[0]['count'];
        }
        else
        {
            $limitations = null;
            if ( $offset != false && $limit != false )
            {
                $limitations = array( 'offset' => $offset,
                                      'length' => $limit
                                    );
            }
            if ( $sortBy == false )
            {
                $sortBy = null;
            }
            $rows = eZPersistentObject::fetchObjectList( eZLightbox::definition(),                      // Definition
                                                         null,                                          // Field filers
                                                         null,                                          // Conditions
                                                         $sortBy,                                       // Sorting
                                                         $limitations,                                  // Limit
                                                         $asObject,                                     // As object
                                                         false,                                         // Grouping
                                                         false,
                                                         $custom_tables,
                                                         $custom_conditions
                                                       );
            return $rows;
        }
    }

    public static function fetchOwnListByUser( $userID, $asObject = true, $countOnly = false, $sortBy = false,
                                               $offset = false, $limit = false
                                             )
    {
        $conditions = array( 'owner_id' => array( '=', $userID  ) );
        if ( $countOnly )
        {
            $rows = eZPersistentObject::fetchObjectList( eZLightbox::definition(),                      // Definition
                                                         array(),                                       // Field filters
                                                         $conditions,                                   // Conditions
                                                         null,                                          // Sorting
                                                         null,                                          // Limit
                                                         false,                                         // As object
                                                         false,                                         // Grouping
                                                         array( array( 'operation' => 'count( id )',
                                                                       'name'      => 'count'
                                                                     )
                                                              )
                                                       );
            return $rows[0]['count'];
        }
        else
        {
            $limitations = null;
            if ( $offset != false && $limit != false )
            {
                $limitations = array( 'offset' => $offset,
                                      'length' => $limit
                                    );
            }
            if ( $sortBy == false )
            {
                $sortBy = null;
            }
            $rows = eZPersistentObject::fetchObjectList( eZLightbox::definition(),                      // Definition
                                                         null,                                          // Field filers
                                                         $conditions,                                   // Conditions
                                                         $sortBy,                                       // Sorting
                                                         $limitations,                                  // Limit
                                                         $asObject
                                                       );
            return $rows;
        }
    }

    public static function create( $name, $userID = false, $storeLightbox = true )
    {
        $user_id = $userID;
        if ( $userID == false )
        {
            $user    = eZUser::currentUser();
            $user_id = $user->attribute( 'contentobject_id' );
        }

        $lightboxObject = new eZLightbox( array( 'name'     => $name,
                                                 'owner_id' => $user_id,
                                                 'created'  => time()
                                               )
                                        );
        if ( is_object( $lightboxObject ) )
        {
            if ( $storeLightbox )
            {
                $lightboxObject->store();
            }
        }
        else
        {
            $lightboxObject = null;
        }
        return $lightboxObject;
    }

    public function store( $fieldFilters = null )
    {
        eZLightbox::removeSessionVariable();
        parent::store( $fieldFilters );
    }

    public function moveItem( $direction, $itemID, $typeID = false )
    {
        if ( !in_array( $direction, array( eZLightbox::MOVE_DIRECTION_UP, eZLightbox::MOVE_DIRECTION_DOWN ) ) )
        {
            eZDebug::writeWarning( 'Direction ' . $direction . ' not supported to move item with ID ' . $itemID . ' of type ' . $typeID,
                                   'eZLightbox::moveItem'
                                 );
            return false;
        }
        $result         = false;
        $objectIndex    = -1;
        $itemObjectList = $this->fetchItemList( $typeID );
        foreach ( $itemObjectList as $itemIndex => $itemObject )
        {
            $itemObject->setAttribute( 'priority', $itemIndex );
            if ( $itemObject->attribute( 'item_id' ) == $itemID )
            {
                $objectIndex = $itemIndex;
            }
        }
        if ( $objectIndex != -1 )
        {
            $result = true;
            if ( ( $objectIndex == 0                            && $direction == eZLightbox::MOVE_DIRECTION_UP   ) ||
                 ( $objectIndex == count( $itemObjectList ) - 1 && $direction == eZLightbox::MOVE_DIRECTION_DOWN )
            )
            {
                eZDebug::writeWarning( 'Item with ID ' . $itemID . ' of type ' . $typeID . ' does not need to be moved.',
                                       'eZLightbox::moveItem'
                                     );
            }
            else if ( $direction == eZLightbox::MOVE_DIRECTION_UP )
            {
                $itemObjectList[$objectIndex - 1]->setAttribute( 'priority', $objectIndex );
                $itemObjectList[$objectIndex]->setAttribute( 'priority', $objectIndex - 1 );
            }
            else if ( $direction == eZLightbox::MOVE_DIRECTION_DOWN )
            {
                $itemObjectList[$objectIndex + 1]->setAttribute( 'priority', $objectIndex );
                $itemObjectList[$objectIndex]->setAttribute( 'priority', $objectIndex + 1 );
            }
            else
            {
                $result = false;
            }
        }
        else
        {
            eZDebug::writeWarning( 'Item with ID ' . $itemID . ' of type ' . $typeID . ' not found in lightbox with ID ' . $this->attribute( 'id' ),
                                   'eZLightbox::moveItem'
                                 );
        }
        foreach ( $itemObjectList as $itemObject )
        {
            $itemObject->store();
        }
        return $result;
    }

    public function fetchItemList( $typeID = false, $asObject = true, $offset = false, $limit = false )
    {
        return eZLightboxObject::fetchListByLightbox( $this->attribute( 'id' ), $typeID, $asObject );
    }

    public function fetchItemListCount( $typeID = false )
    {
        return eZLightboxObject::fetchListByLightbox( $this->attribute( 'id' ), $typeID, false, true );
    }

    public function fetchAccessList( $asObject = true, $offset = false, $limit = false )
    {
        return eZLightboxAccess::fetchListByLightbox( $this->attribute( 'id' ), $asObject );
    }

    public function fetchAccessKeys()
    {
        return eZLightboxAccess::accessKeys();
    }

    public function fetchAccessObject()
    {
        if ( !$this->isOwner() )
        {
            $accessObject = eZLightboxAccess::fetch( $this->attribute( 'id' ), eZUser::currentUserID() );
            return $accessObject;
        }
        return null;
    }

    public function fetchItemIDList( $typeID = false )
    {
        return eZLightboxObject::fetchLightboxItemIDs( $this->attribute( 'id' ), $typeID );
    }

    public function lightboxContains( $itemID, $typeID )
    {
        $object = eZLightboxObject::fetch( $this->attribute( 'id' ), $itemID, $typeID );
        if ( is_object( $object ) )
        {
            return $object;
        }
        return null;
    }

    public function addToLightbox( $itemID, $typeID )
    {
        $newObject = $this->lightboxContains( $itemID, $typeID );
        if ( !is_object( $newObject ) )
        {
            $db = eZDB::instance();
            $db->begin();
            $newObject = eZLightboxObject::create( $this->attribute( 'id' ), $itemID, $typeID );
            if ( is_object( $newObject ) )
            {
                eZLightbox::removeSessionVariable();
                $newObject->store();
                $db->commit();
            }
            else
            {
                $db->commit();
                $newObject = null;
            }
        }
        return $newObject;
    }

    public function removeFromLightbox( $itemID, $typeID )
    {
        $object = $this->lightboxContains( $itemID, $typeID );
        if ( is_object( $object ) )
        {
            eZLightbox::removeSessionVariable();
            $object->purge();
            return true;
        }
        else
        {
            eZDebug::writeWarning( 'This lightbox does not contain an item of type ' . $typeID . ' with ID ' . $objectID,
                                   'eZLightbox::removeFromLightbox'
                                 );
        }
        return false;
    }

    public function purge()
    {
        $conditions = array( 'id'          => $this->attribute( 'id'          ),
                             'owner_id'    => $this->attribute( 'owner_id'    ),
                             'created'     => $this->attribute( 'created'     ),
                             'name'        => $this->attribute( 'name'        )
                           );
        if ( trim( $this->attribute( 'external_id' ) ) != '' )
        {
            $conditions['external_id'] = $this->attribute( 'external_id' );
        }
        $lightboxObjectList = eZLightboxObject::fetchListByLightbox( $this->attribute( 'id' ) );
        $lightboxAccessList = eZLightboxAccess::fetchListByLightbox( $this->attribute( 'id' ) );
        if ( is_array( $lightboxObjectList ) )
        {
            foreach ( $lightboxObjectList as $key => $object )
            {
                if ( is_object( $object ) )
                {
                    $object->purge();
                }
            }
        }
        if ( is_array( $lightboxAccessList ) )
        {
            foreach ( $lightboxAccessList as $key => $object )
            {
                if ( is_object( $object ) )
                {
                    $object->purge();
                }
            }
        }
        $this->remove( $conditions );
        eZLightbox::removeSessionVariable();
    }

    public function owner()
    {
        $userObject = eZUser::fetch( $this->attribute( 'owner_id' ) );
        return $userObject;
    }

    public function isOwner()
    {
        $userObject = eZUser::currentUser();
        if ( !is_object( $userObject ) )
        {
            eZDebug::writeWarning( 'Failed to fetch current user.',
                                   'eZLightbox::isOwner'
                                 );
            return false;
        }
        $isOwner = ( $this->attribute( 'owner_id' ) == $userObject->attribute( 'contentobject_id' ) );
        $this->__permissions['is_owner'] = $isOwner;
        return $isOwner;
    }

    public function userCanAddItem( $itemTypeID, $item )
    {
        $itemTypeObject = eZLightboxObjectItem::fetchByID( $itemTypeID );
        if ( !is_object( $itemTypeObject ) )
        {
            eZDebug::writeDebug( 'Invalid item type ID ' . $itemTypeID . '.', __METHOD__ );
            return false;
        }
        $itemObject = false;
        if ( is_numeric( $item ) )
        {
            $itemObject = $itemTypeObject->fetchItemObjectById( (int)$item );
            if ( !is_object( $itemObject ) )
            {
                eZDebug::writeDebug( 'Invalid item ID ' . $item . ' for type ID ' . $itemTypeID . '.', __METHOD__ );
                return false;
            }
        }
        else if ( is_object( $item ) )
        {
            if ( !$itemTypeObject->itemObjectIsValid( $item ) )
            {
                eZDebug::writeDebug( 'Invalid item object for type ID ' . $itemTypeID . '.', __METHOD__ );
                return false;
            }
            $itemObject = $item;
        }
        else
        {
            eZDebug::writeDebug( 'Type of submitted item for type ID ' . $itemTypeID . ' not supported.', __METHOD__ );
            return false;
        }
        return $this->checkLimitations( 'add', array( 'itemObject'     => $itemObject,
                                                      'itemTypeObject' => $itemTypeObject
                                                    )
                                      );
    }

    public function canEdit()
    {
        // eZ Publish permission system:
        $result = false;
        if ( isset( $this->__permissions['can_edit'] ) )
        {
            $result = $this->__permissions['can_edit'];
        }
        else if ( $this->checkLimitations( 'edit' ) )
        {
            $result = ( $this->__permissions['can_edit'] == true );
        }
        if ( $result )
        {
            // Lightbox permission system:
            if ( ( isset( $this->__permissions['is_owner'] ) && $this->__permissions['is_owner'] ) ||
                 $this->isOwner()
               )
            {
                return true;
            }
            return $this->currentUserAccess( eZLightboxAccess::EDIT );
        }
        return false;
    }

    public function canView()
    {
        // eZ Publish permission system:
        $result = false;
        if ( isset( $this->__permissions['can_view'] ) )
        {
            $result = $this->__permissions['can_view'];
        }
        else if ( $this->checkLimitations( 'view' ) )
        {
            $result = ( $this->__permissions['can_view'] == true );
        }
        if ( $result )
        {
            // Lightbox permission system:
            if ( ( isset( $this->__permissions['is_owner'] ) && $this->__permissions['is_owner'] ) ||
                 $this->isOwner()
               )
            {
                return true;
            }
            return $this->currentUserAccess( eZLightboxAccess::VIEW );
        }
        return false;
    }

    public function canSend()
    {
        // eZ Publish permission system:
        $result = false;
        if ( isset( $this->__permissions['can_send'] ) )
        {
            $result = $this->__permissions['can_send'];
        }
        else if ( $this->checkLimitations( 'send' ) )
        {
            $result = ( $this->__permissions['can_send'] == true );
        }
        return $result;
    }

    public function canGrant()
    {
        // eZ Publish permission system:
        $result = false;
        if ( isset( $this->__permissions['can_grant'] ) )
        {
            $result = $this->__permissions['can_grant'];
        }
        else if ( $this->checkLimitations( 'grant' ) )
        {
            $result = ( $this->__permissions['can_grant'] == true );
        }
        return $result;
    }

    private function checkLimitations( $viewFunction, $itemTypeLimitationCheck = false )
    {
        $user = eZUser::currentUser();

        if ( !is_object( $user ) )
        {
            ezDebug::writeWarning( 'Failed to fetch user object.', __METHOD__ );
            return false;
        }

        $accessResults = $user->hasAccessTo( 'lightbox' , $viewFunction );

        if ( !$accessResults )
        {
            eZDebug::writeWarning( 'Failed to get access information.', __METHOD__ );
            return false;
        }
        if ( array_key_exists( 'accessWord', $accessResults ) )
        {
            if ( $accessResults['accessWord'] == 'no' )
            {
                $this->setPermission( $viewFunction, false );
            }
            else if ( $accessResults['accessWord'] == 'yes' )
            {
                if ( $this->isOwner() )
                {
                    $this->setPermission( $viewFunction, true );
                }
                else
                {
                    $lightboxAccess = eZLightboxAccess::fetch( $this->attribute( 'id' ),
                                                               $user->attribute( 'contentobject_id' ),
                                                               false
                                                             );
                    if ( !$this->checkLightboxAccess( $viewFunction, $lightboxAccess ) )
                    {
                        $this->setPermission( $viewFunction, false );
                        return false;
                    }
                    $this->setPermission( $viewFunction, true );
                }
            }
            else
            {
                $this->setPermission( $viewFunction, false );
                if ( array_key_exists( 'policies', $accessResults ) )
                {
                    if ( !$this->getLimitations( $viewFunction, $accessResults['policies'], $user, $itemTypeLimitationCheck ) )
                    {
                        $this->setPermission( $viewFunction, false );
                        return false;
                    }
                    $this->setPermission( $viewFunction, true );
                }
                else
                {
                    eZDebug::writeWarning( 'Failed to get policies.', __METHOD__ );
                    return false;
                }
            }
        }
        else
        {
            ezDebug::writeWarning( 'No access word in access results.', __METHOD__ );
            return false;
        }
        return true;
    }

    private function getLimitations( $viewFunction, $policies, $user, $itemTypeLimitationCheck )
    {
        $itemTypeObject = false;
        $itemObject     = false;
        $allowed        = false;
        $lightboxAccess = false;
        if ( is_array( $itemTypeLimitationCheck ) &&
             isset( $itemTypeLimitationCheck['itemTypeObject'] ) &&
             isset( $itemTypeLimitationCheck['itemObject'] ) &&
             is_object( $itemTypeLimitationCheck['itemTypeObject'] ) &&
             is_object( $itemTypeLimitationCheck['itemObject'] )
           )
        {
            $itemTypeObject = $itemTypeLimitationCheck['itemTypeObject'];
            $itemObject     = $itemTypeLimitationCheck['itemObject'];
        }
        foreach ( array_keys( $policies ) as $policy_key  )
        {
            if ( $allowed === true )
            {
                break;
            }
            $has_owner_limit    = false;
            $is_owner_ok        = false;
            $itemTypePermission = false;
            $limitationArray    = $policies[ $policy_key ];
            foreach ( array_keys( $limitationArray ) as $limitation )
            {
                switch ( $limitation )
                {
                    case 'Owner':
                    {
                        $has_owner_limit = true;
                        if ( in_array( 0, $limitationArray[ $limitation ] ) )
                        {
                            $is_owner_ok = true;
                        }
                        if ( in_array( 1, $limitationArray[ $limitation ] ) )
                        {
                            if ( $this->isOwner() )
                            {
                                $is_owner_ok = true;
                            }
                        }
                        if ( !$is_owner_ok && in_array( 2, $limitationArray[ $limitation ] ) && !$this->isOwner() )
                        {
                            $is_owner_ok = 'granted';
                        }
                    }
                    break;
                }
            }
            if ( $itemTypeObject !== false )
            {
                $itemTypePermission = $itemTypeObject->policyMatchItemObject( $policies[ $policy_key ], $itemObject );
            }
            else
            {
                $itemTypePermission = true;
            }
            switch ( $viewFunction )
            {
                case 'add':
                case 'edit':
                case 'view':
                case 'send':
                case 'grant':
                {
                    if ( $has_owner_limit )
                    {
                        if ( $is_owner_ok === true )
                        {
                            $allowed = true;
                        }
                        else if ( $is_owner_ok === 'granted' )
                        {
                            if ( $lightboxAccess === false )
                            {
                                $lightboxAccess = eZLightboxAccess::fetch( $this->attribute( 'id' ),
                                                                           $user->attribute( 'contentobject_id' ),
                                                                           false
                                                                         );
                            }
                            if ( $this->checkLightboxAccess( $viewFunction, $lightboxAccess ) )
                            {
                                $allowed = true;
                            }
                        }
                    }
                    else
                    {
                        if ( $this->isOwner() )
                        {
                            $allowed = true;
                        }
                        else
                        {
                            if ( $lightboxAccess === false )
                            {
                                $lightboxAccess = eZLightboxAccess::fetch( $this->attribute( 'id' ),
                                                                        $user->attribute( 'contentobject_id' ),
                                                                        false
                                                                        );
                            }
                            if ( $this->checkLightboxAccess( $viewFunction, $lightboxAccess ) )
                            {
                                $allowed = true;
                            }
                        }
                    }
                    if ( $itemTypePermission !== true )
                    {
                        $allowed = false;
                    }
                }
                break;
                default:
                {
                    eZDebug::writeWarning( 'Unknown view function: ' . $viewFunction, __METHOD__ );
                }
                break;
            }
        }
        return $allowed;
    }

    private function checkLightboxAccess( $viewFunction, $lightboxAccess )
    {
        if ( isset( $lightboxAccess['access_mask'] ) &&
             isset( eZLightbox::$__function_access_map[ $viewFunction ] )
           )
        {
            return ( $lightboxAccess['access_mask'] & eZLightbox::$__function_access_map[ $viewFunction ] ) == true;
        }
        return false;
    }

    private function setPermission( $viewFunction, $limitation )
    {
        switch ( $viewFunction )
        {
            case 'add': // Adding depends on the item. Therefore storing result does not make sense
            {
            }
            break;
            case 'edit':
            {
                $this->__permissions['can_edit']  = $limitation;
            }
            break;
            case 'view':
            {
                $this->__permissions['can_view']  = $limitation;
            }
            break;
            case 'send':
            {
                $this->__permissions['can_send']  = $limitation;
            }
            break;
            case 'grant':
            {
                $this->__permissions['can_grant'] = $limitation;
            }
            break;
            default:
            {
                eZDebug::writeWarning( 'Unknown view function: ' . $viewFunction, __METHOD__ );
            }
            break;
        }
    }

    private function currentUserAccess( $accessType )
    {
        $userObject = eZUser::currentUser();
        if ( !is_object( $userObject ) )
        {
            eZDebug::writeWarning( 'Failed to fetch current user.',
                                   'eZLightbox::currentUserAccess'
                                 );
            return false;
        }
        $lightboxAccessObject = eZLightboxAccess::fetch( $this->attribute( 'id' ),
                                                         $userObject->attribute( 'contentobject_id' )
                                                       );
        if ( !is_object( $lightboxAccessObject ) )
        {
            eZDebug::writeWarning( 'Failed to fetch access object for lightbox ID ' . $this->attribute( 'id' ) . ' and user ID ' . $userObject->attribute( 'contentobject_id' ),
                                   'eZLightbox::currentUserAccess'
                                 );
            return false;
        }
        return $lightboxAccessObject->checkAccess( $accessType );
    }

}

?>
