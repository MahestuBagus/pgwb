@extends('admin.app')
@section('title','Master Kontak')
@section('content-title','Master Kontak')
@section('content')

<!--Modal Tambah Data-->
<div class="col-lg-12">
    <table class="table">
        @csrf
        <thead class="bg-info">
            <tr class="text-white text-center">
                <th scope="col">Jenis Kontak</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        @foreach ($jenis as $item)
        <tbody>
            <tr class="text-center">
                <th>{{$item -> jenis_kontak}}</th>
                <td class="text-center">
                    <a class="btn-danger btn-sm btn-circle" href="{{route('jeniskontak.hapus' , $item->id)}}">
                        <i class="btn-sm info fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        </tbody>
        @endforeach
        <a href="{{route('jeniskontak.create')}}" class="btn btn-success mb-3">TAMBAH JENIS KONTAK</a>
    </table>
    <div class="card shadow mb-4">
        <!--Data Siswa-->
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-mb-4">
                    <div class="card-header bg-info">
                        <h6 class="m-0 font-weight-bold text-white">Data Siswa</h6>
                    </div>
                    <div class="card-body ">
                        <table class="table">
                            @csrf
                            <thead>
                                <tr>
                                    <th scope="col">NISN</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            @foreach ($data as $item)
                            <tbody>
                                <tr>
                                    <th>{{$item -> nisn }}</th>
                                    <th>{{$item -> nama }}</th>
                                    <td class="text-center">
                                        <!-- <a class="btn-warning btn-sm btn-circle" onclick="show({{ $item->id }})"> -->
                                        <i class="btn-sm info fas fa-folder-open"></i>
                                        </a>
                                        <a class="btn-success btn-sm btn-circle" href="{{ route('masterkontak.tambah', $item->id) }}">
                                            <i class="btn-sm info fas fa-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        {{$data->links()}}
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-mb-4">
                    <div class="card-header bg-info">
                        <h6 class="m-0 font-weight-bold text-white">Kontak Pribadi Siswa</h6>
                    </div>
                    <div class="card-body " id="kontak">
                        <div class="text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function show(id) {
                $.get('masterkontak/' + id, function(data) {
                    $('#kontak').html(data);
                })

            }
        </script>
    </div>
</div>
</div>
</div>

@endsection