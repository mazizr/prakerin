@extends('layouts.app')

@section('css')
        <link rel="stylesheet" href="{{ ('assets/backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('js')
        <script src="{{asset('assets/backend/assets/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets/backend/assets/js/components/datatables-init.js')}}"></script>
@endsection

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    <center>Artikel</center>
                    <a href="{{ route('artikel.create') }}"
                    class="navbar-nav ml-auto la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                </a></h5><br>
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Tag</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Foto</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikel as $data)
                            <tr>
                                <td>{{$data->judul}}</td>
                                <td>{{$data->slug}}</td>
                                <td>@foreach ($data->tag as $tag)
                                    {{ $tag->nama_tag }} <br>
                                @endforeach</td>
                                <td>{{$data->kategori->nama_kategori}}</td>
                                <td>{{$data->user->name}}</td>
                                <td><img src="{{asset('assets/img/artikel/' .$data->foto. '')}}"
                                    style="width:250px; height:250px;" alt="Foto"></td>
                               
								<td style="text-align: center;">
                                    <form action="{{route('artikel.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('artikel.edit', $data->id)}}"
										class="zmdi zmdi-delete btn-rounded btn-floating btn btn-warning btn btn-warning btn-outline"> Edit
                                    </a>
                                    {{-- <a href="{{route('artikel.show', $data->id)}}"
										class="zmdi zmdi-eye btn btn-success btn-rounded btn-floating btn-outline"> Show
									</a> --}}
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="zmdi zmdi-delete btn-rounded btn-floating btn btn-dangerbtn btn-danger btn-outline"> Delete</button>
									</form>
								</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection