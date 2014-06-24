<?php

namespace Harp\Locations\Test\Model;

use Harp\Locations\Model\Location;
use Harp\Locations\Test\AbstractTestCase;

/**
 * @coversDefaultClass Harp\Locations\Model\Country
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class CountryTest extends AbstractTestCase
{
    /**
     * @covers ::isCountry
     * @covers ::getRepo
     */
    public function testCity()
    {
        $germany = Location::find(5);

        $this->assertInstanceOf('Harp\Locations\Model\Country', $germany);
        $this->assertFalse($germany->isRegion());
        $this->assertFalse($germany->isCity());
        $this->assertTrue($germany->isCountry());
    }
}
