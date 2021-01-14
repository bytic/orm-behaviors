<?php

namespace ByTIC\Records\Behaviors\Tests\Fixtures\Models\LoadInCache;

use ByTIC\Records\Behaviors\LoadInCache\LoadInCacheRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class LoadInCacheRecords
 * @package ByTIC\Records\Behaviors\Tests\Fixtures\LoadInCache
 */
class LoadInCacheRecords extends RecordManager
{
    use LoadInCacheRecordsTrait;
}