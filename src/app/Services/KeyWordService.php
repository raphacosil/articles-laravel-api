<?php

namespace App\Services;

use App\Models\KeyWord;
use App\Repositories\KeyWordRepository;

class KeyWordService
{
    protected KeyWordRepository $keyWordRepository;

    public function __construct(KeyWordRepository $repository)
    {
        $this->keyWordRepository = $repository;
    }

    public function getAll()
    {
        return $this->keyWordRepository->getAll();
    }

    public function getById($id)
    {
        return $this->keyWordRepository->getById($id);
    }

    public function create(KeyWord $keyWord)
    {
        if (
            empty($keyWord['article_id'] ||
                empty($keyWord['content'])
            )) {
            throw new \InvalidArgumentException("Missing content");
        };
        return $this->keyWordRepository->create($keyWord);
    }

    public function update($id, KeyWord $keyWord)
    {
        return $this->keyWordRepository->update($id, $keyWord);
    }

    public function delete($id)
    {
        return $this->keyWordRepository->delete($id);
    }
}
