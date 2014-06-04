<?php

namespace Harp\Locations\Repo;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Region extends Location
{
    private static $instance;

    /**
     * @return Region
     */
    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new Region('Harp\Locations\Model\Region');
        }

        return self::$instance;
    }

    public function initialize()
    {
        parent::initialize();

        $this->setRootRepo(Location::get());
    }
}
