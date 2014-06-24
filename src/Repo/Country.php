<?php

namespace Harp\Locations\Repo;

use Harp\Validate\Assert;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Country extends Location
{
    public function initialize()
    {
        parent::initialize();

        $this
            ->setModelClass('Harp\Locations\Model\Country')
            ->setRootRepo(Location::get())
            ->addAsserts([
                new Assert\Present('code'),
                new Assert\LengthEquals('code', 2),
            ]);
    }
}
