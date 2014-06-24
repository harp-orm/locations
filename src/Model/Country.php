<?php

namespace Harp\Locations\Model;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Country extends Location
{
    const REPO = 'Harp\Locations\Repo\Country';

    /**
     * @return boolean
     */
    public function isCountry()
    {
        return true;
    }
}
