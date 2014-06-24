<?php

namespace Harp\Locations\Repo;

use Harp\Harp\AbstractRepo;
use Harp\MP\Repo\MPTrait;
use Harp\Validate\Assert;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Location extends AbstractRepo
{
    use MPTrait;

    public function findByCode($code, $flags = null)
    {
        return $this->findAll()
            ->where('code', $code)
            ->loadFirst($flags);
    }

    public function initialize()
    {
        $this
            ->setModelClass('Harp\Locations\Model\Location')
            ->setInherited(true)
            ->addAsserts([
                new Assert\Present('name'),
            ])
            ->initializeMaterializedPath();
    }
}
