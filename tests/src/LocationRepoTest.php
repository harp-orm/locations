<?php

namespace Harp\Locations\Test;

use Harp\Locations\Location;
use CL\EnvBackup\StaticParam;

/**
 * @coversDefaultClass Harp\Locations\LocationRepo
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class LocationRepoTest extends AbstractTestCase
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
     * @covers Harp\Locations\Location::findByCode
     * @covers ::findByCode
     */
    public function testFindByCode()
    {
        $model = Location::findByCode('BG');
        $expected = Location::findByName('Bulgaria');

        $this->assertSame($model, $expected);
    }

    /**
     * @covers ::initialize
     */
    public function testInitialize()
    {
        $repo = Location::getRepoStatic();

        $this->assertInstanceOf('Harp\MP\BelongsTo', $repo->getRel('parent'));
        $this->assertInstanceOf('Harp\MP\HasMany', $repo->getRel('children'));

        $location = new Location();

        $this->assertFalse($location->validate());

        $this->assertEquals('name must be present', $location->getErrors()->humanize());

        $location->name = 'test';

        $this->assertTrue($location->validate());
    }
}