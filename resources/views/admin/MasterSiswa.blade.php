@extends('admin.app')
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('mastersiswa.create') }}" class="btn btn-success">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $item)
                            <tr>
                                <th scope="row">{{++$i}}</th>
                                <td>{{$item -> nama }}</td>
                                <td>{{$item -> nisn }}</td>
                                <td>{{$item -> alamat }} </td>
                                <td>{{$item -> jk }}</td>
                                <td>
                                    <a href="{{ route('mastersiswa.show', $item -> id) }}" class="btn btn-sm  btn-info btn-circle"><i class="fas fa-info"></i>
                                        <a href="{{ route('mastersiswa.edit', $item -> id) }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i>
                                            <a href="{{ route('mastersiswa.hapus', $item -> id) }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection