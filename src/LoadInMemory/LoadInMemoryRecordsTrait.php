<?php

namespace ByTIC\Records\Behaviors\LoadInMemory;

use Nip\Records\Collections\Collection;
use Nip\Records\Record;

/**
 * Trait LoadInMemoryRecordsTrait
 * @package ByTIC\Records\Behaviors\LoadInMemory
 */
trait LoadInMemoryRecordsTrait
{
    use \ByTIC\Memoize\Traits\Memoizable;

    /**
     * @return Record
     */
    public function findOne($primary)
    {
        $records = $this->getAll();
        return isset($records[$primary]) ? $records[$primary] : null;
    }

    public function findAll()
    {
        return $this->getAll();
    }

    /**
     * @return Collection
     */
    public function getAll()
    {
        return $this->memoizeWithMethod('all', 'retrieveForMemory');
    }

    protected function retrieveForMemory()
    {
        return $this->findByParams();
    }
}
