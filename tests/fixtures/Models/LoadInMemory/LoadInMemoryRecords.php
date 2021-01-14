<?php

namespace ByTIC\Records\Behaviors\Fixtures\Models\LoadInMemory;

use ByTIC\Records\Behaviors\LoadInMemory\LoadInMemoryRecordsTrait;
use Nip\Records\Collections\Collection;
use Nip\Records\RecordManager;

/**
 * Class LoadInMemoryRecords
 * @package ByTIC\Records\Behaviors\Fixtures\LoadInMemory
 */
class LoadInMemoryRecords extends RecordManager
{
    use LoadInMemoryRecordsTrait;

    protected function retrieveForMemory()
    {
        return new Collection();
    }
}