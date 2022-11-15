@extends('admin.app')
@section('title', 'Show Siswa')
@section('content-title', 'Show Siswa')
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-graduate"></i>Nama Siswa</h6>
            </div>
            <div class="card-body text-center">
                <img src="{{asset ('/template/img/'.$siswa->foto)}}" width="200" class=" rounded-circle img-thumbnail">
                <h5 class="">{{$siswa->nama}}</h5>
                <h5>{{$siswa->nisn}}</h5>
                <h5>{{$siswa->alamat}}</h5>
                <h5>{{$siswa->jk}}</h5>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tty"></i>Contact Siswa</h6>
            </div>
            <div class="card-body text-center">
                @foreach ($kontaks as $kontak)
                <li>{{$kontak->jenis_kontak}}:{{$kontak->pivot->deskripsi}}</li>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-yin-yang"></i>Project siswa</h6>
            </div>
            <div class="card-body">
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-virus-slash"></i>About siswa</h6>
            </div>
            <div class="card-body">
                <blockquote class="blockquote tecxt-center">
                    <p class="mb-0">{{$siswa->about}}</p>
                    <footer class="blockquote-footer">Ditulis oleh <cite title="Source Title"></cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>
@endsection