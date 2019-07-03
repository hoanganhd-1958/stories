<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface StoryRepositoryInterface
{
    public function all();
    public function find($id);
    public function store(Request $request);
    public function update(Request $request, $id);
}
