<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SliderDescription extends Model
{
    use HasFactory;
    protected $table = 'slider_description';
    protected $fillable = ['content', 'language_id'];

    public function languages(): HasMany {
        return $this->hasMany(Language::class);
    }

    public function getDescriptionByLocale($locale) {
        $languageModel = new Language();
        $language = $languageModel->findByLocale($locale);
        $sliderDescription = $this->where('language_id', $language->id)->first();
        if($sliderDescription)
            return $sliderDescription->content;
        else return '';
    }

    public function getAllDescription() {
        $result = [];
        $languageModel = new Language();
        foreach ($this->all() as $item) {
            $locale = $languageModel->find($item->language_id)->locale;
            $result[$locale] = $item->content;
        }
        return $result;
    }

    public function updateByLocale($locale, $value) {
        $languageModel = new Language();
        $language = $languageModel->findByLocale($locale);
        $updateRow = $this->where('language_id', $language->id)->first();
        if($updateRow) {
            $updateRow->content = $value;
            $updateRow->update();
        }

        else {
            $this->create([
                'language_id' => $language->id,
                'content' => $value,
            ]);
        }
    }
}
