<?php

namespace Harp\Locations\Test;

use Harp\Locations\Location;

/**
 * @coversDefaultClass Harp\Locations\City
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class CityTest extends AbstractTestCase
{
    /**
     * @covers ::isCity
     * @covers ::getRepo
     */
    public function testCity()
    {
        $sofia = Location::find(11);

        $this->assertInstanceOf('Harp\Locations\City', $sofia);
        $this->assertFalse($sofia->isRegion());
        $this->assertTrue($sofia->isCity());
        $this->assertFalse($sofia->isCountry());
    }
}
