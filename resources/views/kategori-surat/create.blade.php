@extends('layouts.app')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <h3>Kategori Surat >> Tambah</h3>
                        <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol
                            "Simpan".</p>
                        <form action="{{ route('kategori-surat.store') }}" method="POST"
                            style="border: 1px solid #000; padding: 20px; border-radius: 5px;">
                            @csrf
                            <div class="form-group">
                                <label for="id" class="form-label">ID (Auto Increment)</label>
                                <input type="text" id="id" class="form-control" value="{{ $nextId }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="form-label">Judul</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('kategori-surat.index') }}" class="btn btn-secondary">
                                    << Kembali</a>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customStyle')
    <style>
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-label {
            width: 150px;
            /* Adjust this width as needed */
            margin-right: 10px;
            font-weight: bold;
        }

        .form-control {
            flex: 1;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #000;
        }

        .btn {
            padding: 10px 20px;
            margin-right: 10px;
            border: 1px solid #000;
            border-radius: 5px;
        }

        .btn-secondary {
            background-color: #ccc;
        }

        .btn-success {
            background-color: #4CAF50;
            color: white;
        }
    </style>
@endpush
