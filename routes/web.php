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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'/'],
function () {
    route::get('/','FrontendController@index');
    route::get('about','FrontendController@about');
    route::get('blog','FrontendController@blog');
    route::get('single-blog','FrontendController@single_blog');
    route::get('contact','FrontendController@contact');
    route::get('services','FrontendController@services');
    // route::get('blog/{artikel}','FrontendController@singleblog');
    // route::get('blog-tag/{tag}','FrontendController@blogtag');
    // route::get('blog-kategori/{kategori}','FrontendController@blogkategori');
    
}
);

// Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware' => ['auth']],
// function () {
//     route::get('/', function () {
//         return view('welcome');
//     });
//     route::get('/json/kategori','KategoriController@getjson');
//     route::get('/artikel','ArtikelController@index');
//     route::get('/json/tag','TagController@getjson');
//     route::get('about','FrontendController@about');
//     route::get('blog','FrontendController@blog');
//     route::get('single-blog','FrontendController@single_blog');
//     route::get('contact','FrontendController@contact');
//     route::get('services','FrontendController@services');
//     // route::get('blog/{artikel}','FrontendController@singleblog');
//     // route::get('blog-tag/{tag}','FrontendController@blogtag');
//     // route::get('blog-kategori/{kategori}','FrontendController@blogkategori');
    
// }
// );

Route::group(['prefix'=>'admin','middleware'=>['auth']],
function () {
    Route::get('/', function () {
        return view('backend.index');
    });
    route::resource('kategori','CategoriController');
    route::resource('tag','TagController');
    route::resource('artikel','ArtikelController');
}
);

Route::get('kategori', function () {
    return view('kategori');
});

Route::get('tag', function () {
    return view('tag');
});

Route::get('artikel', function () {
    return view('artikel');
});

Route::get('single', function () {
    return view('single');
});
