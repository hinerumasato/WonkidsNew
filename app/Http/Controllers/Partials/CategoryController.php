<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public static function index($view) {
        $categoryModel = new Category();
        $oneLevelCategories = $categoryModel->getOneLevelCategories();

        $categoryImgs = [];
        $categoryNames = [];
        foreach ($oneLevelCategories as $category) {
            $categoryImgs[] = $categoryModel->find($category['id'])->img;
            $categoryNames[] = $categoryModel->find($category['id'])->languages()->where('locale', app()->getLocale())->first()->pivot->name;
        }

        $view->with([
            'oneLevelCategories' => $oneLevelCategories,
            'categoryImgs' => $categoryImgs,
            'categoryNames' => $categoryNames,
        ]);
    }
}
