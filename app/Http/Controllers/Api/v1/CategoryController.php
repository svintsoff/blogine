<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::all();

        $result = [
            'status' => 'success',
            'data' => $categories
        ];

        return response()
            ->json($result);
    }

    public function store(Request $request): JsonResponse
    {
        $category = new Category;

        $category->title = $request->input('title');
        $category->slug = $request->input('slug');

        $category->save();

        $result = [
            'status' => 'success'
        ];

        return response()
            ->json($result);
    }

    public function show($category): JsonResponse
    {
        $data = Article::where('category', '=', $category)->get();

        $result = [
            'status' => 'success',
            'data' => $data
        ];

        return response()
            ->json($result);
    }

    public function update(Request $request, $category): JsonResponse
    {
        $data = Category::find($category);

        $data->title = $request->input('title');
        $data->slug = $request->input('slug');

        $data->save();

        $result = [
            'status' => 'success'
        ];

        return response()
            ->json($result);
    }

    public function destroy($category): JsonResponse
    {
        $data = Category::find($category);

        $data->delete();

        $result = [
            'status' => 'success'
        ];

        return response()
            ->json($result);
    }
}
