<?php

namespace Harp\Locations\Test;

use Harp\Locations\Location;
use Harp\Locations\Region;

/**
 * @coversDefaultClass Harp\Locations\Region
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class RegionTest extends AbstractTestCase
{
    /**
     * @covers ::isRegion
     * @covers ::getRepo
     */
    public function testCity()
    {
        $eu = Location::find(2);

        $this->assertInstanceOf('Harp\Locations\Region', $eu);
        $this->assertTrue($eu->isRegion());
        $this->assertFalse($eu->isCity());
        $this->assertFalse($eu->isCountry());
    }

    /**
     * @covers ::initialize
     */
    public function testInitialize()
    {
        $repo = Region::getRepo();

        $this->assertInstanceOf('Harp\MP\BelongsTo', $repo->getRel('parent'));
        $this->assertInstanceOf('Harp\MP\HasMany', $repo->getRel('children'));
    }
}
