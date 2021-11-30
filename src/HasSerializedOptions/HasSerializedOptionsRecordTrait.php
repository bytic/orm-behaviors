<?php

namespace ByTIC\Records\Behaviors\HasSerializedOptions;

/**
 * Class HasSerializedOptionsRecordTrait
 * @package ByTIC\Records\Behaviors\HasSerializedOptions
 *
 * @property string $options
 *
 */
trait HasSerializedOptionsRecordTrait
{
    use \Nip\Records\Traits\AbstractTrait\RecordTrait;

    /**
     * @var null|array
     */
    protected $optionsArray = null;

    /**
     * @return array
     */
    public function getOptions(): array
    {
        $this->checkOptions();
        return $this->optionsArray;
    }

    public function checkOptions()
    {
        if ($this->optionsArray == null) {
            $this->initOptions();
        }
    }

    public function initOptions()
    {
        $options = unserialize($this->getAttributeFromArray('options'));
        $options = (is_array($options)) ? $options : [];
        $this->optionsArray = $options;
    }

    /**
     * @param $name
     * @param null $default
     * @return mixed
     */
    public function getOption($name, $default = null)
    {
        $this->checkOptions();
        return $this->optionsArray[$name] ?? $default;
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function setOption($name, $value)
    {
        $this->checkOptions();
        return $this->optionsArray[$name] = $value;
    }

    public function serializeOptions()
    {
        $this->options = serialize($this->getOptions());
    }
}
