<x-backpage-layout>
    <div class="card bg-secondary text-white">
        <div class="card-header">
            <h3 class="mb-0">Edit Data Perusahaan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('perusahaans.update', $perusahaan->id_perusahaan) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $perusahaan->nama_perusahaan }}" >
                        </div>
                        <div class="form-group">
                            <label for="nama_kontak" class="form-label">Nama Kontak</label>
                            <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" value="{{ $perusahaan->nama_kontak }}">                    
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                            <input type="text" class="form-control" id="email_perusahaan" name="email_perusahaan" value="{{ $perusahaan->email_perusahaan}}" >                    
                        </div>
                        <div class="form-group">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $perusahaan->no_telp}}">                    
                        </div>
                    </div>
                </div>
                <div class="mt-3"> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('perusahaans.index')}}" class="btn btn-secondary ms-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-backpage-layout>
