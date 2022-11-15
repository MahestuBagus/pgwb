@extends('admin.app')
@section('title', 'Tambah Siswa')
@section('content-title', 'Tambah Siswa')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" enctype="multipart/form-data" action="{{ route('mastersiswa.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name='nama' value="{{old('nama')}}">
                    </div>
                    <div class="form-group">
                        <label for="nisn">Nisn</label>
                        <input type="text" class="form-control" id="nisn" name='nisn' value="{{old('nisn')}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name='alamat' value="{{old('alamat')}}">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-select form-control" id="jk" name='jk' value="{{old('jk')}}">
                            <option value="laki-laki">Laki - Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input type="file" class="form-control-file" id="foto" name='foto'>
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea type="text" class="form-control" id="about" name='about'></textarea>
                    </div>
                    <div class="form-group">
                        {{-- <a type="submit" class="btn btn-success">Simpan</a> --}}
                        <input type="submit" class="btn btn-success" value="simpan">
                        <a href="{{ route('mastersiswa.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection