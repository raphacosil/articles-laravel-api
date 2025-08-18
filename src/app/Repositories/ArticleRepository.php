<?php

namespace App\Repositories;

use app\Models\Article;

class ArticleRepository
{
    public function getAll()
    {
        return Article::all();
    }

    public function getById($id)
    {
        return Article::findOrFail($id);
    }

    public function create(Article $article)
    {
        return Article::create($article);
    }

    public function update($id, Article $data)
    {
        $article = Article::findOrFail($id);
        $article->update($data);
        return $article;
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);
        return $article->delete();
    }
}
