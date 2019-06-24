<?php

namespace App\Repositories\Eloquents;

use App\Models\Chapter;
use App\Repositories\Contracts\ChapterRepositoryInterface;

class ChapterRepository implements ChapterRepositoryInterface
{
    public function all()
    {
        return Chapter::all();
    }

    public function find($id)
    {
        return Chapter::find($id);
    }
}
