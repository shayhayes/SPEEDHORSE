<?php
/**
 * File containing the abstract ezcDocumentOdtBaseFilter base class.
 *
 * @package Document
 * @version //autogen//
 * @copyright Copyright (C) 2005-2010 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 * @access private
 */

/**
 * Abstract base class for ODT filters, assigning semantic information to
 * ODT documents.
 *
 * @package Document
 * @version //autogen//
 * @access private
 */
abstract class ezcDocumentOdtBaseFilter
{
    /**
     * Filter ODT document
     *
     * Filter for the document, which may modify / restructure a document and
     * assign semantic information bits to the elements in the tree.
     *
     * @param DOMDocument $document
     * @return DOMDocument
     */
    abstract public function filter( DOMDocument $document );
}

?>
