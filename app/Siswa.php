<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // protected $table = 'siswas';

    // MASS ASSIGNMENT
    // Untuk membatasi attribut(field) yang boleh diisi
    protected $fillable = ['nama','kelas','umur',  'hobi', 'alamat'];
}
