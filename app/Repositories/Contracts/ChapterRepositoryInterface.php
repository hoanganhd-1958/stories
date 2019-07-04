<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface ChapterRepositoryInterface
{
    public function all();
    public function find($id);
    public function store(Request $request);
}
