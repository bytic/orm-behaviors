<?php

namespace ByTIC\Records\Behaviors\HasSerializedOptions;

use Nip\Records\EventManager\Events\Event;

/**
 * Class HasSerializedOptionsRecordTrait
 * @package ByTIC\Records\Behaviors\HasSerializedOptions
 *
 * @property string $options
 *
 */
trait HasSerializedOptionsRecordsTrait
{
    public function bootHasSerializedOptionsRecordsTrait()
    {
        $closure = function (Event $event) {
            $record = $event->getRecord();
            $record->serializeOptions();
        };
        static::creating($closure);
        static::updating($closure);
        static::saving($closure);
    }
}
