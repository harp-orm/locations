<?php

namespace Harp\Locations\Test\Model;

use Harp\Locations\Model;
use Harp\Locations\Repo;
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
        $germany = Repo\Location::get()->find(5);

        $this->assertInstanceOf('Harp\Locations\Model\Country', $germany);
        $this->assertFalse($germany->isRegion());
        $this->assertFalse($germany->isCity());
        $this->assertTrue($germany->isCountry());
    }

    /**
     * @covers ::getRepo
     */
    public function testGetRepo()
    {
        $country = new Model\Country();

        $this->assertSame(Repo\Country::get(), $country->getRepo());
    }
}
