<?php

namespace Harp\Locations\Test\Repo;

use Harp\Locations\Repo;
use Harp\Locations\Test\AbstractTestCase;
use CL\EnvBackup\StaticParam;

/**
 * @coversDefaultClass Harp\Locations\Repo\City
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class CityTest extends AbstractTestCase
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
        $repo = Repo\City::get();
        $this->assertSame(Repo\Location::get(), $repo->getRootRepo());

        $this->assertInstanceOf('Harp\MP\BelongsTo', $repo->getRel('parent'));
        $this->assertInstanceOf('Harp\MP\HasMany', $repo->getRel('children'));
    }
}
