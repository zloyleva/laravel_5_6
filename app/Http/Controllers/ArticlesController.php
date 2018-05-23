<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Article $article){
//        return $article->paginate(5);
        return ArticleResource::collection($article->paginate(5));
    }

    public function show($id, Article $article){
        return new ArticleResource($article->findOrFail($id));
    }

    public function delete($id, Article $article){
        $item = $article->findOrFail($id);

        if($item->delete()){
            return response([
                'message' => 'was deleted'
            ]);
        }
    }
}
