<?php
/**
 * File containing the oauthadmin/list view definition
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://ez.no/software/proprietary_license_options/ez_proprietary_use_license_v1_0 eZ Proprietary Use License v1.0
 * @version 4.5.0
 * @package kernel
 */

$tpl = eZTemplate::factory();
$module = $Params['Module'];

$session = ezcPersistentSessionInstance::get();

$q = $session->createFindQuery( 'ezpRestClient' );
$q->where( $q->expr->eq( 'version', ezpRestClient::STATUS_PUBLISHED ) )
  ->orderBy( 'name', ezcQuerySelect::ASC );
$tpl->setVariable( 'applications', $session->find( $q, 'ezpRestClient' ) );

$tpl->setVariable( 'module', $module );

$Result['path'] = array( array( 'url' => false,
                                'text' => ezpI18n::tr( 'kernel/oauthadmin', 'oAuth admin' ) ),
                         array( 'url' => false,
                                'text' => ezpI18n::tr( 'kernel/oauthadmin', 'Registered REST applications' ) ) );

$Result['content'] = $tpl->fetch( 'design:oauthadmin/list.tpl' );

return $Result;
?>
