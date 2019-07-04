<?php

namespace App\Repositories\Eloquents;

use Illuminate\Http\Request;
use Artisan;
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

    public function store(Request $request)
    {
        if ($request->mode == Chapter::CRAWL_MODE) {
            Artisan::call('crawl:start', [
                'name' => $request->name,
                'url' => $request->url,
                'storyId' => $request->story_id,
                'posstion' => $request->posstion,
            ]);
        } else {
            Chapter::create([
                'name' => $request->name,
                'content' => $request->content,
                'publish' => false,
                'posstion' => $request->posstion,
                'view_count' => 0,
                'story_id' => $request->story_id,
            ]);
        }
    }
}
