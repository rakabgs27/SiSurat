@extends('layouts.app')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <h2>Arsip Surat >> Lihat</h2>
                        <div>
                            <p><strong>Nomor:</strong> {{ $surat->nomor_surat }}</p>
                            <p><strong>Kategori:</strong> {{ $surat->kategori->nama_kategori }}</p>
                            <p><strong>Judul:</strong> {{ $surat->judul_surat }}</p>
                            <p><strong>Waktu Unggah:</strong> {{ $surat->created_at }}</p>
                        </div>
                        <div style="border: 1px solid #000; padding: 20px; margin: 20px 0;">
                            <embed src="{{ Storage::url($surat->file_surat) }}" type="application/pdf" width="100%"
                                height="600px" />
                        </div>
                        <div>
                            <a href="{{ route('surat.index') }}" class="btn btn-secondary">
                                << Kembali</a>
                                    <a href="{{ Storage::url($surat->file_surat) }}" class="btn btn-primary"
                                        download="{{ $surat->file_name }}">Unduh</a>
                                    <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-warning">Edit/Ganti
                                        File</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customStyle')
    <style>
        .btn {
            padding: 10px 20px;
            margin-right: 10px;
            border: 1px solid #000;
            border-radius: 5px;
        }

        .btn-secondary {
            background-color: #ccc;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
        }
    </style>
@endpush
