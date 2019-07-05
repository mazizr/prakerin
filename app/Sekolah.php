<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    // protected $table = 'siswas';

    // MASS ASSIGNMENT
    // Untuk membatasi attribut(field) yang boleh diisi
    protected $fillable = ['kepala_sekolah','kesiswaan','wali_kelas',  'ketua_osis', 'bk'];
}
