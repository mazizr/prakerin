<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nama()
    {
        $nama = [
            [
                "nama" => "Aziz",
            "kelas" => 12,
            "hobby" => [
                "Gaming",
                "Gitar"
            ],
            "guru" => [
                "nama1" => "Ujang",
                "nama2" => "Udin"
            ]
            ],
            [
                "nama" => "Aziz",
            "kelas" => 12,
            "hobby" => [
                "Gaming",
                "Gitar"
            ],
            "guru" => [
                "nama1" => "Ujang",
                "nama2" => "Udin"
            ]
            ]
            ];
        return $nama;
    }

    public function buah()
    {
        $buah = ['apel', 'jambu', 'nanas', 'semangka', 'pir', 'melon', 'pisang', 'jeruk', 'strawberry', 
        'naga'];
        return $buah;
    }
    public function game()
    {
        
        $game = ['mobile legends', 'free fire', 'pubg', 'coc', 'cr', 'aov', 'vainglory', 
        '234player', 'sniper', 'aspalt nitro'];
        return $game;
    }
    public function hobi()
    {
        $hobi = ['main bola', 'main game', 'masak', 'nonton film', 'lari', 'berenang', 'main gitar', 
        'main biola', 'ngoding', 'sepedahan'];
        return $hobi;
    }
    public function cita() {
        $cita = ['dokter', 'pesepakbola', 'youtuber', 'astronot', 'programmer', 'manajer', 'presiden'];
        return $cita;
    }
    
}
