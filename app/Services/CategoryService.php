<?php

namespace App\Services;

use App\Interface\CategoryInterface;

class CategoryService
{
    /**
     * @var CategoryInterface
     */
    protected $categoryRepo;

    /**
     * @param CategoryInterface $categoryRepo
     */
    public function __construct(CategoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    public function getWithTasks()
    {
        return $this->categoryRepo->getWithTasks();
    }
}