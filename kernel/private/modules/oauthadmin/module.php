<?php
/**
 * File containing the oauthadmin module definition.
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://ez.no/software/proprietary_license_options/ez_proprietary_use_license_v1_0 eZ Proprietary Use License v1.0
 * @version 4.5.0
 * @package kernel
 */

include_once 'kernel/private/rest/classes/lazy.php';

$Module = array( 'name' => 'Rest client admin',
                 'variable_params' => true );

$ViewList = array();

$ViewList['list'] = array(
    'script' => 'list.php',
    'default_navigation_part' => 'ezsetupnavigationpart',
);

$ViewList['edit'] = array(
    'script' => 'edit.php',
    'params' => array( 'ApplicationID' ),
    'single_post_actions' => array( 'StoreButton' => 'Store',
                                    'DiscardButton' => 'Discard' ),
    'post_action_parameters' => array( 'Store' => array( 'Name' => 'Name',
                                                         'EndPointURI' => 'EndPointURI',
                                                         'Description' => 'Description' ) ),
    'default_navigation_part' => 'ezsetupnavigationpart',
);

$ViewList['action'] = array(
    'script' => 'action.php',
    'single_post_actions' => array( 'NewApplicationButton' => 'NewApplication',
                                    'DeleteApplicationListButton' => 'DeleteApplicationList' ),
    'post_action_parameters' => array( 'DeleteApplicationList' => array( 'ApplicationIDList' => 'DeleteIDArray',
                                                                         'ConfirmDelete' => 'ConfirmDelete' ) ),
    'default_navigation_part' => 'ezsetupnavigationpart',
);

$ViewList['view'] = array(
    'script' => 'view.php',
    'params' => array( 'ApplicationID' ),
    'default_navigation_part' => 'ezsetupnavigationpart',
);

$FunctionList = array( );
?>
