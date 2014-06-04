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
    private static $instance;

    /**
     * @return Country
     */
    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new Country('Harp\Locations\Model\Country');
        }

        return self::$instance;
    }

    public function initialize()
    {
        parent::initialize();

        $this
            ->setRootRepo(Location::get())
            ->setAsserts([
                new Assert\Present('code'),
                new Assert\LengthEquals('code', 2),
            ]);
    }
}
