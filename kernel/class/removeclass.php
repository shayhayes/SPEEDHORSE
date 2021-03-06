<?php
//
//
// ## BEGIN COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
// SOFTWARE NAME: eZ Publish
// SOFTWARE RELEASE: 4.5.0
// COPYRIGHT NOTICE: Copyright (C) 1999-2011 eZ Systems AS
// SOFTWARE LICENSE: eZ Proprietary Use License v1.0
// NOTICE: >
//   This source file is part of the eZ Publish (tm) CMS and is
//   licensed under the terms and conditions of the eZ Proprietary
//   Use License v1.0 (eZPUL).
// 
//   A copy of the eZPUL was included with the software. If the
//   license is missing, request a copy of the license via email
//   at eZPUL-v1.0@ez.no or via postal mail at
//     Attn: Licensing Dept. eZ Systems AS, Klostergata 30, N-3732 Skien, Norway
// 
//   IMPORTANT: THE SOFTWARE IS LICENSED, NOT SOLD. ADDITIONALLY, THE
//   SOFTWARE IS LICENSED "AS IS," WITHOUT ANY WARRANTIES WHATSOEVER.
//   READ THE eZPUL BEFORE USING, INSTALLING OR MODIFYING THE SOFTWARE.
// ## END COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
//

$Module = $Params['Module'];
$GroupID = null;
if ( isset( $Params["GroupID"] ) )
    $GroupID = $Params["GroupID"];
$http = eZHTTPTool::instance();
$deleteIDArray = $http->hasSessionVariable( 'DeleteClassIDArray' ) ? $http->sessionVariable( 'DeleteClassIDArray' ) : array();
$DeleteResult = array();
$alreadyRemoved = array();

if ( !$http->hasPostVariable( 'ConfirmButton' ) && !$http->hasPostVariable( 'CancelButton' ) && $GroupID != null )
{
    // we will remove class - group relations rather than classes if they belongs to more than 1 group:
    $updateDeleteIDArray = true;
    foreach ( $deleteIDArray as $key => $classID )
    {
        // for each classes tagged for deleting:
        $class = eZContentClass::fetch( $classID );
        if ( $class )
        {
            // find out to how many groups the class belongs:
            $classInGroups = $class->attribute( 'ingroup_list' );
            if ( count( $classInGroups ) != 1 )
            {
                // remove class - group relation:
                eZClassFunctions::removeGroup( $classID, null, array( $GroupID ) );
                $alreadyRemoved[] = array( 'id' => $classID,
                                           'name' => $class->attribute( 'name' ) );
                $updateDeleteIDArray = true;
                unset( $deleteIDArray[$key] );
            }
        }
    }
    if ( $updateDeleteIDArray )
    {
        // we aren't going to remove classes already processed:
        $http->setSessionVariable( 'DeleteClassIDArray', $deleteIDArray );
    }
    if ( count( $deleteIDArray ) == 0 )
    {
        // we don't need anything to confirm:
        return $Module->redirectTo( '/class/classlist/' . $GroupID );
    }
}

if ( $http->hasPostVariable( "ConfirmButton" ) )
{
    foreach ( $deleteIDArray as $deleteID )
    {
        eZContentClassOperations::remove( $deleteID );
    }
    return $Module->redirectTo( '/class/classlist/' . $GroupID );
}
if ( $http->hasPostVariable( "CancelButton" ) )
{
    return $Module->redirectTo( '/class/classlist/' . $GroupID );
}

$canRemoveCount = 0;
foreach ( $deleteIDArray as $deleteID )
{
    $ClassObjectsCount = 0;
    $class = eZContentClass::fetch( $deleteID );
    if ( $class != null )
    {
        $class = eZContentClass::fetch( $deleteID );
        $ClassID = $class->attribute( 'id' );
        $ClassName = $class->attribute( 'name' );
        if ( !$class->isRemovable() )
        {
            $item = array( "className" => $ClassName,
                           'objectCount' => 0,
                           "is_removable" => false,
                           'reason' => $class->removableInformation() );
            $DeleteResult[] = $item;
            continue;
        }
        ++$canRemoveCount;
        $classObjects = eZContentObject::fetchSameClassList( $ClassID );
        $ClassObjectsCount = count( $classObjects );
        $item = array( "className" => $ClassName,
                       "is_removable" => true,
                       "objectCount" => $ClassObjectsCount );
        $DeleteResult[] = $item;
    }
}

$canRemove = ( $canRemoveCount > 0 );

$Module->setTitle( ezpI18n::tr( 'kernel/class', 'Remove classes %class_id', null, array( '%class_id' => $ClassID ) ) );
$tpl = eZTemplate::factory();

$tpl->setVariable( 'module', $Module );
$tpl->setVariable( 'GroupID', $GroupID );
$tpl->setVariable( 'DeleteResult', $DeleteResult );
$tpl->setVariable( 'already_removed', $alreadyRemoved );
$tpl->setVariable( 'can_remove', $canRemove );

$Result = array();
$Result['content'] = $tpl->fetch( "design:class/removeclass.tpl" );
$Result['path'] = array( array( 'url' => '/class/grouplist/',
                                'text' => ezpI18n::tr( 'kernel/class', 'Class groups' ) ) );
$Result['path'][] = array( 'url' => false,
                           'text' => ezpI18n::tr( 'kernel/class', 'Remove classes' ) );
?>
