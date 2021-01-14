<?php

namespace ByTIC\Records\Behaviors\LoadInCache;

use ByTIC\Records\Behaviors\LoadInMemory\LoadInMemoryRecordsTrait;
use Nip\Cache\Cacheable\HasCacheStore;

/**
 * Trait LoadInCacheRecordsTrait
 * @package ByTIC\Records\Behaviors\LoadInCache
 */
trait LoadInCacheRecordsTrait
{
    use LoadInMemoryRecordsTrait;
    use HasCacheStore;

    protected function retrieveForMemory()
    {
        $key = str_replace('\\', '-', __CLASS__) . '_all';
        if ($this->cacheStore()->has($key)) {
            $result = $this->cacheStore()->get($key);
            return unserialize($result);
        }
        $result = $this->findByParams();
        $data = serialize($result);
        $this->cacheStore()->set($key, $data);
        return $result;
    }
}
