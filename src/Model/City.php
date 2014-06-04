<?php

namespace Harp\Locations\Model;

use Harp\Locations\Repo;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class City extends Location
{
    public function getRepo()
    {
        return Repo\City::get();
    }

    /**
     * @return boolean
     */
    public function isCity()
    {
        return true;
    }
}
