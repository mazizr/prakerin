@extends('layouts.backend')

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="zmdi zmdi-bookmark card-header">   Data Tables Kategori</h5><br>
                {{-- // MODAL TAMBAH DATA --}}
                <button class="la la-save btn btn-success" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">  Tambah</button>
<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        
    </div>
    <div class="container">
            <label>Nama Kategori</label>
            <input class="form-control" type="text" name="nama_kategori" id="">
            <button type="submit" class="zmdi zmdi-mail-send btn btn-outline-info tombol-simpan">
                    Simpan Data
                </button>
    </div>
  </form>
</div>
{{-- END MODAL TAMBAH DATA --}}
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th style="text-align: center;" colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-kategori">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>

                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



