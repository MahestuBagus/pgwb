@extends('admin.app')
 
@section('title', 'Tambah Project')
@section('content-title', 'Tambah Project - '.$siswa->nama)
@section('content')
    <!-- <h1>Halaman Tambah Project</h1> -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="/masterproject" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                        <div class="form-group">
                            <label for="nama_project">Nama Project</label>
                            <input type="text" class="form-control" id="nama_project" name='nama_project' value="{{ old('nama_project') }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{ old('deskripsi') }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name='tanggal' value="{{ old('tanggal') }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection