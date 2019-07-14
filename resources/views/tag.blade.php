@extends('layouts.backend')

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Tag</h5><br>
                <div align="right">
                    <button type="button" name="create_record" id="create_record" 
                    class="btn btn-success btn-sm">
                    Create Record
                    </button>
                </div>
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

{{-- MODALNYA --}}

<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Record</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Nama Tag : 
                    </label>
                    <div class="col-md-8">
                        <input type="text" name="first_name" id="first_name" 
                        class="form-control">
                    </div>
                </div>
                <br />
                <div class="form-group" align="center">
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="submit" name="action_button" id="action_button" 
                    class="btn btn-warning" value="Add">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
    $(document).ready(function(){
        $('create_record').click(function(){
            $('formModal').modal('show');
        });
    });
    </script>
@endpush