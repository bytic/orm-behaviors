<?php

declare(strict_types=1);

namespace ByTIC\Records\Behaviors\Duplicate;

/**
 *
 */
trait CanDuplicateRecordTrait
{

    public function duplicate($data = [])
    {
        $oldData = $this->getManager()->cleanDuplicateData($this->toArray());
        $newItem = $this->getManager()->getNew();

        $data = array_merge($oldData, $data);
        foreach ($data as $key => $value) {
            $newItem->setAttribute($key, $value);
        }

        $newItem->insert();

        return $newItem;
    }
}

