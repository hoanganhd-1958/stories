<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\Chapter as ChapterResource;
use App\Models\User;

class OneStory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'summary' => $this->summary,
            'cover_image' => config('my.image_path') . $this->cover_image,
            'author' => new UserResource($this->user),
            'categories' => CategoryResource::collection($this->categories),
            'chapters' => ChapterResource::collection($this->chapters),
            'total_chapters' => $this->chapters()->count(),
            'total_views' => $this->chapters()->sum('view_count'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
