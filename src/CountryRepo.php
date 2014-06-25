<?php

namespace Harp\Locations;

use Harp\Validate\Assert;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class CountryRepo extends LocationRepo
{
    public function initialize()
    {
        parent::initialize();

        $this
            ->setModelClass('Harp\Locations\Country')
            ->setRootRepo(LocationRepo::get())
            ->addAsserts([
                new Assert\Present('code'),
                new Assert\LengthEquals('code', 2),
            ]);
    }
}
