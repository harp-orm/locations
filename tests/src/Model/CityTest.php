<?php

namespace Harp\Locations\Test\Model;

use Harp\Locations\Model;
use Harp\Locations\Repo;
use Harp\Locations\Test\AbstractTestCase;

/**
 * @coversDefaultClass Harp\Locations\Model\City
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
        $sofia = Repo\Location::get()->find(11);

        $this->assertInstanceOf('Harp\Locations\Model\City', $sofia);
        $this->assertFalse($sofia->isRegion());
        $this->assertTrue($sofia->isCity());
        $this->assertFalse($sofia->isCountry());
    }

    /**
     * @covers ::getRepo
     */
    public function testGetRepo()
    {
        $city = new Model\City();

        $this->assertSame(Repo\City::get(), $city->getRepo());
    }

}
