<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Response\ResponseFactory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postModel;

    public function __construct() {
        $this->postModel = new Post();
    }
    /**
     * [GET]: provide the category id if necessary and response all posts which match with category id
     * else response all posts in db
     */
    public function getPosts(Request $request) {
        $locale = $request->header('locale');
        $categoryId = $request->categoryId;
        
        $postsByCategory = $this->postModel->getPostsByCategoryId($locale, $categoryId);
        if(count($postsByCategory) > 0) {
            return ResponseFactory::response(
                200, 
                'Get Posts Successfully', 
                $postsByCategory
            );
        } else {
            return ResponseFactory::response(404, 'Not post found', null);
        }

    }
}
