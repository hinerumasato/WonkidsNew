<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{


    public static function index($view) {
        $categoryModel = new Category();
        $categoriesData = $categoryModel->getOneLevelCategoriesData(app()->getLocale());

        $view->with([
            'categoriesData' => $categoriesData,
        ]);
    }
}
