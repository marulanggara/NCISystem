@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Data Crew</h1>

        <!-- Menampilkan error jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('crews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Maps ID -->
            <div class="mb-3">
                <label for="maps_id" class="form-label">Maps ID</label>
                <input type="text" class="form-control" name="maps_id" id="maps_id" required>
            </div>

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <!-- Profile Picture -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" name="profile_picture" id="profile_picture" accept="image/*">
            </div>

            <!-- Position -->
            <div class="mb-3">
                <label for="position" class="form-label">Posisi</label>
                <input type="text" class="form-control" name="position" id="position">
            </div>

            <!-- Seamanbook File -->
            <div class="mb-3">
                <label for="seamanbook_file_path" class="form-label">Dokumen Buku Pelaut</label>
                <input type="file" class="form-control" name="seamanbook_file_path" id="seamanbook_file_path" accept=".pdf">
            </div>

            <!-- Passport File -->
            <div class="mb-3">
                <label for="passport_file_path" class="form-label">Dokumen Passport</label>
                <input type="file" class="form-control" name="passport_file_path" id="passport_file_path" accept=".pdf">
            </div>

            <!-- Medical File -->
            <div class="mb-3">
                <label for="medical_file_path" class="form-label">Dokumen Medis</label>
                <input type="file" class="form-control" name="medical_file_path" id="medical_file_path" accept=".pdf">
            </div>

            <!-- Certificate File -->
            <div class="mb-3">
                <label for="certificate_file_path" class="form-label">Dokumen Sertifikat</label>
                <input type="file" class="form-control" name="certificate_file_path" id="certificate_file_path" accept=".pdf">
            </div>

            <!-- Born Date -->
            <div class="mb-3">
                <label for="born_date" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="born_date" id="born_date">
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
            </div>

            <!-- Experience -->
            <div class="mb-3">
                <label for="experience" class="form-label">Pengalaman</label>
                <textarea class="form-control" name="experience" id="experience" rows="3" placeholder="Tambahkan pengalaman kerja, pisahkan dengan koma jika lebih dari satu"></textarea>
            </div>

            <!-- Next of Kind -->
            <div class="mb-3">
                <label for="next_of_kind" class="form-label">Kontak Keluarga Dekat</label>
                <input type="text" class="form-control" name="next_of_kind" id="next_of_kind">
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
