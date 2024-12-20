<?php

namespace App\Common\Presenters;

use App\Common\Traits\AsIterable;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractPresenter
{
    use AsIterable;

    abstract public function present(Model $model);
}
