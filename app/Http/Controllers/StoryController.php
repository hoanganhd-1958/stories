<?php

namespace App\Http\Controllers;

use App\Http\Resources\OneStory as OneStoryResource;
use Illuminate\Http\Request;
use App\Repositories\Contracts\StoryRepositoryInterface;
use App\Http\Resources\Story as StoryResource;

class StoryController extends Controller
{
    protected $storyRepository;

    public function __construct(StoryRepositoryInterface $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = $this->storyRepository->paginate(config('my.paginate'));

        return StoryResource::collection($stories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $story = $this->storyRepository->store($request);
        
        return response()->json(['success' => 'You have successfully upload']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = $this->storyRepository->find($id);

        return new OneStoryResource($story);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $story = $this->storyRepository->update($request, $id);
        
        return response()->json(['success' => 'You have successfully upload']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
