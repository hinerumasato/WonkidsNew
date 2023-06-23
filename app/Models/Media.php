<?php

namespace App\Models;

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
}
