<?php

namespace App\Repositories\Contracts;

interface ChapterRepositoryInterface
{
    public function all();
    public function find($id);
}
