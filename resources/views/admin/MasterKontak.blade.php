@extends('admin.app')

@section('title','Master Kontak')
@section('content-title','Master Kontak')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary">
                <h4 class="m-0 font-weight-bold text-white"><i class="  "></i> Jenis Kontak</h4>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (auth()->user()->role==0)
                <a href="{{ route('jeniskontak.create') }}" class="btn btn-outline-success" style="margin-left: 850px">Tambah Jenis Kontak</a>
                @endif
            </div>
            <div class="card-body text-center">
                <table class="table">
                    <thead>
                        <tr>
                            
                            <th scope="col">Jenis Kontak</th>
                            @if (auth()->user()->role==0)
                            <th scope="col">ACTION</th>
                            @endif
                        </tr>
                    </thead>
                    @foreach($jenis as $jenis_kontakk)
                    <tr>
                        <td> {{ $jenis_kontakk->jenis_kontak }} </td>
                        @if (auth()->user()->role==0)
                        <td class="text-center">
                            <a href="{{ route('jeniskontak.hapus', $jenis_kontakk->id)  }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </table>
                <div class="card-footer d-flex justify-content-end">
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary" ">
                <h6 class=" m-0 font-weight-bold text-white "><b>Data Siswa</b></h6>
            </div>
            <div class=" card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nisn</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item -> nisn }}</td>
                            <td>{{ $item -> nama }}</td>
                            <td>
                                <a class="btn btn-info" onclick="show({{ $item->id }})"><i class="fas fa-folder-open"></i></a>
                                <a href="{{ url('masterkontak/create', $item->id)}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer d-flex justify-content-end">
                </div>
            </div>
        </div>
    </div>
    {{-- info bary --}}
    <div class="col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary" ">
                <h6 class=" m-0 font-weight-bold text-white"><b>Kontak Siswa</b></h6>
            </div>
            <div class="card-body" id="kontak">
                <h6 class="text-center">Tidak ada data yang dipilih</h6>
            </div>
        </div>
    </div>
</div>

<script>
    function show(id) {
        $.get('masterkontak/' + id, function(data) {
            $('#kontak').html(data);
        });
    }
</script>



@endsection