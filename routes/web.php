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
    route::get('blog','FrontendController@blog');
    route::get('blog/{artikel}','FrontendController@singleblog');
    route::get('contact','FrontendController@contact');
    route::get('services','FrontendController@services');
    route::get('blog-tag/{tag}','FrontendController@blogtag');
    route::get('blog-kategori/{kategori}','FrontendController@blogkategori');
    
}
);

Route::group(['prefix'=>'admin','middleware'=>['auth']],
function () {
    Route::get('/', function () {
        return view('kategori');
    });
    
    Route::get('kategori', function () {
        return view('kategori');
    });
    
    Route::get('tag', function () {
        return view('tag');
    });
    
    
    Route::patch('tag', 'TagsController@update');

    Route::get('artikel', function () {
        
        return view('artikel');
    });

    Route::get('produk', function () {
        
        return view('admin.artikel.index');
    });
    Route::post('artikel', 'ArtikelsController@store');
}
);

    route::resource('/a/kategori','CategoriController');
    route::resource('/a/tag','TagController');
    route::resource('/a/artikel','ArtikelController');

    

    Route::get('artikel', function () {
        return view('artikel');
    });

    Route::get('single', function () {
        return view('single');
    });
    
//     Route::resource('tag', 'CobaAjaxController');

// Route::post('tag/update', 'CobaAjaxController@update')->name('tag.update');

// Route::get('tag/destroy/{id}', 'CobaAjaxController@destroy');


 