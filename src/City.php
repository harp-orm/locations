<?php

namespace Harp\Locations;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class City extends Location
{
    const REPO = 'Harp\Locations\CityRepo';

    /**
     * @return boolean
     */
    public function isCity()
    {
        return true;
    }
}
