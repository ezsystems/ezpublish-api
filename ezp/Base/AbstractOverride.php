<?php
/**
 * Override, a reusable abstract class providing baseline override functionality:
 * - api to append and prepend directories
 * - cache awareness when directories have changed
 * -
 *
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 * @package ezp
 * @subpackage base
 *
 */

namespace ezp\Base;
abstract class AbstractOverride
{
    /**
     * The global path array, scoped in the order they should be parsed
     *
     * @var array
     */
    protected static $globalPaths = array(
        //'base' => array( 'settings/' ),
        //'modules' => array(),
        //'siteaccess' => array(),
        //'global' => array( 'settings/override/' ),
    );

    /**
     * The global path array md5 hash, for use in cache names.
     * Empty if it needs to be regenerated
     *
     * @var string
     */
    protected static $globalPathsHash = '';

    /**
     * The instance path array, scoped in the order they should be parsed
     * Set by {@link Override::initPaths()}
     *
     * @var array
     */
    protected $paths = null;

    /**
     * The instance configuration path array md5 hash, for use in cache names.
     * Empty if it needs to be regenerated
     *
     * @var string
     */
    protected $pathsHash = '';

    /**
     * Init paths by ref or copy
     *
     * @param bool $byRef Tells function to assign global paths by reference or not, if true then changes to global paths will affect
     *             paths on this object directly
     */
    public function initPaths( $byRef = false )
    {
        if ( $byRef )
        {
            $this->paths     = &static::$globalPaths;
            $this->pathsHash = &static::$globalPathsHash;
        }
        else
        {
            $this->paths     = static::$globalPaths;
            $this->pathsHash = static::$globalPathsHash;
        }
    }

    /**
     * Append a path string to instance override path list.
     *
     * @deprecated Forcing use of setDirs() as it is a more efficient way of setting dirs
     * @throws Exception\InvalidArgumentValue If scope has wrong value
     * @param string $dir
     * @param string $scope See {@link $globalPaths} for scope values (first level keys)
     * @return bool Return true if cache hash was cleared, indicating reload is needed
     */
    public function appendDir( $dir, $scope )
    {
        if ( !isset( $this->paths[$scope] ) )
            throw new Exception\InvalidArgumentValue( 'scope', $scope, get_class( $this ) );

        $this->paths[$scope][] = $dir;
        if ( $this->pathsHash !== '' )
        {
            $this->pathsHash = '';
            return true;
        }
        return false;
    }

    /**
     * Prepend a path string to instance override path list.
     *
     * @deprecated Forcing use of setDirs() as it is a more efficient way of setting dirs
     * @throws Exception\InvalidArgumentValue If scope has wrong value
     * @param string $dir
     * @param string $scope See {@link $globalPaths} for scope values (first level keys)
     * @return bool Return true if cache hash was cleared, indicating reload is needed
     */
    public function prependDir( $dir, $scope )
    {
        if ( !isset( $this->paths[$scope] ) )
            throw new Exception\InvalidArgumentValue( 'scope', $scope, get_class( $this ) );

        $this->paths[$scope] = array_merge( array( $dir ), $this->paths[$scope] );
        if ( $this->pathsHash !== '' )
        {
            $this->pathsHash = '';
            return true;
        }
        return false;
    }

    /**
     * Get raw global override path list data.
     *
     * @throws Exception\InvalidArgumentValue If scope has wrong value
     * @param string $scope See {@link $globalPaths} for scope values (first level keys)
     * @return array
     */
    public static function getGlobalDirs( $scope = null )
    {
        if ( $scope === null )
            return static::$globalPaths;
        if ( !isset( static::$globalPaths[$scope] ) )
            throw new Exception\InvalidArgumentValue( 'scope', $scope, get_called_class() );

        return static::$globalPaths[$scope];
    }

    /**
     * Set raw global override path list data.
     *
     * Warning: Does not invalidate path hash on instances!
     *
     * @throws Exception\InvalidArgumentValue If scope has wrong value
     * @param array $paths
     * @param string $scope See {@link $globalPaths} for scope values (first level keys)
     */
    public static function setGlobalDirs( array $paths, $scope = null )
    {
        if ( $scope === null )
        {
            static::$globalPaths = $paths;
        }
        else if ( !isset( static::$globalPaths[$scope] ) )
        {
            throw new Exception\InvalidArgumentValue( 'scope', $scope, get_called_class() );
        }

        static::$globalPaths[$scope] = $paths;
        return true;
    }

    /**
     * Get raw instance override path list data.
     *
     * @throws Exception\InvalidArgumentValue If scope has wrong value
     * @param string $scope See {@link $globalPaths} for scope values (first level keys)
     * @return array
     */
    public function getDirs( $scope = null )
    {
        if ( $scope === null )
            return $this->paths;
        if ( !isset( $this->paths[$scope] ) )
            throw new Exception\InvalidArgumentValue( 'scope', $scope, get_class( $this ) );

        return $this->paths[$scope];
    }


    /**
     * Set raw instance override path list data.
     *
     * @throws Exception\InvalidArgumentValue If scope has wrong value
     * @param array $paths
     * @param string $scope See {@link $globalPaths} for scope values (first level keys)
     * @return bool Return true if cache hash was cleared, indicating reload is needed
     */
    public function setDirs( array $paths, $scope = null )
    {
        if ( $scope === null )
        {
            if ( $this->paths === $paths )
                return false;
            $this->paths = $paths;
        }
        else if ( !isset( $this->paths[$scope] ) )
        {
            throw new Exception\InvalidArgumentValue( 'scope', $scope, get_class( $this ) );
        }
        else if ( $this->paths[$scope] === $paths )
        {
            return false;
        }
        else
        {
            $this->paths[$scope] = $paths;
        }

        if ( $this->pathsHash !== '' )
        {
            $this->pathsHash = '';
            return true;
        }
        return false;
    }

    /**
     * Get cache hash based on override dirs
     *
     * @return string md5 hash
     */
    public function pathsHash()
    {
        if ( $this->pathsHash === '' )
        {
            $this->pathsHash = md5( serialize( $this->paths ) );
        }
        return $this->pathsHash;
    }
}

?>