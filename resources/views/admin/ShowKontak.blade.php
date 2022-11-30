@if ($kontak->isEmpty())
    <h6 class="text-center">Siswa Belum Memiliki Kontak</h6>

@else
    @foreach($kontak as $item)
        <div class="card mb-3">
            <div class="card-header">
               
            </div>

            <div class="card-body">
                <strong>Jenis Kontak :</strong>
                <p>{{ $item->jenis_kontak }}</p>
                <strong>Deskripsi Kontak :</strong>
                <p>{{ $item->pivot->deskripsi }}</p>
            </div>

            <div class="card-footer">
                   
                <a href="{{ route('masterkontak.edit', $item->pivot->id)  }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                <a href="{{ route('masterkontak.hapus', $item->pivot->id)  }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                
            </div>
        </div>
        @endforeach
        
@endif