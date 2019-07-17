@extends('layouts.backend')

@section('content')
    Username : {{ Auth::user()->name }}
@endsection