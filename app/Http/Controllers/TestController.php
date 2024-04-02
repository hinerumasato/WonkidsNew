<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use App\Models\Media;
use Illuminate\Http\Request;

class TestController extends Controller
{

    private $postModel;
    public function __construct() {
        $this->postModel = new Post();
    }
    public function index(Request $request) {
        $testCategoryId = 9;
        return view("test.index", [
            'data' => $this->postModel->getPostsByCategoryId(app()->getLocale(), $testCategoryId)
        ]);
    }
}
