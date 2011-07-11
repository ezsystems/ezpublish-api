<?php
/**
 * File containing the (content) Field class
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 *
 */

namespace ezp\Persistence\Content;

/**
 * @package ezp
 * @subpackage persistence_content
 */
class Field
{
    /**
     */
    public $id;
    /**
     * Data type name.
     *
     * @var string
     */
    public $type;
    /**
     * @var FieldValue
     */
    public $value;
    /**
     */
    public $language;
    /**
     */
    public $unnamed_ContentVersion_;
    /**
     */
    public $unnamed_ContentCreateStruct_;
    /**
     */
    public $unnamed_ContentUpdateStruct_;
}
?>