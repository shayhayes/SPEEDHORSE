<?php
//
// Created on: <15-Aug-2002 14:36:10 bf>
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

$Module = array( 'name' => 'eZRole' );

$ViewList = array();
$ViewList['list'] = array(
    'script' => 'list.php',
    'default_navigation_part' => 'ezusernavigationpart',
    'post_actions' => array( 'BrowseActionName' ),
    'unordered_params' => array( 'offset' => 'Offset' ),
    'params' => array(  ) );
$ViewList['edit'] = array(
    'script' => 'edit.php',
    'ui_context' => 'edit',
    'default_navigation_part' => 'ezusernavigationpart',
    'params' => array( 'RoleID' ) );
$ViewList['copy'] = array(
    'script' => 'copy.php',
    'ui_context' => 'edit',
    'default_navigation_part' => 'ezusernavigationpart',
    'params' => array( 'RoleID' ) );
$ViewList['policyedit'] = array(
    'script' => 'policyedit.php',
    'ui_context' => 'edit',
    'default_navigation_part' => 'ezusernavigationpart',
    'params' => array( 'PolicyID' ) );
$ViewList['view'] = array(
    'script' => 'view.php',
    'default_navigation_part' => 'ezusernavigationpart',
    'post_actions' => array( 'BrowseActionName' ),
    'params' => array( 'RoleID' ) );
$ViewList['assign'] = array(
    'script' => 'assign.php',
    'default_navigation_part' => 'ezusernavigationpart',
    'params' => array( 'RoleID', 'LimitIdent', 'LimitValue' ) );

?>