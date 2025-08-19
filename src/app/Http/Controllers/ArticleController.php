<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        return response()->json($this->articleService->getAll());
    }

    public function show($id)
    {
        return response()->json($this->articleService->getById($id));
    }

    public function store(Request $request)
    {
        $article = $this->articleService->create($request->all());
        return response()->json($article, 201);
    }

    public function update(Request $request, $id)
    {
        $article = $this->articleService->update($id, $request->all());
        return response()->json($article);
    }

    public function destroy($id)
    {
        $this->articleService->delete($id);
        return response()->json(null, 204);
    }
}
