@extends('layouts.app')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <h2>Arsip Surat >> Edit</h2>
                        <p>Edit surat yang telah terbit pada form ini untuk diarsipkan.</p>
                        <p><strong>Catatan:</strong> Gunakan file berformat PDF</p>
                        <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data"
                            style="border: 1px solid #000; padding: 20px; border-radius: 5px;">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" required
                                    value="{{ $surat->nomor_surat }}">
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_surat" class="form-label">Kategori</label>
                                <select name="id_kategori_surat" id="id_kategori_surat" class="form-control" required>
                                    @foreach ($kategoriSurats as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $kategori->id == $surat->id_kategori_surat ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="judul_surat" class="form-label">Judul</label>
                                <input type="text" name="judul_surat" id="judul_surat" class="form-control" required
                                    value="{{ $surat->judul_surat }}">
                            </div>
                            <div class="form-group">
                                <label for="file_surat" class="form-label">File Surat (PDF)</label>
                                <input type="file" name="file_surat" id="file_surat" class="form-control"
                                    accept="application/pdf">
                            </div>
                            <div class="form-group">
                                <a href="{{ route('surat.index') }}" class="btn btn-secondary">
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
            margin-right: 10px;
            font-weight: bold;
        }

        .form-control {
            flex: 1;
            border-radius: 5px;
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
