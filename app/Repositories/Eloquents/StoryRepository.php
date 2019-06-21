<?php

namespace App\Repositories\Eloquents;

use App\Models\Story;
use App\Repositories\Contracts\StoryRepositoryInterface;

class StoryRepository implements StoryRepositoryInterface
{
    public function all()
    {
        return Story::all();
    }

    public function find($id)
    {
        return Story::find($id);
    }
}
