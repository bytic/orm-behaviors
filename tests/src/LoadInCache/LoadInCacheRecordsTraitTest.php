<?php

namespace ByTIC\Records\Behaviors\Tests\LoadInCache;

use ByTIC\Memoize\Memoizer;
use ByTIC\Records\Behaviors\Tests\Fixtures\Models\LoadInCache\LoadInCacheRecords;
use ByTIC\Records\Behaviors\Tests\AbstractTest;
use Mockery\Mock;
use Nip\Records\Collections\Collection;
use Nip\Records\Record;

/**
 * Class LoadInCacheRecordsTraitTest
 * @package ByTIC\Records\Behaviors\LoadInCache
 */
class LoadInCacheRecordsTraitTest extends AbstractTest
{
    public function test_findOne_usesCache()
    {
        /** @var Mock|LoadInCacheRecords $manager */
        $manager = \Mockery::mock(LoadInCacheRecords::class)->makePartial();
        $manager->shouldReceive('findByParams')->once()->andReturnUsing(
            function () {
                return new Collection();
            }
        );

        $all = $manager->getAll();
        self::assertInstanceOf(Collection::class, $all);

        $find = $manager->findOne(1);
        self::assertNull($find);
    }

    public function test_serialization()
    {
        $record = new Record();
        $record->id = 1;
        $records = new Collection();
        $records[1] = $record;

        /** @var Mock|LoadInCacheRecords $manager */
        $manager = \Mockery::mock(LoadInCacheRecords::class)->makePartial();
        $manager->shouldReceive('findByParams')->once()->andReturn($records);

        $all = $manager->getAll();
        self::assertSame($all, $records);

        $manager->unmemoize('all');
        $all = $manager->getAll();
        self::assertEquals($all, $records);
    }
}