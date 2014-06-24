<?php

namespace Harp\Locations\Test\Model;

use Harp\Locations\Model\Location;
use Harp\Locations\Repo;
use Harp\Locations\Test\AbstractTestCase;

/**
 * @coversDefaultClass Harp\Locations\Model\Region
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

        $this->assertInstanceOf('Harp\Locations\Model\Region', $eu);
        $this->assertTrue($eu->isRegion());
        $this->assertFalse($eu->isCity());
        $this->assertFalse($eu->isCountry());
    }
}
