<?php

namespace Harp\Locations\Test\Repo;

use Harp\Harp\AbstractRepo;
use Harp\Locations\Test\Model;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Test extends AbstractRepo
{
    private static $instance;

    /**
     * @return Test
     */
    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new Test('Harp\Locations\Test\Model\Test');
        }

        return self::$instance;
    }

    public function initialize()
    {

    }
}
