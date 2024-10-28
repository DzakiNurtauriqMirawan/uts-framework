@extends('layout.main')
@section('content')
    <!-- Main Content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center mb-0">Daftar Event</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Event
                            </a>
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" style="width: 5%">No</th>
                                        <th class="text-center" style="width: 15%">Gambar</th>
                                        <th class="text-center" style="width: 20%">Judul</th>
                                        <th class="text-center" style="width: 15%">Lokasi</th>
                                        <th class="text-center" style="width: 15%">Tanggal</th>
                                        <th class="text-center" style="width: 10%">Status</th>
                                        <th class="text-center" style="width: 20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('uploads/events/' . $event->image) }}" 
                                                alt="{{ $event->title }}" 
                                                class="img-thumbnail">
                                        </td>
                                        <td>{{ $event->title }}</td>
                                        <td class="text-center">{{ $event->location }}</td>
                                        <td class="text-center">{{ $event->date }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $event->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($event->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center action-buttons">
                                                <a href="{{ route('admin.events.edit', $event->id) }}" 
                                                class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square me-1"></i>Edit
                                                </a>
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteModal{{ $event->id }}">
                                                    <i class="bi bi-trash me-1"></i>Hapus
                                                </button>
                                            </div>

                                            <!-- Modal Konfirmasi Hapus -->
                                            <div class="modal fade" 
                                                id="deleteModal{{ $event->id }}" 
                                                tabindex="-1" 
                                                aria-labelledby="deleteModalLabel{{ $event->id }}" 
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $event->id }}">
                                                                Konfirmasi Penghapusan
                                                            </h5>
                                                            <button type="button" 
                                                                    class="btn-close" 
                                                                    data-bs-dismiss="modal" 
                                                                    aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <i class="bi bi-exclamation-triangle text-warning fs-1 mb-3 d-block"></i>
                                                            <p>Apakah Anda yakin ingin menghapus event:</p>
                                                            <strong>{{ $event->title }}</strong>?
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" 
                                                                    class="btn btn-secondary" 
                                                                    data-bs-dismiss="modal">
                                                                <i class="bi bi-x-circle me-1"></i>Batal
                                                            </button>
                                                            <form action="{{ route('admin.events.destroy', $event->id) }}" 
                                                                method="POST" 
                                                                style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="bi bi-trash me-1"></i>Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-hide alert after 5 seconds
        window.setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>