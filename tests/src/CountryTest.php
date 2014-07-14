<?php

namespace Harp\Locations\Test;

use Harp\Locations\Location;
use Harp\Locations\Country;

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
     * @covers ::initialize
     */
    public function testInitialize()
    {
        $repo = Country::getRepo();

        $this->assertInstanceOf('Harp\MP\BelongsTo', $repo->getRel('parent'));
        $this->assertInstanceOf('Harp\MP\HasMany', $repo->getRel('children'));

        $city = new Country(['name' => 'test']);

        $this->assertFalse($city->validate());

        $this->assertEquals('code must be present', $city->getErrors()->humanize());

        $city->code = '1';

        $this->assertFalse($city->validate());

        $this->assertEquals('code should be 2 letters', $city->getErrors()->humanize());

        $city->code = 'BG';

        $this->assertTrue($city->validate());
    }

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
