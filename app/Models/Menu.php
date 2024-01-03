<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = ['id', 'url', 'parent_id', 'number'];

    public function languages(): BelongsToMany {
        return $this->belongsToMany(Language::class, 'menu_language')->withPivot('name');
    }

    public function findAllWithLanguage(): array {
        $languageModel = new Language();
        $currentLanguage = $languageModel->findByLocale(app()->getLocale());
        $all = $this->all();
        $result = [];
        foreach ($all as $item) {
            $language = $item->languages()->find($currentLanguage->id);
            $result[] = [
                'name' => $language->pivot->name,
                'url' => $item->url,
            ];
        }

        return $result;
    }
}
