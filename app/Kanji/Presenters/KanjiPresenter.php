<?php

namespace App\Kanji\Presenters;

use App\Kanji\Resources\KanjiResource;
use App\Models\Kanji;
use Illuminate\Database\Eloquent\Model;
use App\Common\Presenters\AbstractPresenter;

class KanjiPresenter extends AbstractPresenter
{
    public function present(Kanji|Model|null $model = null): ?KanjiResource
    {
        if (!$model) {
            return null;
        }

        $resource = new KanjiResource();

        $resource->id = $model->id;
        $resource->character = $model->character;
        $resource->meaning = $model->meaning;
        $resource->onyomi = $model->onyomi;
        $resource->kunyomi = $model->kunyomi;
        $resource->importantReading = $model->important_reading;
        $resource->level = $model->level;
        $resource->createdAt = $model->created_at;
        $resource->updatedAt = $model->updated_at;

        return $resource;
    }
}
