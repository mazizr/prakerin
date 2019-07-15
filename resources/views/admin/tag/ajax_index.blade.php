@extends('layouts.backend')
@section('css')
        <link rel="stylesheet" href="{{asset('assets/backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('js')
        <script src="{{asset('assets/backend/assets/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets/backend/assets/js/components/datatables-init.js')}}"></script>
@endsection

@section('content')
    

    <div class="container">
        <br />
        <h3 align="center">Table Tag</h3>
        <br />
        <div class="table-responsive">
            <table id="bs4-table" id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Tag</th>
                        <th>Slug</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-tag">
                   
                </tbody>
            </table>
        </div>
    </div>


<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Add New Record</h4>
           </div>
           <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
               <label class="control-label col-md-4" >First Name : </label>
               <div class="col-md-8">
                <input type="text" name="first_name" id="first_name" class="form-control" />
               </div>
              </div>
              <div class="form-group">
               <label class="control-label col-md-4">Last Name : </label>
               <div class="col-md-8">
                <input type="text" name="last_name" id="last_name" class="form-control" />
               </div>
              </div>
              <div class="form-group">
               <label class="control-label col-md-4">Select Profile Image : </label>
               <div class="col-md-8">
                <input type="file" name="image" id="image" />
                <span id="store_image"></span>
               </div>
              </div>
              <br />
              <div class="form-group" align="center">
               <input type="hidden" name="action" id="action" />
               <input type="hidden" name="hidden_id" id="hidden_id" />
               <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
              </div>
            </form>
           </div>
        </div>
       </div>
   </div>
   
   <div id="confirmModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h2 class="modal-title">Confirmation</h2>
               </div>
               <div class="modal-body">
                   <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
               </div>
               <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </div>
           </div>
       </div>
   </div>
   @endsection

   {{-- <script>
    $(document).ready(function(){
    
     $('#user_table').DataTable({
      processing: true,
      serverSide: true,
      ajax:{
       url: "{{ route('tag.index') }}",
      },
      columns:[
       {
        data: 'nama_tag',
        name: 'nama_tag'
       },
       {
        data: 'action',
        name: 'action',
        orderable: false
       }
      ]
     });
    
     $('#create_record').click(function(){
      $('.modal-title').text("Add New Record");
         $('#action_button').val("Add");
         $('#action').val("Add");
         $('#formModal').modal('show');
     });
    
     $('#sample_form').on('submit', function(event){
      event.preventDefault();
      if($('#action').val() == 'Add')
      {
       $.ajax({
        url:"{{ route('tag.store') }}",
        method:"POST",
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData: false,
        dataType:"json",
        success:function(data)
        {
         var html = '';
         if(data.errors)
         {
          html = '<div class="alert alert-danger">';
          for(var count = 0; count < data.errors.length; count++)
          {
           html += '<p>' + data.errors[count] + '</p>';
          }
          html += '</div>';
         }
         if(data.success)
         {
          html = '<div class="alert alert-success">' + data.success + '</div>';
          $('#sample_form')[0].reset();
          $('#user_table').DataTable().ajax.reload();
         }
         $('#form_result').html(html);
        }
       })
      }
    
      if($('#action').val() == "Edit")
      {
       $.ajax({
        url:"{{ route('tag.update') }}",
        method:"POST",
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType:"json",
        success:function(data)
        {
         var html = '';
         if(data.errors)
         {
          html = '<div class="alert alert-danger">';
          for(var count = 0; count < data.errors.length; count++)
          {
           html += '<p>' + data.errors[count] + '</p>';
          }
          html += '</div>';
         }
         if(data.success)
         {
          html = '<div class="alert alert-success">' + data.success + '</div>';
          $('#sample_form')[0].reset();
          $('#store_image').html('');
          $('#user_table').DataTable().ajax.reload();
         }
         $('#form_result').html(html);
        }
       });
      }
     });
    
     $(document).on('click', '.edit', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
       url:"/tag/"+id+"/edit",
       dataType:"json",
       success:function(html){
        $('#first_name').val(html.data.first_name);
        $('#last_name').val(html.data.last_name);
        $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
        $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text("Edit New Record");
        $('#action_button').val("Edit");
        $('#action').val("Edit");
        $('#formModal').modal('show');
       }
      })
     });
    
     var user_id;
    
     $(document).on('click', '.delete', function(){
      user_id = $(this).attr('id');
      $('#confirmModal').modal('show');
     });
    
     $('#ok_button').click(function(){
      $.ajax({
       url:"tag/destroy/"+user_id,
       beforeSend:function(){
        $('#ok_button').text('Deleting...');
       },
       success:function(data)
       {
        setTimeout(function(){
         $('#confirmModal').modal('hide');
         $('#user_table').DataTable().ajax.reload();
        }, 2000);
       }
      })
     });
    
    });
    </script> --}}