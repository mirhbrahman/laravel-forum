<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/forum',[
    'uses' => 'ForumsController@index',
    'as' => 'forum',
]);

Route::get('{provider}/auth',[
    'uses' => 'SocialsController@auth',
    'as' => 'social.auth',
]);

Route::get('/{provider}/redirect',[
    'uses' => 'SocialsController@auth_callback',
    'as' => 'social.callback',
]);

Route::group(['middleware'=>'auth'],function(){
    Route::resource('channels','ChannelsController');
    Route::get('discussion/create',[
        'uses' => 'DiscussionsController@create',
        'as' => 'discussion.create',
    ]);
    Route::post('discussion/store',[
        'uses' => 'DiscussionsController@store',
        'as' => 'discussion.store',
    ]);
    Route::get('discussion/{slug}',[
        'uses' => 'DiscussionsController@show',
        'as' => 'discussion.show',
    ]);
});
