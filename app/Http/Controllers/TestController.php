<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use App\Models\Media;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function render(Request $request) {

        $languageModel = new Language();
        $categoryModel = new Category();
        $postModel = new Post();
        $mediaModel = new Media();


        $title = trans('general.home');
        $languages = $languageModel->all();
        $zones = $categoryModel->getOneLevelCategories();
        $zonesNames = [];
        $zonesAmounts = [];

        foreach ($zones as $zone) {
            $zonesNames[] = $categoryModel->getName($zone["id"]);
            $zonesAmounts[] = $postModel->getAmountByCategory($zone["id"]);
        }

        $medias = $mediaModel->getAllByLocaleAddSlug(app()->getLocale());
        $wonkidsSong = $medias[0];
        $wonkidsStory = $medias[1];
        $wonkidsCraft = $medias[2];
        $wonkidsMemorize = $medias[3];
        
        return view('client.test', compact(
            'title', 
            'languages', 
            'zones', 
            'zonesNames', 
            'zonesAmounts', 
            'wonkidsSong', 
            'wonkidsStory', 
            'wonkidsCraft', 
            'wonkidsMemorize',
        ));
    }
}
