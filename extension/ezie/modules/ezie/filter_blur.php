<?php
/**
 * File containing the blur filter handler
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://ez.no/software/proprietary_license_options/ez_proprietary_use_license_v1_0 eZ Proprietary Use License v1.0
 * @version 1.2.0
 * @package ezie
 * @todo Check if this is used/implemented at all (not referenced by the GUI)
 */
$prepare_action = new eZIEImagePreAction();

$http = eZHTTPTool::instance();
$value = $http->hasPostVariable( 'value' ) ? $http->variable( 'value' ) : 1;

$imageconverter = new eZIEezcImageConverter( eZIEImageFilterBlur::filter( $prepare_action->getRegion() ) );

$imageconverter->perform(
    $prepare_action->getImagePath(),
    $prepare_action->getNewImagePath()
);

eZIEImageToolResize::doThumb(
    $prepare_action->getNewImagePath(),
    $prepare_action->getNewThumbnailPath()
);

echo (string)$prepare_action;
eZExecution::cleanExit();
?>
