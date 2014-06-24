<?php

namespace Harp\Locations\Test\Model;

use Harp\Locations\Model\Location;
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
        $location = new Location();

        $this->assertFalse($location->isRegion());
        $this->assertFalse($location->isCity());
        $this->assertFalse($location->isCountry());
    }

    /**
     * @covers ::contains
     */
    public function testContains()
    {
        $everywhere = Location::find(1);
        $bulgaria = Location::findByName('Bulgaria');
        $sofia = Location::findByName('Sofia');
        $germany = Location::findByName('Germany');

        $this->assertTrue($everywhere->contains($everywhere));
        $this->assertTrue($everywhere->contains($bulgaria));
        $this->assertTrue($everywhere->contains($sofia));
        $this->assertTrue($bulgaria->contains($sofia));
        $this->assertFalse($germany->contains($sofia));
        $this->assertFalse($germany->contains($everywhere));
    }
}
