@extends('admin.app')
@section('title', 'EditSiswa')
@section('content-title','Edit Siswa')
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

                <form method = "post" enctype = "multipart/form-data" action="{{ route('mastersiswa.update', $data->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="NISN">NISN</label>
                        <input type="text" class="form-control" id="NISN" name="nisn" value="{{ $data->nisn }}">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="Nama" name="nama" value="{{ $data->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select type="text" class="form-control" id="jk" name="jk" value="{{ $data->jk }}">
                            <option value="laki-laki" @if( $data->jk == 'laki-laki') selected @endif >Laki-Laki</option>
                            <option value="perempuan" @if( $data->jk == 'perempuan') selected @endif >Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="Alamat" name="alamat" value="{{ $data->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <input type="text" class="form-control" id="about" name="about" value="{{ $data->about }}">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <img src="{{ asset('/template/img/'.$data->foto)}}" width="300" class="img-thumbnail">
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