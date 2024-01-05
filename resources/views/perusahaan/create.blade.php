<x-backpage-layout>
    <div class="card bg-secondary text-white">
        <div class="card-header">
            <h3 class="mb-0">Create Data Perusahaan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('perusahaans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                            @error('nama_perusahaan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_kontak" class="form-label">Nama Kontak</label>
                            <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" placeholder="Masukkan Nama Kontak">                    
                            @error('nama_kontak')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                            <input type="text" class="form-control" id="email_perusahaan" name="email_perusahaan" placeholder="Masukkan Email Perusahaan">                    
                            @error('email_perusahaan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan No Telepon">                    
                            @error('no_telp')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-3"> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-backpage-layout>
