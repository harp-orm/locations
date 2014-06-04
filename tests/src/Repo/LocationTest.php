<?php

namespace Harp\Locations\Test\Repo;

use Harp\Locations\Model;
use Harp\Locations\Repo;
use Harp\Locations\Test\AbstractTestCase;
use CL\EnvBackup\StaticParam;

/**
 * @coversDefaultClass Harp\Locations\Repo\Location
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class LocationTest extends AbstractTestCase
{
    private $repoInstanceParam;

    public function setUp()
    {
        parent::setUp();

        $this->repoInstanceParam = new StaticParam('Harp\Locations\Repo\Location', 'instance', null);
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
    public function testLocation()
    {
        $repo = Repo\Location::get();

        $this->assertInstanceOf('Harp\Locations\Repo\Location', $repo);
        $this->assertSame(Repo\Location::get(), $repo);
    }

    /**
     * @covers ::findByCode
     */
    public function testFindByCode()
    {
        $model = Repo\Location::get()->findByCode('BG');
        $expected = Repo\Location::get()->findByName('Bulgaria');

        $this->assertSame($model, $expected);
    }

    /**
     * @covers ::initialize
     */
    public function testInitialize()
    {
        $repo = Repo\Location::get();

        $this->assertInstanceOf('Harp\MP\BelongsTo', $repo->getRel('parent'));
        $this->assertInstanceOf('Harp\MP\HasMany', $repo->getRel('children'));

        $location = new Model\Location();

        $this->assertFalse($location->validate());

        $this->assertEquals('name must be present', $location->getErrors()->humanize());

        $location->name = 'test';

        $this->assertTrue($location->validate());
    }
}
