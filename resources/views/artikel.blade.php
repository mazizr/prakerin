@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/assets/vendor/select2/select2.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('assets/backend/assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/js/components/select2-init.js')}}"></script>
   {{-- CKEditor --}}
   <script src="{{ asset('assets/backend/assets/vendor/ckeditor/ckeditor.js')}}"></script>
   <script>
       CKEDITOR.replace( 'editor1' );
   </script>
@endsection

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="zmdi zmdi-collection-text card-header">    Data Tables Kategori</h5><br>

                {{-- MODALNYA TAMBAH --}}
                
                    
                        {{-- BUTTON TAMBAH --}}
                        
                            <button class="la la-save btn btn-success" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">  Tambah</button>
                        
                    
                
                <div id="id01" class="modal">
                        <form class="modal-content animate"method="post" id="createData" enctype="multipart/form-data">
                            @csrf
                            <div class="imgcontainer">
                                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span> 
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label><left>Deskripsi</left></label>
                                    <textarea name="konten" id="editor1" class="form-control" required> </textarea>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                            <label class="custom-file-label">Foto</label>
                                            <input type="file" name="foto" class="custom-file-input form-control-file" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control isi-kategori" name="id_kategori" id="" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tag</label>
                                    <select class="form-control isi-tag" name="tag[]" id="s2_demo3" multiple="multiple" required>
                                    </select>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    {{-- BUTTON SAVE --}}
                                    <button type="submit" class="zmdi zmdi-mail-send btn btn-primary">  Simpan Data</button>
                                </div>
                            </form> 
                        </div>
{{-- END MODALNYA TAMBAH --}}

{{-- BAGIAN TABLE GET --}}
                <div class="card-body table-responsive">
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
                        <tfoot>
                            <tr>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Kategori</th>
                                <th>Tag</th>
                                <th>Penulis</th>
                                <th>Foto</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>

                    <br>           
                </div>
{{-- END BAGIAN TABLE GET --}}
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
        // Store Data
        $('#createData').submit(function(e){
        var formData = new FormData($('#createData')[0]);
        e.preventDefault();
        $.ajax({
            url: '/api/artikel',
            type:'POST',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(formData){
                $('#exampleModal').modal('hide');
                $('#datatable').DataTable().ajax.reload();
                alert(formData.message)
            },
            complete: function() {
                $("#indexKategori").show();
                $("#createData")[0].reset();
            }
        });
    });
});
</script>
@endpush
