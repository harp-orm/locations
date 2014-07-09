<?php

namespace Harp\Locations;

use Harp\Harp\Repo;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class City extends Location
{
    public static function initialize(Repo $repo)
    {
        parent::initialize($repo);

        $repo
            ->setRootRepo(Location::getRepo());
    }

    /**
     * @return boolean
     */
    public function isCity()
    {
        return true;
    }
}
