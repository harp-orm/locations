<?php

namespace Harp\Locations\Model;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Region extends Location
{
    const REPO = 'Harp\Locations\Repo\Region';

    /**
     * @return boolean
     */
    public function isRegion()
    {
        return true;
    }
}
