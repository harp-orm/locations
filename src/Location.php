<?php

namespace Harp\Locations;

use Harp\Harp\AbstractModel;
use Harp\MP\MaterializedPathTrait;
use Harp\Core\Model\InheritedTrait;
use Harp\Harp\Repo;
use Harp\Validate\Assert;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Location extends AbstractModel
{
    use MaterializedPathTrait;
    use InheritedTrait;

    public static function findByCode($code, $flags = null)
    {
        return self::where('code', $code)->applyFlags($flags)->loadFirst();
    }

    public static function initialize(Repo $repo)
    {
        InheritedTrait::initialize($repo);
        MaterializedPathTrait::initialize($repo);

        $repo
            ->addAsserts([
                new Assert\Present('name'),
            ]);
    }

    public $id;
    public $name;
    public $code;

    /**
     * @param  Location $location
     * @return boolean
     */
    public function contains(Location $location)
    {
        return (($this->id == $location->id) or $location->isDescendantOf($this));
    }

    /**
     * @return boolean
     */
    public function isCity()
    {
        return false;
    }

    /**
     * @return boolean
     */
    public function isCountry()
    {
        return false;
    }

    /**
     * @return boolean
     */
    public function isRegion()
    {
        return false;
    }
}
