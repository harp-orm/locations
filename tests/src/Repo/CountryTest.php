<?php

namespace Harp\Locations\Test\Repo;

use Harp\Locations\Model;
use Harp\Locations\Repo;
use Harp\Locations\Test\AbstractTestCase;
use CL\EnvBackup\StaticParam;

/**
 * @coversDefaultClass Harp\Locations\Repo\Country
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class CountryTest extends AbstractTestCase
{
    private $repoInstanceParam;

    public function setUp()
    {
        parent::setUp();

        $this->repoInstanceParam = new StaticParam('Harp\Locations\Repo\Country', 'instance', null);
        $this->repoInstanceParam->apply();
    }

    public function tearDown()
    {
        $this->repoInstanceParam->restore();

        parent::tearDown();
    }

    /**
     * @covers ::get
     */
    public function testGet()
    {
        $repo = Repo\Country::get();

        $this->assertInstanceOf('Harp\Locations\Repo\Country', $repo);
        $this->assertSame(Repo\Country::get(), $repo);
    }

    /**
     * @covers ::initialize
     */
    public function testInitialize()
    {
        $repo = Repo\Country::get();
        $this->assertSame(Repo\Location::get(), $repo->getRootRepo());

        $this->assertInstanceOf('Harp\MP\BelongsTo', $repo->getRel('parent'));
        $this->assertInstanceOf('Harp\MP\HasMany', $repo->getRel('children'));

        $city = new Model\Country(['name' => 'test']);

        $this->assertFalse($city->validate());

        $this->assertEquals('code must be present', $city->getErrors()->humanize());

        $city->code = '1';

        $this->assertFalse($city->validate());

        $this->assertEquals('code should be 2 letters', $city->getErrors()->humanize());

        $city->code = 'BG';

        $this->assertTrue($city->validate());
    }
}
