<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCI System | Add Crew</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Hover efek untuk upload gambar */
        .profile-container {
            position: relative;
            display: inline-block;
        }

        .profile-container img {
            transition: opacity 0.3s ease;
        }

        .upload-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: none;
        }

        .profile-container:hover .upload-text {
            display: block;
        }
    </style>
</head>

<body>
    <!-- Isi Halaman -->
    <div style="height: 100vh;">
        <div class="container-fluid">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-2 px-0 bg-primary position-sticky top-0 overflow-y-auto h-100">
                    <div class="d-flex flex-column justify-content-between align-items-center px-3 pt-2 text-white min-vh-100">
                        <!-- Header Sidebar -->
                        <div class="py-4">
                            <a href="#" class="d-flex justify-content-center align-items-center text-white text-decoration-none">
                                <h3>NCI System</h3>
                            </a>
                        </div>
                        <!-- End Header Sidebar -->

                        <hr class="mt-0" style="width: 100%; border: 1px solid white;">

                        <!-- Button Navigasi Sidebar -->
                        <div class="flex-grow-1">
                            <!-- Button Dashboard -->
                            <a href="{{ route('dashboard') }}" class="container-fluid btn btn-primary btn-lg p-0 sidebar-btn">
                                <div class="row w-100 py-2">
                                    <div class="col-4">
                                        <i class="fa-solid fa-house text-light ps-1"></i>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-light" style="font-size: 16px;">Dashboard</span>
                                    </div>
                                </div>
                            </a>
                            <!-- End Button Dashboard -->

                            <!-- Button Tambah Crew -->
                            <a href="{{ route('crews.create') }}" class="container-fluid btn btn-primary btn-lg p-0 sidebar-btn">
                                <div class="row w-100 py-2">
                                    <div class="col-4">
                                        <i class="fa-solid fa-plus ps-1"></i>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-light" style="font-size: 16px;">Tambah Crew</span>
                                    </div>
                                </div>
                            </a>
                            <!-- End Button Tambah Crew -->
                        </div>
                        <!-- End Button Navigasi -->

                        <hr style="width: 100%; border: 1px solid white;">

                        <!-- Button Profile -->
                        <div class="container-fluid dropdown btn btn-primary py-2 mb-4 rounded-3 sidebar-btn">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                id="dropdownUser 1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- End Button Profile -->

                    </div>
                </div>
                <!-- End Sidebar -->

                <!-- Content -->
                <div class="col pt-2 px-0 d-flex flex-column pb-0">

                    <!-- Container Card -->
                    <div class="container-fluid flex-grow-1" style="width: 90%;">

                        <!-- Card -->
                        <div class="card container-fluid bg-secondary-subtle px-0" style="height: 93vh;">
                            <div class="card-body d-flex flex-column pt-1 pb-0">

                                <!-- Header Card -->
                                <h4 class="text-center">Tambah Crew</h4>
                                <!-- End Header Card-->

                                <!-- Form -->
                                <form id="crewForm" action="{{ route('crews.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex">

                                        <!-- Form Kiri -->
                                        <div class="w-50 pb-0 ps-1 pe-3 d-flex flex-column align-items-center"
                                            style="max-height: 78vh; overflow-y: auto;">
                                            <!-- Image Container -->
                                            <div class="profile-container mb-3">
                                                <label for="profile_picture">
                                                    <img id="profilePreview" class="rounded-circle" style="height: 200px; width: 200px; cursor: pointer; object-fit: cover; blur: 10px" alt="avatar1" src='data:image/png;base64,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' />
                                                    <div class="upload-text">Upload Image</div>
                                                </label>
                                                <input type="file" id="profile_picture" name="profile_picture" class="d-none" accept="image/*">
                                            </div>
                                            <!-- End Foto Profile -->

                                            <!-- Input Fields -->
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <input type="text" class="form-control" id="maps_id" name="maps_id" placeholder="" required>
                                                <label for="floatingInput1">Maps ID</label>
                                            </div>
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                                                <label for="floatingInput2">Nama</label>
                                            </div>
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <input type="date" class="form-control" id="born_date" name="born_date" placeholder="" required>
                                                <label for="floatingInput3">Tanggal Lahir</label>
                                            </div>
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <select class="form-select" id="office" name="office" required>
                                                    <option value="" disabled selected>Pilih Kantor</option>
                                                    <option value="Jakarta" {{ old('office', $crew->office ?? '') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                                    <option value="Yogyakarta" {{ old('office', $crew->office ?? '') == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                                                    <option value="Bali" {{ old('office', $crew->office ?? '') == 'Bali' ? 'selected' : '' }}>Bali</option>
                                                    <option value="Bandung" {{ old('office', $crew->office ?? '') == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                                    <option value="Surabaya" {{ old('office', $crew->office ?? '') == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                                </select>
                                                <label for="office">Kantor</label>
                                            </div>
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <input type="text" class="form-control" id="position" name="position" placeholder="" required>
                                                <label for="floatingInput4">Posisi</label>
                                            </div>
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                                                <label for="floatingInput5">Email</label>
                                            </div>
                                        </div>
                                        <!-- End Form Kiri -->

                                        <div class="vr"></div>

                                        <!-- Form Kanan -->
                                        <div class="w-50 ps-3 pe-1" style="max-height: 78vh; overflow-y: auto;">
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="" required>
                                                <label for="floatingInput6">Nomor HP</label>
                                            </div>
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <textarea class="form-control" placeholder="" id="address" name="address" required></textarea>
                                                <label for="floatingTextarea">Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <input type="text" class="form-control" id="next_of_kind" name="next_of_kind" placeholder="" required>
                                                <label for="floatingInput7">Next of Kin</label>
                                            </div>
                                            <div class="form-floating mb-3 container-fluid px-0">
                                                <input class="form-control" type="text" id="experience" name="experience" placeholder="" required>
                                                <label for="floatingInput">Pengalaman</label>
                                            </div>
                                            <div class="mb-2">
                                                <label for="buku_pelaut" class="mb-1">Seaman Book</label>
                                                <input class="form-control" type="file" id="seamanbook_file_path" name="seamanbook_file_path" multiple required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="passport" class="mb-1">Passport</label>
                                                <input class="form-control" type="file" id="passport_file_path" name="passport_file_path" multiple required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="medical" class="mb-1">Medical</label>
                                                <input class="form-control" type="file" id="medical_file_path" name="medical_file_path" multiple required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="certificate" class="mb-1">Certificate</label>
                                                <input class="form-control" type="file" id="certificate_file_path" name="certificate_file_path" multiple required>
                                            </div>
                                        </div>
                                        <!-- End Form Kanan-->

                                    </div>
                                    <!-- End Form -->

                            </div>

                            <!-- Submit Button Form -->
                            <div class="card-footer d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" style="width: 20%;" data-bs-toggle="modal" data-bs-target="#ConfirmModal">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </div>
                                        <div class="col-10">
                                            <span>Tambah</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </form>
                        <!-- End Submit Button Form -->

                        </div>
                        <!-- End Card -->

                    </div>

                    <!-- Footer -->
                    <div class="footer container-fluid mx-0 bg-primary text-light position-sticky overflow-y-auto bottom-0">
                        &copy;2024 by <b>NCI System Dev</b>
                    </div>
                    <!-- End Footer-->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Tambah Crew -->
    <div class="modal fade" id="ConfirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa-solid fa-question" style="font-size: 100px;"></i>
                    <h5 class="text-center pt-2">Anda Yakin Ingin Menambahkan Crew</h5>
                </div>
                <div class="modal-footer d-flex justify-content-evenly">
                    <button type="button" class="btn btn-success w-25" id="confirmAddCrew">Ya</button>
                    <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <script>
        document.getElementById("profile_picture").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("profilePreview").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle form submission
        document.getElementById("confirmAddCrew").addEventListener("click", function() {
            document.getElementById("crewForm").submit(); // Submit the form
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>