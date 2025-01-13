@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Crew</h1>

        <!-- Display crew details -->
        <div class="mb-3">
            <label class="form-label"><strong>Maps ID:</strong></label>
            <p>{{ $crew->maps_id }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Nama:</strong></label>
            <p>{{ $crew->name }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Foto Profil:</strong></label>
            @if ($crew->profile_picture)
                <img src="{{ Storage::url($crew->profile_picture) }}" alt="Profile Picture" width="150">
            @else
                <p>Foto tidak tersedia</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Posisi:</strong></label>
            <p>{{ $crew->position }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Tanggal Lahir:</strong></label>
            <p>{{ $crew->born_date }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Alamat:</strong></label>
            <p>{{ $crew->address }}</p>
        </div>

        <!-- Dokumen Buku Pelaut -->
        <div class="mb-3">
            <label for="seamanbook_file_path" class="form-label"><strong>Dokumen Buku Pelaut</strong></label>
            @if ($crew->seamanbook_file_path)
                <a href="{{ Storage::url($crew->seamanbook_file_path) }}" target="_blank" class="btn btn-primary">Lihat Dokumen Buku Pelaut</a>
            @else
                <p>No seamanbook document available.</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Pengalaman:</strong></label>
            <p>{{ $crew->experience }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Kontak Keluarga Dekat:</strong></label>
            <p>{{ $crew->next_of_kind }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Nomor Telepon:</strong></label>
            <p>{{ $crew->phone }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Email:</strong></label>
            <p>{{ $crew->email }}</p>
        </div>

        <a href="{{ route('crews.index') }}" class="btn btn-secondary">Kembali ke Daftar Crew</a>
    </div>
@endsection
