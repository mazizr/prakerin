@extends('layouts.backend')

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Tag</h5><br>
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                    <i class="glyphicon glyphicon-plus"> Tambah</i></button>
<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        
    </div>
    <div class="container">
            <label>Nama Tag</label>
            <input class="form-control" type="text" name="nama_tag" id="">
            <button type="submit" class="btn btn-outline-info tombol-simpan-tag">
                    Simpan Data
                </button>
    </div>
    
  </form>
</div>
{{-- EDIT --}}
<div id="id02" class="modal">
        
                <form class="modal-content animate edit-tag" id="editData" name="edit-tag" action="/action_page.php">
                    <div class="imgcontainer">
                      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                        
                    </div>
                    <div class="container">
                          <div class="modal-body">
                          <input type="hidden" name="id" id="hidden_id" class="id">
                          <input type="hidden" name="_method" value="PATCH">
                          @csrf
                          <div class="form-group">
                                  <label for="" >Nama Tag</label>
                                  <input type="text" class="form-control isi-tag" type="text" name="nama_tag" id="nama_tag">    
                              </div>
                            <button type="submit" class="btn btn-outline-info tombol-simpan">
                                    Simpan Data
                                </button>
                          </div>
                    
                  </form>
                </div>
       
                </div>
{{-- END EDIT --}}
                <div class="card-body">
                    <table id="bs4-table" id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Tag</th>
                                <th>Slug</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-tag">
                            
                        </tbody>
                    </table>

                    <br>
                       
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var alamat = '/api/tag'
        // Get Data Produk
       
    });
    // get Edit data
   $(document).on('click', '.edit', function(){
       var id = $(this).attr('id');
       $('#editData').html('');
       $.ajax({
           url : alamat +id+ "/edit",
           dataType : "json",
           success:function(html){
               $('#nama_tag').val(html.data.nama_tag);
               $('#hidden_id').val(html.data.id);

           }
       })
   })
</script>
@endpush

