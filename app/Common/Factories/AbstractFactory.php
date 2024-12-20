<?php

namespace App\Common\Factories;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Common\DTOs\AbstractDTO;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Http\FormRequest;
use App\Common\ResourceModels\AbstractResourceModel;

abstract class AbstractFactory implements FactoryInterface
{
    public static function fromRequest(Request $request): AbstractDTO
    {
        return static::fromArray($request->all());
    }

    public static function fromRequestWithFiles(FormRequest $request): AbstractDTO
    {
        return static::fromArray(array_merge($request->all(), $request->allFiles()));
    }

    /**
     * @return T
     */
    public static function fromRequestValidated(FormRequest $request): AbstractDTO
    {
        return static::fromArray($request->validated());
    }

    /**
     * @return T
     */
    public static function fromRequestValidatedWithFiles(FormRequest $request): AbstractDTO
    {
        return static::fromArray(array_merge($request->validated(), $request->allFiles()));
    }

    /**
     * @return T
     */
    public static function fromArray(array $array): AbstractDTO
    {
        return static::reader(static::getDTO(), $array);
    }

    /**
     * @return T
     */
    public static function fromCollection(Collection $collection): AbstractDTO
    {
        return static::reader(static::getDTO(), $collection);
    }

    /**
     * @return T
     */
    abstract public static function getDTO(): AbstractDTO;

    /**
     * @param iterable<string, mixed> $iterable
     *
     * @return T
     */
    protected static function reader(AbstractDTO|AbstractResourceModel $class, iterable $iterable): AbstractDTO|AbstractResourceModel
    {
        foreach ($iterable as $key => $value) {
            $key = Str::studly($key);
            $lcFirstKey = lcfirst($key);

            if (method_exists(static::class, 'set' . $key)) {
                $value = static::{'set' . $key}($value);
            }

            if (property_exists($class, $lcFirstKey)) {
                $class->{$lcFirstKey} = $value;
            }
        }

        return $class;
    }
}
