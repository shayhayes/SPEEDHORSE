<?php
/**
 * File containing the ezpRestProviderNotfoundException class.
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://ez.no/software/proprietary_license_options/ez_proprietary_use_license_v1_0 eZ Proprietary Use License v1.0
 *
 */

class ezpRestProviderNotFoundException extends ezpRestException
{
    public function __construct( $providerName )
    {
        parent::__construct( "The API provider '{$providerName}' could not be found." );
    }
}
