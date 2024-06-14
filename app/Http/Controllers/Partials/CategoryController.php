<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public static function index($view) {
        $rootCategories = Category::where('parent_id', 0)->get();
        $categoryMap = Category::findAllWithRoot();

        $view->with([
            'categoryMap' => $categoryMap,
            'rootCategories' => $rootCategories,
        ]);
    }
}
