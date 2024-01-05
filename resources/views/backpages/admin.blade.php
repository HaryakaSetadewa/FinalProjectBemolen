<x-backpage-layout>  
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Sale</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Sale</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-2">
                        <p class="mb-2">Today Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Data Bengkel</h6>
                <a href="{{ route('backpages.create') }}" class="btn btn-outline-danger text-white">Create</a>
            </div>
            <form action="{{ route('backpages.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Search by Name">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0" style="font-size: 0.8em;">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">No</th>
                            <th scope="col">Nama Bengkel</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Jam Buka</th>
                            <th scope="col">Jam Tutup</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 1em;">
                        @foreach ($backpages as $backpage)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $backpage->nama_bengkel }}</td>
                                <td class="img-column"><img src="{{ asset('images/' . $backpage->foto) }}" alt="{{ $backpage->nama_bengkel }}" class="img-thumbnail" width="200" height="200"></td>
                                <td class="desc-column">{!! Str::limit($backpage->deskripsi, 20) !!}</td>
                                <td>{{ $backpage->kategori }}</td>
                                <td>{{ $backpage->lokasi }}</td>
                                <td>{{ date('H:i', strtotime($backpage->jam_buka)) }}</td>
                                <td>{{ date('H:i', strtotime($backpage->jam_tutup)) }}</td>
                                <td>
                                    <a href="{{ route('backpages.show', $backpage->id) }}" class="btn btn-primary">
                                        <i class="fas fa-info-circle"></i> 
                                    </a>                                    
                                    <a href="{{ route('backpages.edit', $backpage->id) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                    <form action="{{ route('backpages.destroy', $backpage->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                            <i class="fas fa-trash-alt"></i> 
                                        </button>
                                    </form>                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4 text-center">
                {{ $backpages->appends(request()->query())->links('pagination::simple-bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
</x-backpage-layout>