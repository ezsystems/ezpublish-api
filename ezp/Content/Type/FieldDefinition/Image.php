<?php
/**
 * Image Field domain object
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace ezp\Content\Type\FieldDefinition;
use ezp\Content\Type,
    ezp\Content\Type\FieldDefinition;

/**
 * Image Field value object class
 */
class Image extends String
{
    /**
     * Field type identifier
     * @var string
     */
    const FIELD_IDENTIFIER = 'ezimage';

    /**
     * @var int
     */
    public $maxSize = 0;

    /**
     * @var array Readable of properties on this object
     */
    protected $readWriteProperties = array(
        'maxSize' => 'data_int1',
    );

    /**
     * @return void
     */
    public function __construct( Type $contentType )
    {
        $this->readWriteProperties['maxSize'] = true;
        FieldDefinition::__construct( $contentType );
    }
}