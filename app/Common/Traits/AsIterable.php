<?php

namespace App\Common\Traits;

use App\Common\Exceptions\PresentNotFoundException;
use Illuminate\Support\Collection;

trait AsIterable
{

    /**
     * @throws PresentNotFoundException
     */
    public function collection(iterable $models): Collection
    {
        return new Collection($this->array($models));
    }

    public function array(iterable $models): array
    {
        if(!method_exists($this, 'present')) {
            throw new PresentNotFoundException("Необходимо реализовать метод present");
        }

        $result = [];

        foreach ($models as $model) {
            $present = $this->present($model);

            if($present) {
                $result[] = $present;
            }
        }

        return $result;
    }
}
