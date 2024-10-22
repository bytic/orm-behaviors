<?php

declare(strict_types=1);

namespace ByTIC\Records\Behaviors\Duplicate;

/**
 *
 */
trait CanDuplicateRecordsTrait
{
    /**
     * @param $data
     * @return mixed
     */
    public function cleanDuplicateData($data)
    {
        $primaryKey = $this->getPrimaryKey();
        unset($data[$primaryKey], $data['created']);

        return $data;
    }
}

