<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',[
    'as'=>'home',
    'uses'=>'FrontController@index'
]);


//Login Route

    Route::get('login',[
        'as'=>'login',
        'uses'=>'LoginController@index'
    ]);
    Route::post('login/store',[
        'as'=>'login.store',
        'uses'=>'LoginController@store'
    ]);

    Route::get('logout',[
        'as'=>'logout',
        'uses'=>'LoginController@logout'
    ]);


    Route::get('artical/{id}',[
        'as'=>'artical',
        'uses'=>'FrontController@artical'
    ]);









Route::group(['prefix' => 'admin','middleware'=>'auth'], function()
{
    //user Route

    Route::get('index',[
        'as'=>'index',
        'uses'=>'UserController@index'
    ]);

    Route::get('create',[
        'as'=>'create',
        'uses'=>'UserController@create'
    ]);

    Route::post('store',[
        'as'=>'store',
        'uses'=>'UserController@store'
    ]);

    Route::get('edit/{id}',[
        'as'=>'edit',
        'uses'=>'UserController@edit'
    ]);

    Route::post('update/{id}',[
        'as'=>'update',
        'uses'=>'UserController@update'
    ]);

    Route::get('delete/{id}',[
        'as'=>'destroy',
        'uses'=>'UserController@destroy'
    ]);



    //Category Route

    Route::get('category/index',[
        'as'=>'category.index',
        'uses'=>'CategoryController@index'
    ]);

    Route::get('category/create',[
        'as'=>'category.create',
        'uses'=>'CategoryController@create'
    ]);

    Route::post('category/store',[
        'as'=>'category.store',
        'uses'=>'CategoryController@store'
    ]);

    Route::get('category/edit/{id}',[
        'as'=>'category.edit',
        'uses'=>'CategoryController@edit'
    ]);

    Route::post('category/update/{id}',[
        'as'=>'category.update',
        'uses'=>'CategoryController@update'
    ]);

    Route::get('category/delete/{id}',[
        'as'=>'category.destroy',
        'uses'=>'CategoryController@destroy'
    ]);


    //Article route


    Route::get('artical/index',[
        'as'=>'artical.index',
        'uses'=>'ArticalController@index'
    ]);

    Route::get('artical/create',[
        'as'=>'artical.create',
        'uses'=>'ArticalController@create'
    ]);

    Route::post('artical/store',[
        'as'=>'artical.store',
        'uses'=>'ArticalController@store'
    ]);

    Route::get('artical/edit/{id}',[
        'as'=>'artical.edit',
        'uses'=>'ArticalController@edit'
    ]);

    Route::post('artical/update/{id}',[
        'as'=>'artical.update',
        'uses'=>'ArticalController@update'
    ]);

    Route::get('artical/delete/{id}',[
        'as'=>'artical.destroy',
        'uses'=>'ArticalController@destroy'
    ]);



});
