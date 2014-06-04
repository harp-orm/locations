<?php

namespace Harp\Locations\Repo;

use Harp\Harp\AbstractRepo;
use Harp\MP\MPRepoTrait;
use Harp\Validate\Assert;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Location extends AbstractRepo
{
    use MPRepoTrait;

    private static $instance;

    /**
     * @return Location
     */
    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new Location('Harp\Locations\Model\Location');
        }

        return self::$instance;
    }

    public function findByCode($code, $flags = null)
    {
        return $this->findAll()
            ->where('code', $code)
            ->loadFirst($flags);
    }

    public function initialize()
    {
        $this
            ->setInherited(true)
            ->setAsserts([
                new Assert\Present('name'),
            ])
            ->initializeMaterializedPath();
    }
}
