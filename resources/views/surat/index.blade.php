@extends('layouts.app')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <!-- Header and Search Form Start -->
                        <h2>Arsip Surat</h2>
                        <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
                        <p>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
                        <form action="{{ route('surat.index') }}" method="GET" class="mb-4">
                            <div class="search-container">
                                <p>Cari surat :</p>
                                <div class="input-group">
                                    <input type="text" name="search" id="search" class="form-control"
                                        placeholder="search" value="{{ request()->query('search') }}">
                                </div>
                                <button type="submit" class="btn btn-search">Cari</button>
                            </div>
                        </form>
                        <!-- Header and Search Form End -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="proposalList">
                                <thead>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <th>Kategori</th>
                                        <th>Judul</th>
                                        <th>Waktu Pengarsipan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Arsips as $arsipItem)
                                        <tr>
                                            <td>{{ $arsipItem->nomor_surat }}</td>
                                            <td>{{ $arsipItem->kategori->nama_kategori }}</td>
                                            <td>{{ $arsipItem->judul_surat }}</td>
                                            <td>{{ $arsipItem->created_at }}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete({{ $arsipItem->id }})">Hapus</button>
                                                <form id="delete-form-{{ $arsipItem->id }}"
                                                    action="{{ route('surat.destroy', $arsipItem->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="{{ Storage::url($arsipItem->file_surat) }}" class="btn btn-warning"
                                                    download="{{ $arsipItem->file_name }}">Unduh</a>
                                                <a href="{{ route('surat.show', $arsipItem->id) }}"
                                                    class="btn btn-primary">Lihat >></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $Arsips->links() }}
                        <a href="{{ route('surat.create') }}" class="btn btn-success mt-3">Arsipkan Surat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customScript')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }

        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
@endpush

@push('customStyle')
    <style>
        .form-label {
            display: none;
        }

        .input-group {
            display: flex;
            align-items: center;
            max-width: 400px;
        }

        .input-group .form-control {
            border-radius: 25px;
            padding: 0.5rem 1rem;
            border: 1px solid #ccc;
            flex: 1;
        }

        .btn-search {
            padding: 0.5rem 1rem;
            border: 1px solid #4d79ff;
            background-color: #4d79ff;
            color: #fff;
            margin-left: 10px;
            text-decoration: none;
        }

        .btn-search:hover {
            background-color: #3a5abd;
            border-color: #3a5abd;
        }

        .btn-danger {
            background-color: #ff4d4d;
            border-color: #ff4d4d;
        }

        .btn-primary {
            background-color: #4d79ff;
            border-color: #4d79ff;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table td,
        .table th {
            padding: 0.75rem;
            vertical-align: middle;
        }

        .search-container {
            display: flex;
            align-items: center;
        }

        .search-container p {
            margin-right: 10px;
            margin-bottom: 0;
        }
    </style>
@endpush
