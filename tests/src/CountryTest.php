<?php

namespace Harp\Locations\Test;

use Harp\Locations\Location;

/**
 * @coversDefaultClass Harp\Locations\Country
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

        $this->assertInstanceOf('Harp\Locations\Country', $germany);
        $this->assertFalse($germany->isRegion());
        $this->assertFalse($germany->isCity());
        $this->assertTrue($germany->isCountry());
    }
}
