<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
    use HasFactory;
    protected $table;

    public function __construct($table) {
        $this->table = $table;
    }

    public function getAllPosts() {
        $locale = app()->getLocale();
        $posts = DB::table($this->table)->where("locale", $locale)->get();
        return $posts;
    }
}
