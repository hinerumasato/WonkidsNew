<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{


    public static function index($view) {
        $categoryModel = new Category();
        $allCategories = Category::all();
        $rootCategories = $categoryModel->getRootCategories();
        $categoryImgs = [];
        $categoryNames = [];
        $rootCategoryNames = [];
        foreach ($allCategories as $category) {
            $categoryImgs[] = $categoryModel->find($category->id)->img;
            $categoryNames[] = $categoryModel->find($category->id)->languages()->where('locale', app()->getLocale())->first()->pivot->name;
        }

        foreach ($rootCategories as $category) {
            $rootCategoryNames[] = $category->languages->where('locale', '=', app()->getLocale())->first()->pivot->name;
        }

        $view->with([
            'allCategories' => $allCategories,
            'categoryImgs' => $categoryImgs,
            'categoryNames' => $categoryNames,
            'rootCategories' => $rootCategories,
            'rootCategoryNames' => $rootCategoryNames,
        ]);
    }
}
