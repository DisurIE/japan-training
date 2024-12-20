<?php

namespace App\Common\DTOs;

use BackedEnum;
use Carbon\Carbon;
use Illuminate\Support\Str;
use JsonSerializable;
use Illuminate\Support\Collection;
use Symfony\Component\Mime\Address;
use Illuminate\Contracts\Support\Arrayable;

class AbstractDTO implements JsonSerializable, Arrayable
{
    public function toArray(): array
    {
        return collect(get_object_vars($this))->mapWithKeys(function ($value, $key) {
            if($value instanceof AbstractDTO) {
                $value = $value->toArray();
            } elseif (is_array($value) || $value instanceof Arrayable) {
                if ($value instanceof Collection) {
                    $value = $value->toArray();
                }

                $value = array_map(function (mixed $value) {
                    if($value instanceof AbstractDTO){
                        return $value->toArray();
                    }

                    return $value;
                }, $value);
            }
            elseif ($value instanceof Carbon) {
                $value = $value->toISOString(true);
            }
            elseif ($value instanceof BackedEnum) {
                $value = $value->value;
            }
            elseif ($value instanceof Address) {
                $value = $value->getAddress();
            }

            return [Str::snake($key) => $value];
        })->toArray();
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
