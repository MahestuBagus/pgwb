@extends('admin.app')
@section('title', 'Master Project')
@section('content-title', 'Master Project')
@section('content')

@if ($massage = Session::get('success'))
<div>
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$massage}}</strong>
</div>
@endif

<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-yin-yang"></i>Data siswa</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($siswa as $item)
                    <tbody>
                        <tr>
                            <th>{{$item->nisn}}</th>
                            <th>{{$item->nama}}</th>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info btn-square"onclick="show({{ $item->id }})"><i class="fas fa-folder-open"></i></a>
                                   <a href="/masterproject/tambah/{{$item->id}}" class="btn btn-sm btn-success btn-circle"><i class="fas fa-plus"> </i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="card-footer d-flex justify-content-end">{{$siswa->links()}}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-yin-yang"></i>Project siswa</h6>
            </div>
            <div id="project" class="card-body">
            </div>
        </div>
    </div>
</div>
<script >
    function show(id) {
        $.get('masterproject/' +id, function(data) {
            $('#project').html(data);
        })
    }
</script>


@endsection