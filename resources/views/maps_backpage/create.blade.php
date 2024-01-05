<x-backpage-layout>
    <div class="card bg-secondary text-white">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Tambah Lokasi Bengkel</h3>
            <div>
                <a href="{{ route ('maps-page')}}" target="_blank" class="btn btn-outline-danger text-1.7rem text-white px-3">Maps</a>
            </div>
        </div>        
        <div class="card-body">
            <form action="{{ route('maps_backpage.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="id_bengkel" class="form-label">Nama Bengkel</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" id="id_bengkel" name="id_bengkel" required>
                                    @foreach ($backpages as $backpage)
                                        <option value="{{ $backpage->id }}">{{ $backpage->nama_bengkel }}</option>
                                    @endforeach
                                </select>
                                @error('id_bengkel')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="koordinatX" class="form-label ">Kordinat X</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="koordinatX" name="koordinatX" placeholder="Masukkan Koordinat X" required>                    
                                @error('koordinatX')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="koordinatY" class="form-label">Kordinat Y</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="koordinatY" name="koordinatY" placeholder="Masukkan Koordinat Y" required>                 
                                @error('koordinatY')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center "> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-backpage-layout>
