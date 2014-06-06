<?php

namespace Harp\Locations\Repo;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class City extends Location
{
    public static function newInstance()
    {
        return new City('Harp\Locations\Model\City');
    }

    public function initialize()
    {
        parent::initialize();

        $this->setRootRepo(Location::get());
    }
}
