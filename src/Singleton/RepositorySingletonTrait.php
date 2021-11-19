<?php

namespace ByTIC\Records\Behaviors\Singleton;

use Nip\Records\Locator\ModelLocator;

/**
 * Trait RepositorySingletonTrait
 * @package ByTIC\Records\Behaviors\Singleton
 */
trait RepositorySingletonTrait
{
    /**
     * @return \Nip\Records\AbstractModels\RecordManager
     */
    public static function instance()
    {
        return ModelLocator::get(static::class);
    }
}
