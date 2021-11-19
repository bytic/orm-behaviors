<?php

namespace ByTIC\Records\Behaviors\Tests\Singleton;

use ByTIC\Records\Behaviors\Tests\AbstractTest;
use ByTIC\Records\Behaviors\Tests\Fixtures\Models\LoadInMemory\LoadInMemoryRecords;
use Nip\Records\Locator\ModelLocator;

/**
 * Class RecordsSingletonTrait
 * @package ByTIC\Records\Behaviors\Tests\Singleton
 */
class RecordsSingletonTrait extends AbstractTest
{
    public function test_singleton()
    {
        $manager = new LoadInMemoryRecords();
        ModelLocator::set(LoadInMemoryRecords::class, $manager);
        $this->assertSame($manager, LoadInMemoryRecords::instance());
    }
}
