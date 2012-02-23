<?php
/**
 * File containing the LocationStub class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\API\Repository\Tests\Stubs\Values\Content;

use eZ\Publish\API\Repository\Values\ValueObject;
use eZ\Publish\API\Repository\Values\Content\Content;

/**
 * Stubbed implementation of the {@link \eZ\Publish\API\Repository\Values\Content\Location}
 * class.
 *
 * @see \eZ\Publish\API\Repository\Values\Content\Location
 */
class LocationStub extends Location
{
    /**
     * Location ID.
     *
     * @var mixed Location ID.
     */
    // protected $id;

    /**
     * Location priority
     *
     * Position of the Location among its siblings when sorted using priority
     * sort order.
     *
     * @var int
     */
    // protected $priority;

    /**
     * Indicates that the Location entity has been explicitly marked as hidden.
     *
     * @var boolean
     */
    // protected $hidden;

    /**
     * Indicates that the Location is implicitly marked as hidden by a parent
     * location.
     *
     * @var boolean
     */
    // protected $invisible;

    /**
     * Remote ID.
     *
     * A universally unique identifier.
     *
     * @var mixed
     */
    // protected $remoteId;

    /**
     * Parent ID.
     *
     * @var mixed Location ID.
     */
    // protected $parentId;

    /**
     * The materialized path of the location entry, eg: /1/2/
     *
     * @var string
     */
    // protected $pathString;

    /**
     * Date of the latest update of a content object in a sub location.
     *
     * @var \DateTime
     */
    // protected $modifiedSubLocationDate;

    /**
     * Identifier of the main location.
     *
     * If the content object in this location has multiple locations,
     * $mainLocationId will point to the main one.
     *
     * @var mixed
     */
    // protected $mainLocationId;

    /**
     * Depth location has in the location tree.
     *
     * @var int
     */
    // protected $depth;

    /**
     * Specifies which property the child locations should be sorted on.
     *
     * Valid values are found at {@link Location::SORT_FIELD_*}
     *
     * @var mixed
     */
    // protected $sortField;

    /**
     * Specifies whether the sort order should be ascending or descending.
     *
     * Valid values are {@link Location::SORT_ORDER_*}
     *
     * @var mixed
     */
    // protected $sortOrder;

    /**
     * the number of children visible to the authenticated user which has loaded this instance.
     *
     * @var integer
     */
    // protected $childrenCount;

    /**
     * ContentInfo
     *
     * @var \eZ\Publish\API\Repository\Values\Content\ContentInfo
     */
    protected $contentInfo;

    /**
     * returns the content info of the content object of this location
     *
     * @return \eZ\Publish\API\Repository\Values\Content\ContentInfo
     */
    public function getContentInfo()
    {
        return $this->contentInfo;
    }
}
