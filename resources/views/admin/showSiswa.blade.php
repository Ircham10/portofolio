@extends('admin.app')
@section('title', 'ShowSiswa')
@section('content-title','Show Siswa')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class ="card-body text-center">
                <img src="{{ asset('/template/img/'.$data->foto)}}" width="200" class="img-thumbnail">
                <h3>{{ $data->nama }}</h3>
                <h4>{{ $data->email }}</h4>
                <h4>{{ $data->alamat }}</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class ="card-body">

            </div>
        </div>
    </div>
</div>
@endsection