<?php

namespace App\Models;

use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLanguageMedia extends Model
{
    use HasFactory;
    protected $table = 'posts_languages_medias';
    protected $fillable = ['post_id', 'language_id', 'media_id', 'title', 'content'];

    public function insert($post_id, $language_id, $media_id, $title, $content) {
        $this->create([
            'post_id' =>  $post_id, 
            'language_id' =>  $language_id, 
            'media_id' =>  $media_id, 
            'title' =>  $title, 
            'content' =>  $content,
        ]);
    }

    public function getAllByIdAndLocale($id, $locale) {
        $language = Language::where('locale', $locale)->first();
        return $this->where('media_id', $id)->where('language_id', $language->id)->get();
    }

    public function getAllByLocale($locale) {
        $language = Language::where('locale', $locale)->first();
        return $this->where('language_id', $language->id)->get();
    }

    public function getByPostIdLanguageId($post_id, $language_id) {
        return $this->where('language_id', $language_id)->where('post_id', $post_id)->get();
    }

    public function updateByPostIdLanguageId($post_id, $language_id, $title) {
        $all = $this->getByPostIdLanguageId($post_id, $language_id);
        foreach ($all as $item) {
            $item->title = $title;
            $item->update();
        }
    } 

    public function getBySlug($typeSlug, $slug, $locale) {
        $mediaModel = new Media();
        $type = $mediaModel->getBySlug($typeSlug, $locale);

        $language = Language::where('locale', $locale)->first();
        $all = $this->where('language_id', $language->id)->where('media_id', $type->id)->get();
        
        foreach($all as $item) {
            $itemSlug = StringHelper::toSlug($item->title);
            if($itemSlug === $slug) {
                return $item;
            }
        }
        return null;
    }
}
