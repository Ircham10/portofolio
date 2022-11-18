@extends('admin.app')
@section('title', 'CreateSiswa')
@section('content-title','Create Siswa')
@section('content')

<div class="row">
    <div class = "col-lg-12">
        <div class = "card shadow mb-4">
            <div class ="card header py-3">
                <h6 class ="m - 0 font-weight-bold text-primary"> Data siswa</h6>
            </div>

            <div class ="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                            @endforeach
                    </ul>
                </div>
                @endif

                <form method = "post" enctype = "multipart/form-data" action="{{ route('mastersiswa.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="NISN">NISN</label>
                        <input type="text" class="form-control" id="NISN" name="nisn" value="{{ old('nisn')}}">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="Nama" name="nama" value="{{ old('nama')}}">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select type="text" class="form-control" id="jk" name="jk" value="{{ old('jk')}}">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="Alamat" name="alamat" value="{{ old('alamat')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <input type="text" class="form-control" id="about" name="about" value="{{ old('about')}}">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto" value="{{ old('foto')}}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="simpan">
                        <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection