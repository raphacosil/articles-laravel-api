<?php

namespace App\Services;

use App\Models\Article;
use http\Exception\InvalidArgumentException;

class ArticleService
{
    protected $articleRepository;

    public function __construct(ArticleRepository $repository)
    {
        $this->articleRepository = $repository;
    }

    public function getAll()
    {
        return $this->articleRepository->getAll();
    }

    public function getById($id)
    {
        return $this->articleRepository->getById($id);
    }

    public function create(Article $article)
    {
        if (empty($article['title'] || empty($article['content']) || empty($article['sender_id']))) {
            throw new \InvalidArgumentException("Missing content");
        };
        return $this->articleRepository->create($article);
    }

    public function update($id, Article $article)
    {
        return $this->articleRepository->update($id, $article);
    }

    public function delete($id)
    {
        return $this->articleRepository->delete($id);
    }
}
