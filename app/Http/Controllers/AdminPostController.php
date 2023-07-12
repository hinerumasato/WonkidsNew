<?php

namespace App\Http\Controllers;

use App\Helpers\LoopHelper;
use Illuminate\Http\Request;
use App\Helpers\StringHelper;

use App\Models\Language;
use App\Models\Post;
use App\Models\Media;
use App\Models\MediaStagingArea;
use App\Models\PostLanguageMedia;
use App\Models\PostLanguageUploadImg;
use App\Models\StagingArea;
use App\Models\UploadImg;

class AdminPostController extends Controller
{
    public function index(Request $request) {
        $title = trans('crud.add-post');
        $areaModel = new StagingArea();
        $mediaModel = new Media();
        $languageLocale = $request->input('post_lang') ?? 'vi';
        $language = Language::where('locale', $languageLocale)->first();
        $categories = $language->categories;
        $categoriesArr = LoopHelper::filterCategory($categories);
        $categories = LoopHelper::dataTree($categoriesArr);
        $languages = Language::all();
        $imgLinks = $areaModel->getImgLinks();
        $otherFiles = $areaModel->getAllOtherFiles();

        $data = [
            "title" => '',
            "content" => '',
            'medias' => $mediaModel->getAllByLocale($languageLocale),
        ];

        return view('admin.add-post', 
            [
                "categories" => $categories, 
                "languages" => $languages, 
                "languageLocale" => $languageLocale, 
                "imgLinks" => $imgLinks,
                "otherFiles" => $otherFiles,
                "title" => $title,
                "data" => $data,
            ]
        );

    }

    public function editIndex($post_id, $language_id) {
        $title = trans('crud.edit-post');
        $categories = Language::find($language_id)->categories;
        $categoriesArr = LoopHelper::filterCategory($categories);
        $categories = LoopHelper::dataTree($categoriesArr);
        $languages = Language::all();
        $post = Post::find($post_id);
        $category_id = $post->category_id;
        $language = $post->languages->where('id', $language_id)->first();
        $mediaModel = new Media();
        $uploadImgModel = new UploadImg();
        
        $imgUploads = PostLanguageUploadImg::where('post_id', $post_id)->where('language_id', $language_id)->get();
        $imgLinks = [];
        $otherFiles = [];
        if(count($imgUploads) > 0) {
            foreach ($imgUploads as $img) {
                $uploadImg = $uploadImgModel->findById($img->upload_img_id);
                $link = $uploadImg->link;
                $extension = StringHelper::getExtension($link);
                if(StringHelper::isImageFile($extension))
                    $imgLinks[] = $link;
                else {
                    //This $img is not a img, this is a .docx, .pdf file so i change it to the new variable to store it
                    $otherFile = $uploadImg;
                    $otherFiles[] = $otherFile;
                }

            }
            
        }

        $data = [
            "post_id" => $post->id,
            "category_id" => $category_id,
            "language_id" => $language_id,
            "title" => $language->pivot->title,
            "content" => $language->pivot->content,
            'medias' => $mediaModel->getAllByLocale($language->locale),
        ];

        return view('admin.edit-post', 
            [
                "data" => $data, 
                "categories" => $categories, 
                "languages" => $languages, 
                "imgLinks" => $imgLinks,
                "otherFiles" => $otherFiles,
                "title" => $title,
            ]
        );
    }
    
    public function postAdd(Request $request) {


        $validate = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ], [
            'title.required' => "Vui lòng nhập tiêu đề",
            'content.required' => "Vui lòng nhập nội dung",
        ]);

        $areas = StagingArea::all();
        $mediaAreaModel = new MediaStagingArea();
        $postLanguageMedia = new PostLanguageMedia();

        $uploadImgs = [];
        foreach ($areas as $area) {
            $uploadImgs[] = UploadImg::create([
                'link' => $area->link,
                'name' => $area->name,
            ]);
            StagingArea::destroy($area->id);
        }
        
        $title = $request->input("title");
        $content = $request->input("content");
        $category_id = $request->input("category_id");
        $language_locale = $request->input("language_locale");
        $language_id = Language::where('locale', $language_locale)->first()->id;
        
        Post::create([
            'category_id' => $category_id
        ]);


        $newestPostId = Post::orderBy('id', 'desc')->get()->first()->id;

        foreach ($mediaAreaModel->all() as $media) {

            foreach (Language::all() as $language) {
                if($language->id != $language_id) {
                    $postLanguageMedia->insert($newestPostId, $language->id, $media->id, $title, null);   
                }
                else {
                    if($media->content != null)
                        $postLanguageMedia->insert($newestPostId, $language_id, $media->id, $title, $media->content);
                    else $postLanguageMedia->insert($newestPostId, $language_id, $media->id, $title, null);
                }
            }

        }

        $mediaAreaModel->refresh();

        $post = Post::find($newestPostId);
        $post->languages()->attach([
            $language_id => [
                "title" => $title, 
                "content" => $content, 
                "slug" => StringHelper::toSlug($title),
            ],
        ]);

        foreach ($uploadImgs as $img) {
            PostLanguageUploadImg::create([
                'upload_img_id' => $img->id,
                'post_id' => $newestPostId,
                'language_id' => $language_id,
            ]);
        }

        $languages = Language::all();
        foreach($languages as $language) {
            if($language->id != $language_id) {
                $id = $language->id;
                $post->languages()->attach([
                    $id => [
                        "title" => $title, 
                        "content" => $content,
                        "slug" => StringHelper::toSlug($title),
                    ],
                ]);
            }
        }

        return redirect()->route('admin.index')->with('msg', trans('general.add-post-success'));
    }

    public function putEdit(Request $request, $post_id, $language_id) {


        $validate = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ], [
            'title.required' => "Vui lòng nhập tiêu đề",
            'content.required' => "Vui lòng nhập nội dung",
        ]);

        $postLanguageMediaModel = new PostLanguageMedia();

        $postLanguageMediaModel->updateByPostIdLanguageId($post_id, $language_id, $request->title);

        $post = Post::find($post_id);
        $title = $request->input('title');
        $content = $request->input('content');
        $locale = Language::find($language_id)->locale;
        $category_id = $request->category_id;
        
        $post->languages()->updateExistingPivot($language_id, [
            "title" => $title,
            "content" => $content,
            "slug" => StringHelper::toSlug($title),
        ]);

        $post->category_id = $category_id;
        $post->save();

        $redirectUrl = route('admin.index').'/?post_lang='.$locale;

        return redirect($redirectUrl)->with('msg', trans('general.edit-post-success'));
    }

    public function deleteOne($post_id) {
        $postModel = new Post();
        $postModel->deleteOne($post_id);
        return redirect()->route('admin.index')->with('msg', trans('general.delete-post-success'));
    }

    public function deleteMany(Request $request) {
        $postModel = new Post();
        $idsStr = explode(",", $request->postIds);
        $ids = array_map(function($str) {
            return intval($str); 
        }, $idsStr);

        foreach ($ids as $id) {
            $postModel->deleteOne($id);
        }
        return redirect()->route('admin.index')->with('msg', trans('general.delete-post-success'));
    }
}