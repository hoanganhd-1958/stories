<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
Route::resource('categories', 'CategoryController');
Route::resource('stories', 'StoryController');
Route::resource('chapters', 'ChapterController');
Route::prefix('chapters')->group(function () {
    Route::post('sort', 'ChapterController@sort');
    Route::get('story/{storyId}', 'ChapterController@index');
    Route::post('get-content-from-another-source', 'ChapterController@getContentFromAnotherSource');
    Route::get('{id}/publish', 'ChapterController@publish');
});
Route::prefix('categories')->group(function () {
    Route::get('{categoryId}/story', 'CategoryController@getAllStoryInCategory');
});
