<?php

namespace App\Models;

use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model {
    use HasFactory;
    protected $fillable = ['locale', 'name', 'locale'];
    protected $guarded = ['id'];

    public function posts(): BelongsToMany {
        return $this->belongsToMany(Post::class, 'posts_has_languages')->withPivot('title', 'content', 'slug', 'user_id', 'view')->withTimestamps();
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'categories_has_languages')->withPivot('name')->withTimestamps();
    }

    public function medias(): BelongsToMany {
        return $this->belongsToMany(Media::class, 'medias_languages')->withPivot('name');
    }

    public function menus(): BelongsToMany {
        return $this->belongsToMany(Menu::class, 'menu_language')->withPivot('name');
    }

    public function sliderDescription(): BelongsTo {
        return $this->belongsTo(SliderDescription::class);
    }

    public function findByLocale($locale) {
        return $this->where('locale', $locale)->first();
    }

    public function allLocale() {
        $locales = [];
        foreach ($this->all() as $item) {
            $locales[] = $item->locale;
        }
        return $locales;
    }

    public function translateSlug($mediaType, $locale) {
        $name = $this->findByLocale($locale)->medias()->find($mediaType->id)->pivot->name;
        return StringHelper::toSlug($name);
    }
}
