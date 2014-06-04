<?php

namespace Harp\Locations\Test\Repo;

use Harp\Locations\Model;
use Harp\Locations\Repo;
use Harp\Locations\Test\AbstractTestCase;
use CL\EnvBackup\StaticParam;

/**
 * @coversDefaultClass Harp\Locations\Repo\Region
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class RegionTest extends AbstractTestCase
{
    private $repoInstanceParam;

    public function setUp()
    {
        parent::setUp();

        $this->repoInstanceParam = new StaticParam('Harp\Locations\Repo\Region', 'instance', null);
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
        $repo = Repo\Region::get();

        $this->assertInstanceOf('Harp\Locations\Repo\Region', $repo);
        $this->assertSame(Repo\Region::get(), $repo);
    }

    /**
     * @covers ::initialize
     */
    public function testInitialize()
    {
        $repo = Repo\Region::get();
        $this->assertSame(Repo\Location::get(), $repo->getRootRepo());

        $this->assertInstanceOf('Harp\MP\BelongsTo', $repo->getRel('parent'));
        $this->assertInstanceOf('Harp\MP\HasMany', $repo->getRel('children'));
    }
}
