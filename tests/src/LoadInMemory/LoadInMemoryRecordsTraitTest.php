<?php

namespace ByTIC\Records\Behaviors\LoadInMemory;

use ByTIC\Records\Behaviors\Fixtures\Models\LoadInMemory\LoadInMemoryRecords;
use ByTIC\Records\Behaviors\Tests\AbstractTest;
use Mockery\Mock;
use Nip\Records\Collections\Collection;

/**
 * Class LoadInMemoryRecordsTraitTest
 * @package ByTIC\Records\Behaviors\LoadInMemory
 */
class LoadInMemoryRecordsTraitTest extends AbstractTest
{
    public function test_findOne_usesCache()
    {
        /** @var Mock|LoadInMemoryRecords $manager */
        $manager = \Mockery::mock(LoadInMemoryRecords::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $manager->shouldReceive('retrieveForMemory')->once()->andReturnUsing(function () {
            return new Collection();
        });

        $all = $manager->findAll();
        self::assertInstanceOf(Collection::class, $all);

        $find = $manager->findOne(1);
        self::assertNull($find);
    }
}