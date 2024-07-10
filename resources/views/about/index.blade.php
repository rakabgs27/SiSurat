@extends('layouts.app')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="card-body">
            <h2>About</h2>
            <div class="about-container">
                <div class="about-image">
                    <img src="{{ asset('assets/images/2041720187.jpg') }}" alt="Profile Picture" class="profile-img">
                </div>
                <div class="about-details">
                    <p>Aplikasi ini dibuat oleh:</p>
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>: Raka Bagas Fitriansyah</td>
                        </tr>
                        <tr>
                            <td>Prodi</td>
                            <td>: D4-Teknik Informatika</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>: 2041720187</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: 10 Juli 2024</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customStyle')
    <style>
        .about-container {
            display: flex;
            align-items: flex-start;
            margin-top: 20px;
        }

        .about-image {
            margin-right: 20px;
        }

        .profile-img {
            width: 200px;
            height: 300px;
            border-radius: 10px;
            object-fit: cover;
        }

        .about-details {
            line-height: 1.6;
        }

        .about-details p {
            margin: 0;
            font-size: 16px;
        }

        .about-details table {
            font-size: 16px;
            line-height: 1.6;
        }

        .about-details td {
            padding: 2px 5px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
@endpush
