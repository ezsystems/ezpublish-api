<?php
namespace eZ\Publish\API\Repository\Values\Content;
use eZ\Publish\API\Repository\Values\ValueObject;
use eZ\Publish\API\Repository\Values\Content\ContentInfo;

/**
 * Class representing a relation between content.
 * 
 * @property-read int $id the internal id of the relation
 * @property-read string $sourceFieldDefinitionIdentifier the field definition identifier of the field where this relation is anchored if the relation is of type EMBED, LINK, or ATTRIBUTE
 * @property-read \eZ\Publish\API\Repository\Values\Content\ContentInfo $sourceContentInfo - calls {@link getSourceContentInfo()}
 * @property-read \eZ\Publish\API\Repository\Values\Content\ContentInfo $destinationContentInfo - calls {@link getDestinationContentInfo()}
 * @property-read int $type The relation type bitmask containing one or more of Relation::COMMON, Relation::EMBED, Relation::LINK, Relation::FIELD
 */
abstract class Relation extends ValueObject
{
    /**
     * The relation type COMMON is a general relation between object set by a user.
     *
     * @var int
     */
    const COMMON = 1;

    /**
     * the relation type EMBED is set for a relation which is anchored as embedded link in an attribute value
     *
     * @var int
     */
    const EMBED = 2;

    /**
     * the relation type LINK is set for a relation which is anchored as link in an attribute value
     *
     * @var int
     */
    const LINK = 4;

    /**
     * the relation type FIELD is set for a relation which is part of an relation attribute value
     *
     * @var int
     */
    const FIELD = 8;

    /**
     * Id of the relation
     *
     * @var mixed
     */
    protected $id;

    /**
     * Source Content Type Field Definition Id.
     * For relation not of type RelationType::COMMON this field denotes the field definition id
     * of the attribute where the realtion is anchored.
     *
     * @var string
     */
    protected $sourceFieldDefinitionIdentifier;

    /**
     * the content of the source content of the relation
     *
     * @return \eZ\Publish\API\Repository\Values\Content\ContentInfo
     */
    public abstract function getSourceContentInfo();

    /**
     * the content of the destination content of the relation
     *
     * @return \eZ\Publish\API\Repository\Values\Content\ContentInfo
     */
    public abstract function getDestinationContentInfo();
    
    /**
     * The relation type bitmask
     *
     * @see Relation::COMMON, Relation::EMBED, Relation::LINK, Relation::FIELD
     *
     * @var int
     */
    protected $type;
}