<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Language;
use App\Models\Media;
use App\Models\PostLanguageMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    private $mediaModel;
    private $postLanguageMediaModel;
    private $languageModel;

    public function __construct()
    {
        $this->mediaModel = new Media();
        $this->postLanguageMediaModel = new PostLanguageMedia();
        $this->languageModel = new Language();
    }

    public function index() {
        $smallSliderTitle = trans('general.media');
        $title = trans('general.media');
        $medias = $this->postLanguageMediaModel->getAllByLocale(app()->getLocale());
        $mediaTypes = $this->mediaModel->getTypeById($medias);
        $mediaNavs = $this->mediaModel->getAllByLocaleAddSlug(app()->getLocale());

        return view('client.media', [
            'title' => $title,
            'smallSliderTitle' => $smallSliderTitle,
            'medias' => $medias,
            'mediaTypes' => $mediaTypes,
            'mediaNavs' => $mediaNavs,
        ]);
    }

    public function indexSlug($mediaSlug) {
        $smallSliderTitle = trans('general.media');
        $title = trans('general.media');

        $mediaType =  $this->mediaModel->getBySlug($mediaSlug, app()->getLocale());
        if($mediaType === null) {
            $allLanguages = $this->languageModel->all();
            foreach ($allLanguages as $language) {
                $mediaType =  $this->mediaModel->getBySlug($mediaSlug, $language->locale);
                if($mediaType != null) {
                    $newSlug = StringHelper::toSlug($mediaType->languages()->where('locale', app()->getLocale())->first()->pivot->name);
                    return redirect()->route('home.media.index-slug', ['mediaSlug' => $newSlug]);
                }
            }
            abort(404);
        }
        
        $medias = $this->postLanguageMediaModel->getAllByIdAndLocale($mediaType->id, app()->getLocale());
        $mediaTypes = $this->mediaModel->getTypeById($medias);
        $mediaNavs = $this->mediaModel->getAllByLocaleAddSlug(app()->getLocale());

        return view('client.media', [
            'title' => $title,
            'smallSliderTitle' => $smallSliderTitle,
            'medias' => $medias,
            'mediaTypes' => $mediaTypes,
            'mediaNavs' => $mediaNavs,
        ]);
    }

    public function detail($mediaSlug, $detailSlug) {
        $smallSliderTitle = trans('general.media');
        $title = trans('general.media');
        $newRoute = route('home.media.index');

        $mediaType =  $this->mediaModel->getBySlug($mediaSlug, app()->getLocale());
        if($mediaType === null) {
            $allLanguages = $this->languageModel->all();
            foreach ($allLanguages as $language) {
                $mediaType =  $this->mediaModel->getBySlug($mediaSlug, $language->locale);
                if($mediaType != null) {
                    $newSlug = StringHelper::toSlug($mediaType->languages()->where('locale', app()->getLocale())->first()->pivot->name);
                    $newRoute .= '/' . $newSlug . '/' . $detailSlug;
                    return redirect($newRoute);
                }
            }
            abort(404);
        }

        $mediaDetail = $this->postLanguageMediaModel->getBySlug($mediaSlug ,$detailSlug, app()->getLocale());
        if($mediaDetail == null)
            abort(404);

        return view('client.media-detail', [
            'title' => $title,
            'smallSliderTitle' => $smallSliderTitle,
            'mediaDetail' => $mediaDetail,
        ]);
    }
}
