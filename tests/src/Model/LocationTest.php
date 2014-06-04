<?php

namespace Harp\Locations\Test\Model;

use Harp\Locations\Model;
use Harp\Locations\Repo;
use Harp\Locations\Test\AbstractTestCase;

/**
 * @coversDefaultClass Harp\Locations\Model\Location
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class LocationTest extends AbstractTestCase
{
    /**
     * @covers ::isRegion
     * @covers ::isCity
     * @covers ::isCountry
     */
    public function testCity()
    {
        $location = new Model\Location();

        $this->assertFalse($location->isRegion());
        $this->assertFalse($location->isCity());
        $this->assertFalse($location->isCountry());
    }

    /**
     * @covers ::getRepo
     */
    public function testGetRepo()
    {
        $location = new Model\Location();

        $this->assertSame(Repo\Location::get(), $location->getRepo());
    }

    /**
     * @covers ::contains
     */
    public function testContains()
    {
        $everywhere = Repo\Location::get()->find(1);
        $bulgaria = Repo\Location::get()->findByName('Bulgaria');
        $sofia = Repo\Location::get()->findByName('Sofia');
        $germany = Repo\Location::get()->findByName('Germany');

        $this->assertTrue($everywhere->contains($everywhere));
        $this->assertTrue($everywhere->contains($bulgaria));
        $this->assertTrue($everywhere->contains($sofia));
        $this->assertTrue($bulgaria->contains($sofia));
        $this->assertFalse($germany->contains($sofia));
        $this->assertFalse($germany->contains($everywhere));
    }
}
