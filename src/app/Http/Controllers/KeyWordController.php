<?php

namespace App\Http\Controllers;

use App\Services\KeyWordService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KeyWordController extends Controller
{
    protected KeyWordService $keyWordService;

    public function __construct(KeyWordService $keyWordService)
    {
        $this->keyWordService = $keyWordService;
    }

    public function index()
    {
        return response()->json($this->keyWordService->getAll());
    }

    public function show($id)
    {
        return response()->json($this->keyWordService->getById($id));
    }

    public function store(Request $request)
    {
        $keyWord = $this->keyWordService->create($request->all());
        return response()->json($keyWord, 201);
    }

    public function destroy($id)
    {
        $this->keyWordService->delete($id);
        return response()->json(null, 204);
    }
}
