<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Artikel;
use App\Tag;
use App\Kategori;
use Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::with('kategori','tag','user')->get();
        return view('frontend.index', compact('artikel'));
    }

    public function blogtag(Tag $tag)
    {
        $artikel = $tag->Artikel()->latest()->paginate(5);
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('frontend.blog', compact('artikel','kategori'));
    }

    public function blogkategori(Kategori $kategori)
    {
        $artikel = $kategori->Artikel()->latest()->paginate(5);
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('frontend.blog', compact('artikel','kategori'));
    }

    public function about()
    {
        // $artikel = Artikel::orderBy('created_at','desc')->paginate(3);
        // $kategori = Kategori::all();
        // $tag = Tag::all();
        return view('frontend.about');
        // , compact('artikel','kategori','tag')
        
       
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function singleblog(Artikel $artikel)
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('frontend.single-blog', compact('artikel','kategori','tag'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
