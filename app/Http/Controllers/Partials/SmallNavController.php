<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Language;
use App\Helpers\LoopHelper;
use App\Models\Media;

class SmallNavController extends Controller
{
    public static function index($view) {
        $currentLocale = app()->getLocale();
        $currentLanguage = Language::where('locale', $currentLocale)->first();
        $categories = $currentLanguage->categories;
        $categoriesArr = [];
        foreach($categories as $category) {
            $temp = [];
            $temp['id'] = $category->id;
            $temp['name'] = $category->pivot->name;
            $temp['parent_id'] = $category->parent_id;
            $categoriesArr[] = $temp;
        }

        $oneLevelCategories = LoopHelper::buildHeaderHTML($categoriesArr);
        $mediaModel = new Media();
        $medias = $mediaModel->getAllByLocaleAddSlug(app()->getLocale());
        $smallNavHTML = LoopHelper::buildHTML($oneLevelCategories, 'small-nav_sublist', 'small-nav_subitem', 'small-nav_sublink');

        $view->with([
            'oneLevelCategories' => $oneLevelCategories,
            'medias' => $medias,
            'smallNavHTML' => $smallNavHTML,
        ]);
    }
}
