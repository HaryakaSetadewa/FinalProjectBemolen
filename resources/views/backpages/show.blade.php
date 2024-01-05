<x-backpage-layout>
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h3>Show Data</h3>
        </div>
        <div class="card-body bg-dark">
            <h5 class="card-title text-white">{{ $backpage->nama_bengkel }}</h5>
            <div class="bg-secondary p-3 rounded ">
                <img src="{{ asset('images/' . $backpage->foto) }}" alt="{{ $backpage->nama_bengkel }}" class="img-thumbnail d-block mx-auto " width="500" height="500">
                <div class="description">
                    <div class="description">
                        <?php
                        $deskripsiWithoutTags = strip_tags($backpage->deskripsi);
                        ?>
                        <p class="card-text text-white">Deskripsi: {{ $deskripsiWithoutTags }}</p>
                    </div>
                </div>
                
                <p class="card-text text-white">Id Bengkel: {{ $backpage->id }}</p>
                <p class="card-text text-white">Kategori: {{ $backpage->kategori }}</p>
                <p class="card-text text-white">Alamat: {{ $backpage->lokasi }}</p>
                <p class="card-text text-white">Jam Buka: {{ $backpage->jam_buka }}</p>
                <p class="card-text text-white">Jam Tutup: {{ $backpage->jam_tutup }}</p>
            </div>
            <div class="mt-3">
                <a href="{{ route('backpages.edit', $backpage->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{route('backpages.index')}}" class="btn btn-secondary ms-2">Kembali</a>
            </div>
        </div>
    </div>
</x-backpage-layout>
