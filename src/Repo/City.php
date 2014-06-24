<?php

namespace Harp\Locations\Repo;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class City extends Location
{
    public function initialize()
    {
        parent::initialize();

        $this
            ->setModelClass('Harp\Locations\Model\City')
            ->setRootRepo(Location::get());
    }
}
