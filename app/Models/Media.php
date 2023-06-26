<?php

namespace App\Models;

use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Media extends Model
{
    use HasFactory;
    protected $table = 'medias';

    public function languages(): BelongsToMany {
        return $this->belongsToMany(Language::class, 'medias_languages')->withPivot('name');
    }

    public function getAllByLocale($locale) {
        $languageModel = new Language();
        $language = $languageModel->findByLocale($locale);
        return $language->medias;
    }

    public function getAllByLocaleAddSlug($locale) {
        $result = [];
        $all = $this->getAllByLocale($locale);
        foreach ($all as $item) {
            $result[] = [
                'name' => $item->pivot->name,
                'slug' => StringHelper::toSlug($item->pivot->name),
            ];
        }
        return $result;
    }

    public function getBySlug($slug, $locale) {
        $medias = $this->getAllByLocale($locale);
        foreach ($medias as $media) {
            $mediaSlug = StringHelper::toSlug($media->pivot->name);
            if($slug === $mediaSlug)
                return $media;
        }
        return null;
    }

    public function getTypeById($medias) {
        $types = [];
        foreach ($medias as $media) {
            $types[] = $this->find($media->media_id)->languages()->where('locale', app()->getLocale())->first()->pivot->name;
        }
        return $types;
    }
}
