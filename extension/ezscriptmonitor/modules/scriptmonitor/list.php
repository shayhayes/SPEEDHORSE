<?php
/**
 * File containing list view
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 *
 */

$Module = $Params['Module'];

$scripts = eZScheduledScript::fetchCurrentScripts();

$tpl = eZTemplate::factory();
$tpl->setVariable( 'module', $Module );
$tpl->setVariable( 'scripts', $scripts );

$Result = array();
$Result['content'] = $tpl->fetch( 'design:scriptmonitor/list.tpl' );
$Result['path'] = array( array( 'url' => false,
                                'text' => ezpI18n::tr( 'ezscriptmonitor', 'Script monitor' ) ) );

?>
