<?php

namespace App\Repositories\Eloquents;

use Illuminate\Http\Request;
use Artisan;
use App\Models\Chapter;
use App\Models\Story as Story;
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

    public function store(Request $request)
    {
        if ($request->has('story_id')) {
            $story = Story::findOrFail($request->story_id);
            $lastestPosstion = $story->chapters->pluck('posstion')->max();
        
            Chapter::create([
            'name' => 'New Chapter',
            'content' => '',
            'publish' => false,
            'posstion' => $lastestPosstion + 1,
            'view_count' => 0,
            'story_id' => $request->story_id,
            ]);
        } else {
            return false;
        }
    }

    public function sort(Request $request)
    {
        for ($i = 0; $i <= count((array)$request); $i++) {
            $chapter = Chapter::findOrFail($request[$i]['id']);
            $chapter->name = $request[$i]['name'];
            $chapter->posstion = $i;
            $chapter->save();
        }

        return true;
    }
}
