<?php

namespace ByTIC\Records\Behaviors\HasForms;

use Nip\Form\FormModel;
use \Nip\Records\Traits\AbstractTrait\RecordTrait as AbstractRecordTrait;

/**
 * Class HasFormsRecordTrait
 *
 * @package ByTIC\Records\Behaviors\HasForms
 *
 * @method RecordsTrait getManager
 */
trait HasFormsRecordTrait
{
    use AbstractRecordTrait;

    protected $forms = [];

    /**
     * Get Form object by name
     *
     * @param string $type Form name
     *
     * @return FormModel
     */
    public function getForm($type = null)
    {
        if (!isset($this->forms[$type])) {
            $form = $this->getManager()->newForm($type);

            $this->forms[$type] = $this->initForm($form);
        }

        return $this->forms[$type];
    }

    /**
     * Init a form object for this model
     *
     * @param FormModel $form Form object
     *
     * @return FormModel
     */
    public function initForm($form)
    {
        /** @noinspection PhpParamsInspection */
        $form->setModel($this);

        return $form;
    }
}
