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
            $collection = $this->newCollection();
            $result = $this->cacheStore()->get($key);
            $items = unserialize($result);
            $collection->setItems($items);
            return $collection;
        }
        $result = $this->findByParams();
        $data = serialize($result->all());
        $this->cacheStore()->set($key, $data);
        return $result;
    }
}
