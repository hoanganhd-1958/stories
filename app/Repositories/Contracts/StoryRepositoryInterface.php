<?php

namespace App\Repositories\Contracts;

interface StoryRepositoryInterface
{
    public function all();
    public function find($id);
}
