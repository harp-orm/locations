<?php

namespace Harp\Locations\Test;

use Harp\Locations\Region;
use Harp\Locations\Location;
use CL\EnvBackup\StaticParam;

/**
 * @coversDefaultClass Harp\Locations\RegionRepo
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class RegionRepoTest extends AbstractTestCase
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
        $repo = Region::getRepoStatic();
        $this->assertSame(Location::getRepoStatic(), $repo->getRootRepo());

        $this->assertInstanceOf('Harp\MP\BelongsTo', $repo->getRel('parent'));
        $this->assertInstanceOf('Harp\MP\HasMany', $repo->getRel('children'));
    }
}
