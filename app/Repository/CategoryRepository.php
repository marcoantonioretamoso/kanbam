<?php

namespace App\Repository;

use App\Models\Category;
use App\Interface\CategoryInterface;

class CategoryRepository implements CategoryInterface
{
    public function getWithTasks()
    {
        return Category::with('tasks')->get();
    }
}