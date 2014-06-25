<?php

namespace Harp\Locations\Test;

use Harp\Locations\Country;
use Harp\Locations\Location;
use CL\EnvBackup\StaticParam;

/**
 * @coversDefaultClass Harp\Locations\CountryRepo
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class CountryRepoTest extends AbstractTestCase
{
    private $repoInstanceParam;

    public function setUp()
    {
        parent::setUp();

        $this->repoInstanceParam = new StaticParam('Harp\Core\Repo\AbstractRepo', 'instances', null);
        $this->repoInstanceParam->apply();
    }

    public function tearDown()
    {
        if ($this->repoInstanceParam) {
            $this->repoInstanceParam->restore();
        }

        parent::tearDown();
    }

    /**
     * @covers ::initialize
     */
    public function testInitialize()
    {
        $repo = Country::getRepoStatic();
        $this->assertSame(Location::getRepoStatic(), $repo->getRootRepo());

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
}
