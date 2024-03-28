<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Language;
use App\Models\Media;
use App\Helpers\LoopHelper;
use App\Helpers\StringHelper;
use App\Models\Menu;

class HeaderController extends Controller
{
    public static function index($view) {
        $mediaModel = new Media();
        $currentLocale = app()->getLocale();
        $currentLanguage = Language::where('locale', $currentLocale)->first();
        $categories = $currentLanguage->categories;
        $categoriesArr = LoopHelper::filterCategory($categories);
        
        $languages = Language::all();
        $oneLevelCategories = LoopHelper::buildHeaderHTML($categoriesArr);

        $mediaModel = new Media();
        $medias = $mediaModel->getAllByLocaleAddSlug(app()->getLocale());

        $subCategoriesList = LoopHelper::buildHTML($oneLevelCategories, 'menu_submenu', 'menu_subitem', 'menu_sublink');
        $subMobileCategoriesList = LoopHelper::buildHTML($oneLevelCategories, 'nav-list', 'nav-item', 'nav-link');
        $sideNav = LoopHelper::buildSideNavHTML(
            $oneLevelCategories, 
            'side-nav-submenu', 
            'side-nav-subitem', 
            'side-nav-sublink'
        );

        $view->with([
            'oneLevelCategories' => $oneLevelCategories,
            'languages' => $languages,
            'currentLanguage' => $currentLanguage,
            'medias' => $medias,
            'subCategoriesList' => $subCategoriesList,
            'subMobileCategoriesList' => $subMobileCategoriesList,
            'sideNav' => $sideNav,
        ]);
    }
}
