<?php
/**
 * File containing the ezp\Persistence\Content\Criterion\UrlAlias class
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace ezp\Persistence\Content\Criterion;

/**
 * A criterion that matches Content based on Url aliases
 * @package ezp.persistence.content.criteria
 */
class UrlAliasCriterion extends Criterion
{
    /**
     * List of UrlAliases to match against
     * @var array(string)
     */
    public $urlAliasList;
}
?>