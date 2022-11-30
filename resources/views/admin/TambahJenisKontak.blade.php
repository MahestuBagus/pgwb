@extends('admin.app')

@section('title', 'Tambah Jenis Kontak')
@section('content-title', 'Tambah Jenis Kontak')
@section('content')
<h1>Halaman Tambah Jenis Kontak</h1>
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
                <form method="post" action="{{ route('jeniskontak.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_kontak">Jenis Kontak</label>
                        <input type="text" class="form-control" id="jenis_kontak" name='jenis_kontak' value="{{ old('jenis_kontak') }}">
                    </div>
                    <div class="form-group">
                        {{-- <a href="submit" class="btn btn-success">Simpan</a> --}}
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{ route('masterkontak.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection