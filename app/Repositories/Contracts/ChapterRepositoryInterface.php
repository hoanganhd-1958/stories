<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface ChapterRepositoryInterface
{
    public function getChapterByStoryId($id);
    public function all();
    public function find($id);
    public function store(Request $request);
    public function sort(Request $request);
    public function getContentFromAnotherSource(Request $request);
    public function update(Request $request, $id);
    public function publish($id);
}
