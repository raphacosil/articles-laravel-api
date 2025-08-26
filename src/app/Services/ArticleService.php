<?php

namespace App\Services;

use App\Models\Article;
use App\Repositories\ArticleRepository;

class ArticleService
{
    protected ArticleRepository $articleRepository;

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

    public function getByAuthorId($authorId)
    {
        return $this->articleRepository->getByAuthorId($authorId);
    }

    public function getByTitleContaining($title){
        return $this->articleRepository->getByTitleContaining($title);
    }

    public function getByContentContaining($content)
    {
        return $this->articleRepository->getByContentContaining($content);
    }

    public function getByKeywords($keywords)
    {
        return $this->articleRepository->getByKeywords($keywords);
    }
}
