<?php
/**
 * File containing the ezpContentField class.
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://ez.no/software/proprietary_license_options/ez_proprietary_use_license_v1_0 eZ Proprietary Use License v1.0
 * @version 4.5.0
 * @package API
 */

/**
 * This class handles content fields.
 * A content field currently wraps around an eZContentObjectAttribute
 * @package API
 */
class ezpContentField
{
    public function __construct()
    {

    }

    /**
     * Initializes an ezpContentField using an eZContentObjectAttribute
     * @param eZContentObjectAttribute $attribute
     * @return ezpContentField
     */
    public static function fromContentObjectAttribute( eZContentObjectAttribute $attribute )
    {
        $field = new self;
        $field->attribute = $attribute;
        return $field;
    }

    /**
     * String representation of the attribute.
     * Uses {eZContentObjectAttribute::toString()}
     */
    public function __toString()
    {
        if ( $this->attribute instanceof eZContentObjectAttribute )
            return $this->attribute->toString();
        else
            return '';
    }

    public function __call( $method, $arguments )
    {
        if ( method_exists( $this->attribute, $method ) )
            return call_user_func_array( array( $this->attribute, $method ), $arguments );
        else
            throw new ezcBasePropertyNotFoundException( $method );
    }

    public function __get( $property )
    {
        switch( $property )
        {
            // returns the serialized version of the attribute through the eZPackage mechanism

            // Using package here is very problematic. Some serializations put
            // content into the package, which is after this point, dangling.
            case 'serializedXML':
                return $this->attribute->serialize( new eZPackage );
                break;
            default:
                if ( $this->attribute->hasAttribute( $property ) )
                    return $this->attribute->attribute( $property );
                else
                    throw new ezcBasePropertyNotFoundException( $property );
        }
    }

    /**
     * @var eZContentObjectAttribute
     */
    protected $attribute;
}
?>
