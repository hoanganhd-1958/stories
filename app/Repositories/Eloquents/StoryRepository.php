<?php

namespace App\Repositories\Eloquents;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Repositories\Contracts\StoryRepositoryInterface;
use App\Http\Traits\FileUpload;
use Auth;

class StoryRepository implements StoryRepositoryInterface
{
    use FileUpload;

    public function all()
    {
        return Story::all();
    }

    public function find($id)
    {
        return Story::find($id);
    }

    public function paginate($number)
    {
        return Story::where('user_id', Auth::id())->paginate($number);
    }

    public function store(Request $request)
    {
        $coverImage = $this->upload($request->coverImage, config('my.image_folder'));
        $story = new Story();
        $story->user_id = 1; //until have application authentication
        $story->name = $request->name;
        $story->summary = $request->summary;
        $story->cover_image = $coverImage;
        $story->save();

        $categoryId = array_column(json_decode($request->categorySelections), 'id');
        $story->categories()->attach($categoryId);
        
        return $story;
    }
    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);
        $story->name = $request->name;
        $story->summary = $request->summary;
        if ($request->hasFile('coverImage')) {
            $coverImage = $this->upload($request->coverImage, config('my.image_folder'));
            $story->cover_image = $coverImage;
        }
        $story->save();
        $categoryId = array_column(json_decode($request->categorySelections), 'id');
        $story->categories()->detach();
        $story->categories()->attach($categoryId);
        
        return $story;
    }
}
