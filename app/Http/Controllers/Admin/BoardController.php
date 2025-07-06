<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BoardService;
use App\Services\CategoryService;

class BoardController extends Controller
{
    protected $boardService;
    protected $categoryService;
    public function __construct(BoardService $boardService, CategoryService $categoryService)
    {
        $this->boardService = $boardService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = $this->categoryService->getWithTasks();
        return view('admin.board.index', compact('categories'));
    }
}
