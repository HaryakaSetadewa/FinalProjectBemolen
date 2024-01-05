<x-backpage-layout>
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
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Daftar Lokasi Bengkel</h6>
                <a href="{{ route('maps_backpage.create') }}" class="btn btn-primary mb-3">Tambah Lokasi Bengkel</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0" style="font-size: 0.8em;">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">No</th>
                            <th scope="col">Nama Bengkel</th>
                            <th scope="col">Kordinat X</th>
                            <th scope="col">Kordinat Y</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 1em;">
                        @foreach($mapsBackpages as $mapsBackpage)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $mapsBackpage->backpage->nama_bengkel }}</td>
                            <td>{{ $mapsBackpage->koordinatX }}</td>
                            <td>{{ $mapsBackpage->koordinatY }}</td>
                            <td>
                                <!-- Tombol Aksi disesuaikan -->
                                <a href="{{ route('maps_backpage.edit', $mapsBackpage->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('maps_backpage.destroy', $mapsBackpage->id) }}" method="POST" class="d-inline">
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
                    {{ $mapsBackpages->appends(request()->query())->links('pagination::simple-bootstrap-4') }}
                </div>
        </div>
    </div>
</x-backpage-layout>
