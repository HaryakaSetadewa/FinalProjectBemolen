
<x-backpage-layout>
    <div class="card bg-secondary text-white">
        <div class="card-header">
            <h3>Edit Data</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('backpages.update', $backpage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_bengkel" class="form-label">Nama Bengkel</label>
                            <input type="text" class="form-control" id="nama_bengkel" name="nama_bengkel" value="{{ $backpage->nama_bengkel }}">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $backpage->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <textarea class="form-control" id="kategori" name="kategori">{{ $backpage->kategori }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">Pilih Perusahaan</label>
                            <select class="form-select" id="nama_perusahaan" name="nama_perusahaan">
                                @foreach($perusahaan as $p)
                                    <option value="{{ $p->nama_perusahaan }}" {{ $p->id == $backpage->id_perusahaan ? 'selected' : '' }}>{{ $p->nama_perusahaan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <textarea class="form-control" id="lokasi" name="lokasi">{{ $backpage->lokasi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jam_buka" class="form-label">Jam Buka</label>
                            <input type="text" class="form-control flatpickr" id="jam_buka" name="jam_buka" value="{{ $backpage->jam_buka }}">
                        </div>
                        <div class="mb-3">
                            <label for="jam_tutup" class="form-label">Jam Tutup</label>
                            <input type="text" class="form-control flatpickr" id="jam_tutup" name="jam_tutup" value="{{ $backpage->jam_tutup }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('backpages.index')}}" class="btn btn-secondary ms-2">Kembali</a>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/edit.js') }}"></script>

</x-backpage-layout>

