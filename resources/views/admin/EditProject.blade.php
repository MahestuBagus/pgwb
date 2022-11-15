@extends('admin.app')
 
@section('title', 'Tambah Project')
@section('content-title', 'Tambah Project - '.$idnya->nama)
@section('content')

<h1>Halaman Edit Project</h1>
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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('masterproject.update', $siswa->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_p">Nama Project</label>
                            <input type="text" class="form-control" id="nama_project" name='nama_project' value="{{ $siswa->nama_project }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{ $siswa->deskripsi }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name='tanggal' value="{{ $siswa->tanggal }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-success">
                            {{-- <a href="submit" class="btn btn-success">Update</a> --}}
                            <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection