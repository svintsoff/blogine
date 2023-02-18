<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $page = $request->input('page') * 10 - 9;

        $articles = Article::orderBy("id")->limit(10)->where('id', '>=', $page)->get();

        $result = [
            'status' => 'success',
            'data' => $articles
        ];

        return response()
            ->json($result);
    }

    public function store(Request $request): JsonResponse
    {
        $article = new Article;

        $article->title = $request->input('title');
        $article->text  = $request->input('text');

        $article->save();

        $result = [
            'status' => 'success',
        ];

        return response()
            ->json($result);
    }

    public function show($article): JsonResponse
    {
        $data = Article::find($article);

        $result = [
            'status' => 'success',
            'data' => $data
        ];

        return response()
            ->json($result);
    }

    public function update(Request $request, $article): JsonResponse
    {
        $data = Article::find($article);

        $data->title = $request->input('title');
        $data->text  = $request->input('text');

        $data->save();

        $result = [
            'status' => 'success'
        ];

        return response()
            ->json($result);
    }

    public function destroy($article): JsonResponse
    {
        $data = Article::find($article);

        $data->delete();

        $result = [
            'status' => 'success'
        ];

        return response()
            ->json($result);
    }
}
