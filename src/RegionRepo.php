<?php

namespace Harp\Locations;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class RegionRepo extends LocationRepo
{
    public function initialize()
    {
        parent::initialize();

        $this
            ->setModelClass('Harp\Locations\Region')
            ->setRootRepo(LocationRepo::get());
    }
}
