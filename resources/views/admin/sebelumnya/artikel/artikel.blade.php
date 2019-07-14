@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/assets/vendor/select2/select2.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('assets/backend/assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/js/components/select2-init.js')}}"></script>
    <script src="{{asset('assets/backend/assets/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    
@endsection
<script src="{{asset('assets/backend/assets/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Kategori</h5><br>
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Tambah</button>
<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        
    </div>
    <div class="container">
            <div class="form-group">
                <label>Judul</label>
                <input class="form-control" type="text" name="judul" id=""required>
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <input class="form-control" type="file" name="foto" id="" required>
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <select class="form-control isi-kategori" name="id_kategori" id="" required>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Tag</label>
                <select class="form-control isi-tag" name="tag[]" id="s2_demo3" multiple="multiple" required>
                </select>
            </div>
            <div class="form-group">
                <label for="">Konten</label>
                <textarea class="form-control" name="konten" id="editor1" required></textarea>
            </div>
            <script>
                CKEDITOR.replace("editor1", {
                });
            </script>
            <button type="submit" class="btn btn-outline-info tombol-simpan-artikel">
                    Simpan Data
                </button>
    </div>
    
  </form>
</div>
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Kategori</th>
                                <th>Tag</th>
                                <th>Penulis</th>
                                <th>Foto</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-artikel">
                            
                        </tbody>
                    </table>

                    <br>           
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
