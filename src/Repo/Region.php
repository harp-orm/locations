<?php

namespace Harp\Locations\Repo;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Region extends Location
{
    public static function newInstance()
    {
        return new Region('Harp\Locations\Model\Region');
    }

    public function initialize()
    {
        parent::initialize();

        $this->setRootRepo(Location::get());
    }
}
