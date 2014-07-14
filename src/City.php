<?php

namespace Harp\Locations;

use Harp\Harp\Config;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class City extends Location
{
    public static function initialize(Config $config)
    {
        parent::initialize($config);
    }

    /**
     * @return boolean
     */
    public function isCity()
    {
        return true;
    }
}
