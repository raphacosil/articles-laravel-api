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

    public function getByAuthorId($id)
    {
        return Article::where('author_id', $id)->firstOrFail();
    }

    public function getByTitleContaining($title)
    {
        return Article::whereHas('title', function ($query) use ($title)
        {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }) -> with('title') -> get();
    }

    public function getByContentContaining($content)
    {
        return Article::whereHas('content', function ($query) use ($content)
        {
            $query->where('$content', 'LIKE', '%' . $content . '%');
        }) -> with('$content') -> get();
    }

    public function getByKeywords(array $keywords)
    {
        return Article::whereIn('id', function ($query) use ($keywords)
        {
            $query
                ->select('article_id')
                ->from('key_word')
                ->where('content', $keywords);
        }) -> with('$content') -> get();
    }

    //public function getByKeywords(array $keywords)
    //    {
    //        return Article::whereHas('keywords', function ($query) use ($keywords)
    //        {
    //            $query->whereIn('content', $keywords);
    //        }) -> get();
    //    }

    public function getByKeywordsFilter(array $keywords)
    {

    }
}
