<?php

namespace App\Repositories;

use App\Models\KeyWord;

class KeyWordRepository
{
    public function getAll()
    {
        return KeyWord::all();
    }

    public function getById($id)
    {
        return KeyWord::findOrFail($id);
    }

    public function create(array $article)
    {
        return KeyWord::create($article);
    }

    public function delete($id)
    {
        $article = KeyWord::findOrFail($id);
        return $article->delete();
    }

    public function getByArticleId($id)
    {
        return KeyWord::where('article_id', $id)->get();
    }
}
