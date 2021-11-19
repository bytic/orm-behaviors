<?php

namespace ByTIC\Records\Behaviors\Tests\Fixtures\Models\LoadInMemory;

use ByTIC\Records\Behaviors\LoadInMemory\LoadInMemoryRecordsTrait;
use ByTIC\Records\Behaviors\Singleton\RepositorySingletonTrait;
use Nip\Records\Collections\Collection;
use Nip\Records\RecordManager;

/**
 * Class LoadInMemoryRecords
 * @package ByTIC\Records\Behaviors\Fixtures\LoadInMemory
 */
class LoadInMemoryRecords extends RecordManager
{
    use LoadInMemoryRecordsTrait;
    use RepositorySingletonTrait;

    protected function retrieveForMemory()
    {
        return new Collection();
    }
}