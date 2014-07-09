<?php

namespace Harp\Locations;

use Harp\Validate\Assert;
use Harp\Harp\Repo;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Country extends Location
{
    public static function initialize(Repo $repo)
    {
        parent::initialize($repo);

        $repo
            ->setRootRepo(Location::getRepo())
            ->addAsserts([
                new Assert\Present('code'),
                new Assert\LengthEquals('code', 2),
            ]);
    }

    /**
     * @return boolean
     */
    public function isCountry()
    {
        return true;
    }
}
