<?php

namespace Harp\Locations\Model;

use Harp\Harp\AbstractModel;
use Harp\Locations\Repo;
use Harp\MP\MPModelTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Location extends AbstractModel
{
    use MPModelTrait;

    public function getRepo()
    {
        return Repo\Location::get();
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
