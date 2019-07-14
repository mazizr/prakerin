<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Artikel;

class FrontController extends Controller
{
    public function index()
    {
        $menu = Kategori::take(3)->get();
        $artikel = Artikel::with('user', 'kategori')->take(6)->get();
        // $tgl = $artikel->created_at;
        $trending = Artikel::with('user')->inRandomOrder()->take(3)->get();
        $response = [
            'success' => true,
            'data' => [
                'menu' => $menu,
                'artikel' => $artikel,
                'trending' => $trending
            ],
            'message' => 'Berhasil.'
        ];
        // dd($tgl);
        return response()->json($response, 200);
    }

    public function singleblog(Artikel $artikel)
    {
        $artikel = Artikel::with('user', 'kategori')->where('slug', '=', $artikel->slug)->first();
        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'Berhasil.'
        ];
        // dd($tgl);
        return response()->json($response, 200);
    }
}
