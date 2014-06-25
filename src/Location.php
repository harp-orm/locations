<?php

namespace Harp\Locations;

use Harp\Harp\AbstractModel;
use Harp\MP\Model\MPTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Location extends AbstractModel
{
    const REPO = 'Harp\Locations\LocationRepo';

    use MPTrait;

    /**
     * @param  string $code
     * @return AbstractModel
     */
    public static function findByCode($code)
    {
        return static::getRepoStatic()->findByCode($code);
    }

    public $id;
    public $name;
    public $class;
    public $code;

    /**
     * @param  Location $location
     * @return boolean
     */
    public function contains(Location $location)
    {
        return (($this->id == $location->id) or $location->isDescendantOf($this));
    }

    /**
     * @return boolean
     */
    public function isCity()
    {
        return false;
    }

    /**
     * @return boolean
     */
    public function isCountry()
    {
        return false;
    }

    /**
     * @return boolean
     */
    public function isRegion()
    {
        return false;
    }
}
