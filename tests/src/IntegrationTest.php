<?php

namespace Harp\Locations\Test;

use Harp\Locations\Repo;
use Harp\Locations\Model;
use CL\EnvBackup\StaticParam;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class IntegrationTest extends AbstractTestCase
{
    /**
     * @coversNothing
     */
    public function testSave()
    {
        $everywhere = Repo\Location::get()->find(1);
        $bulgaria = Repo\Location::get()->findByName('Bulgaria');

        $children = $everywhere->getChildren()->add($bulgaria);

        Repo\Location::get()->save($everywhere);

        $this->assertQueries([
            'SELECT Location.class, Location.* FROM Location WHERE (id = 1) LIMIT 1',
            'SELECT Location.class, Location.* FROM Location WHERE (name = "Bulgaria") LIMIT 1',
            'SELECT Location.class, Location.* FROM Location WHERE (parentId IN (1))',
            'SELECT Location.class, Location.* FROM Location WHERE (path LIKE "1/3/10%")',
            'UPDATE Location SET parentId = CASE id WHEN 10 THEN 1 ELSE parentId END, path = CASE id WHEN 11 THEN "1/10" ELSE path END WHERE (id IN (10, 11))',
        ]);
    }
}
