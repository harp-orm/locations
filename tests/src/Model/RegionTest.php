<?php

namespace Harp\Locations\Test\Model;

use Harp\Locations\Model;
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
        $eu = Repo\Location::get()->find(2);

        $this->assertInstanceOf('Harp\Locations\Model\Region', $eu);
        $this->assertTrue($eu->isRegion());
        $this->assertFalse($eu->isCity());
        $this->assertFalse($eu->isCountry());
    }

    /**
     * @covers ::getRepo
     */
    public function testGetRepo()
    {
        $region = new Model\Region();

        $this->assertSame(Repo\Region::get(), $region->getRepo());
    }
}
