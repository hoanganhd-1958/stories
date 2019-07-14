<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function all();
    public function find($id);
    public function getAllStoryInCategory($categoryId);
}
