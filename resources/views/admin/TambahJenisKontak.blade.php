@extends('admin.app')
@section('title','Tambah Kontak')
@section('content-title','Tambah Kontak')
@section('content')

<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-body">
        <form action="{{route('jeniskontak.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Jenis kontak</label>
                <input class="form-control" id="jenis_kontak" name="jenis_kontak">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="simpan">
                <a href="{{route('masterkontak.index')}}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection