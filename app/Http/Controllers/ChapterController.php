<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ChapterRepositoryInterface;
use App\Http\Resources\Chapter as ChapterResource;
use App\Http\Resources\OneChapter as OneChapterResource;

class ChapterController extends Controller
{
    protected $chapterRepository;

    public function __construct(ChapterRepositoryInterface $chapterRepository)
    {
        $this->middleware('auth:api', ['except' => ['show']]);
        $this->chapterRepository = $chapterRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($storyId)
    {
        $chapters = $this->chapterRepository->getChapterByStoryId($storyId);

        return ChapterResource::collection($chapters);
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
        $chapter = $this->chapterRepository->store($request);
        
        return response()->json(['success' => 'You have successfully upload'], 200);
    }

    /**
    * reOrder possiton
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function sort(Request $request)
    {
        $chapter = $this->chapterRepository->sort($request);
        
        return response()->json(['success' => 'You have successfully upload'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapter = $this->chapterRepository->find($id);
        
        return new OneChapterResource($chapter);
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
        $chapter = $this->chapterRepository->update($request, $id);
        
        return response()->json(['success' => 'You have successfully update'], 200);
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

    /**
     * Update chapter content by crawl from another source.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getContentFromAnotherSource(Request $request)
    {
        $chapter = $this->chapterRepository->getContentFromAnotherSource($request);
        
        return response()->json(['success' => 'You have successfully update'], 200);
    }

    /**
    * Publish chapter.
    *
    * @param  int  $id
    */
    public function publish($id)
    {
        $chapter = $this->chapterRepository->publish($id);
        
        return response()->json(['success' => 'You have successfully update'], 200);
    }
}
