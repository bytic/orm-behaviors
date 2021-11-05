<?php

namespace ByTIC\Records\Behaviors\I18n;

use Nip\I18n\Translatable\HasTranslations;

/**
 * Class I18nRecordsTrait
 * @package ByTIC\Common\Records\Traits\I18n
 */
trait I18nRecordsTrait
{
    use HasTranslations;

    /**
     * @return string
     */
    public function getTranslateRoot()
    {
        return $this->getController();
    }
}
