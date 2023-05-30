<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model {
    use HasFactory;
    protected $fillable = ['locale', 'name', 'locale'];
    protected $guarded = ['id'];

    public function posts(): BelongsToMany {
        return $this->belongsToMany(Post::class, 'posts_has_languages')->withPivot('title', 'content', 'slug')->withTimestamps();
    }
}
