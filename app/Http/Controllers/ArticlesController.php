<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * @param Article $article
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Article $article){
        return ArticleResource::collection($article->paginate(5));
    }

    /**
     * @param $id
     * @param Article $article
     * @return ArticleResource
     */
    public function show($id, Article $article){
        return new ArticleResource($article->findOrFail($id));
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return ArticleResource|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request, Article $article){
        $item = $request->isMethod('put') ?$article->findOrFail($request->id): $article;

        $item->id =$request->input('id');
        $item->title =$request->input('title');
        $item->body =$request->input('body');
        if($item->save()){
            return new ArticleResource($item);
        }
        return response(['error' => 'smth went wrong']);
    }

    /**
     * @param $id
     * @param Article $article
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function delete($id, Article $article){
        $item = $article->findOrFail($id);

        if($item->delete()){
            return response([
                'message' => 'was deleted'
            ]);
        }
    }
}
