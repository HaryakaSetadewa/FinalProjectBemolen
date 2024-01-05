<x-backpage-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Data Review</h6>

            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0" style="font-size: 0.8em;">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">No</th>
                            <th scope="col">Nama Bengkel</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Review</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 1em;">
                        @foreach ($reviews as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->backpage->nama_bengkel }}</td>
                                <td>{{ $item->nama_user }}</td>
                                <td>{{ $item->review }}</td>
                                <td>
                                    <form action="{{ route('reviews.destroy', $item->id) }}" method="POST" class="d-inline">
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
                    {{ $reviews->appends(request()->query())->links('pagination::simple-bootstrap-4') }}
                    </div>
            </div>
        </div>
    </div>    
</x-backpage-layout>