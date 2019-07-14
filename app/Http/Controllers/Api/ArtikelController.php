<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artikel;
use File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::with('kategori', 'user', 'tag')->get();
        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel = new Artikel;
        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->slug = str_slug($request->judul);
        $artikel->kategori_id = $request->kategori_id;
        $artikel->user_id = $request->user_id;
        $artikel->foto = $request->foto;
        // $artikel->publish = $request->publish;
        //upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path() . '/assets/img/fotoartikel/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $artikel->foto = $filename;
        }
        $artikel->save();
        $artikel->tag()->attach($request->tag);
        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->slug = str_slug($request->judul, '-') . '-' . str_random(6);
        $artikel->kategori_id = $request->kategori_id;
        // $artikel->foto = $request->foto;
        $artikel->publish = $request->publish;

        //edit upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path() . '/assets/img/fotoartikel/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

            // hapus foto lama, jika ada
            if ($artikel->foto) {
                $old_foto = $artikel->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/fotoartikel'
                    . DIRECTORY_SEPARATOR . $artikel->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
            $artikel->foto = $filename;
        }

        $artikel->save();
        $artikel->tag()->sync($request->tag);
        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->foto) {
            $old_foto = $artikel->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'assets/img/fotoartikel/'
                . DIRECTORY_SEPARATOR . $artikel->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }
        $artikel->delete();
        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }
}
