@extends('layouts.app')

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Kategori</h5><br>
                <center>
                        <a href="{{ route('kategori.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                {{-- <th>Slug</th>
                                <th style="text-align: center;">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <td class="data-siswa"></td>
                            
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</section>

@endsection
