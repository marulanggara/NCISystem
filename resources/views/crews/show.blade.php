<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NCI System | Detail</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- End Button Profile -->
                    </div>
                </div>
                <!-- End Sidebar -->
                
                <!-- Content -->
                <div class="col pt-3 px-0 d-flex flex-column">
                    <!-- Header Content-->
                    <h2 class="mt-2 ps-3">Detail Crew</h2>
                    <!-- End Header Content -->

                    <!-- Container Card -->
                    <div class="container-fluid mt-5 mb-2 flex-grow-1" style="width: 90%;">

                        <!-- Card -->
                        <div class="card container-fluid bg-secondary-subtle px-0" style="height: 75vh;">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between px-1" style="margin-bottom: 10%;">

                                    <!-- Tombol Kembali -->
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary" style="width: 25%;">
                                        <i class="fa-solid fa-arrow-left"></i> Kembali
                                    </a>
                                    <!-- End Tombol Kembali -->

                                    <!-- Avatar -->
                                    <div class="position-relative container-fluid">
                                        <img class="rounded-circle position-absolute mx-auto d-block" style="z-index: 10; top: -15vh; left: 28%; height: 240px; width: 240px;" alt="avatar1" src="{{ $crew->profile_picture ? asset('storage/' . $crew->profile_picture) : 'data:image/png;base64,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' }}" />
                                    </div>
                                    <!-- End Avatar-->

                                    <!-- Button Edit -->
                                    <div class="d-flex justify-content-end align-items-center w-25">
                                        <div id="EditSubmit"  class="me-2" style="display: none;">
                                            <button type="button" class="btn btn-success">Submit</button>
                                        </div>
                                        <div class="d-flex align-items-center form-check form-switch form-check-reverse" style="height: 38px;">
                                            <div>
                                                <input class="form-check-input" type="checkbox" role="switch" id="EditEnable">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Edit</label>
                                            </div>
                                        </div>
                                     </div>
                                    <!-- End Button Edit-->

                                </div>
                                
                                <!-- Form -->
                                <form id="EditForm" action="{{ route('crews.update', $crew->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="d-flex">

                                    <!-- Form Kiri -->
                                    <div class="w-50 ps-1 pe-3 overflow-y-auto" style="max-height: 48vh;">
                                        <div class="form-floating mb-3 container-fluid px-0">
                                            <input type="text" class="form-control" id="floatingInput1" placeholder="" value="{{ $crew->maps_id }}" readonly>
                                            <label for="floatingInput1">Maps ID</label>
                                        </div>
                                        <div class="form-floating mb-3 container-fluid px-0">
                                            <input type="text" class="form-control" id="floatingInput1" placeholder="" value="{{ $crew->name }}" readonly>
                                            <label for="floatingInput1">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3 container-fluid px-0">
                                            <input type="text" class="form-control" id="floatingInput1" placeholder="" value="{{ $crew->born_date }}" readonly>
                                            <label for="floatingInput1">Tanggal Lahir</label>
                                        </div>
                                        <div class="form-floating mb-3 container-fluid px-0">
                                            <input type="text" class="form-control" id="floatingInput1" placeholder="" value="{{ $crew->office }}" readonly>
                                            <label for="floatingInput1">Kantor</label>
                                        </div>
                                        <div class="form-floating mb-3 container-fluid px-0">
                                            <input type="text" class="form-control" id="floatingInput1" placeholder="" value="{{ $crew->position }}" readonly>
                                            <label for="floatingInput1">Posisi</label>
                                        </div>
                                        <div class="form-floating mb-3 container-fluid px-0">
                                            <input type="email" class="form-control" id="floatingInput1" placeholder="" value="{{ $crew->email }}" readonly>
                                            <label for="floatingInput1">Email</label>
                                        </div>
                                        <div class="form-floating mb-3 container-fluid px-0">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ $crew->phone }}">
                                            <label for="floatingInput1">Nomor HP</label>
                                        </div>
                                    </div>
                                    <!-- End Form Kiri -->

                                    <div class="vr"></div>

                                    <!-- Form Kanan -->
                                    <div class="w-50 ps-3 pe-1 overflow-y-auto" style="height: 48vh;">
                                        <div class="form-floating mb-3 container-fluid px-0">
                                            <textarea class="form-control" placeholder="" id="address" name="address"> {{ $crew->address }} </textarea>
                                            <label for="floatingTextarea">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3 container-fluid px-0">
                                            <input type="text" class="form-control" id="next_of_kind" name="next_of_kind" placeholder="" value="{{ $crew->next_of_kind }}">
                                            <label for="floatingInput1">Kontak Keluarga</label>
                                        </div>  

                                        <div class="form-floating mb-3 container-fluid px-0">
                                            @foreach($crew->experiences as $experience)
                                                    <input type="text" class="form-control mb-2" name="experience_name[]" value="{{ $experience->experience_name }}">
                                                    <input type="hidden" name="experience_id[]" value="{{ $experience->id }}">
                                                    <label for="experience_name">Pengalaman</label>
                                            @endforeach

                                            <!-- Input untuk pengalaman baru -->
                                            @if($crew->experiences->count() < 3)
                                                <input type="text" class="form-control" id="experience_name" name="experience_name[]" placeholder="Pengalaman Baru" style="display: block;">
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end mb-2">
                                            <div>
                                                <label for="seamanbook_file_path" class="mb-1">Seaman Book</label>
                                                @if($crew->seamanbook_file_path)
                                                    <input class="form-control" type="text" id="seamanbook_file_path" value="{{ basename($crew->seamanbook_file_path) }}" readonly>
                                                @else
                                                    <input class="form-control" type="text" id="seamanbook_file_path" value="No Uploaded File" readonly>
                                                @endif
                                            </div>
                                            
                                            @if($crew->seamanbook_file_path)
                                                <div>
                                                    <a href="{{ asset('storage/'.$crew->seamanbook_file_path) }}" target="_blank" class="btn btn-primary d-flex align-items-center">
                                                        <i class="fa-solid fa-eye me-2"></i> Lihat
                                                    </a>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="d-flex justify-content-between align-items-end mb-2">
                                            <div>
                                                <label for="passport_file_path" class="mb-1">Passport</label>
                                                @if($crew->passport_file_path)
                                                    <input class="form-control" type="text" id="passport_file_path" value="{{ basename($crew->passport_file_path) }}" readonly>
                                                @else
                                                    <input class="form-control" type="text" id="passport_file_path" value="No Uploaded File" readonly>
                                                @endif
                                            </div>
                                            @if($crew->passport_file_path)
                                                <div>
                                                    <a href="{{ asset('storage/'.$crew->passport_file_path) }}" target="_blank" class="btn btn-primary d-flex align-items-center">
                                                        <i class="fa-solid fa-eye me-2"></i> Lihat
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end mb-2">
                                            <div>
                                                <label for="medical_file_path" class="mb-1">Medical</label>
                                                @if($crew->medical_file_path)
                                                    <input class="form-control" type="text" id="medical_file_path" value="{{ basename($crew->medical_file_path) }}" readonly>
                                                @else
                                                    <input class="form-control" type="text" id="medical_file_path" value="No Uploaded File" readonly>
                                                @endif
                                            </div>
                                            @if($crew->medical_file_path)
                                                <div>
                                                    <a href="{{ asset('storage/'.$crew->medical_file_path) }}" target="_blank" class="btn btn-primary d-flex align-items-center">
                                                        <i class="fa-solid fa-eye me-2"></i> Lihat
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end mb-2">
                                            <div>
                                                <label for="certificate_file_path" class="mb-1">Certificate</label>
                                                @if($crew->certificate_file_path)
                                                    <input class="form-control" type="text" id="certificate_file_path" value="{{ basename($crew->certificate_file_path) }}" readonly>
                                                @else
                                                    <input class="form-control" type="text" id="certificate_file_path" value="No Uploaded File" readonly>
                                                @endif
                                            </div>
                                            @if($crew->certificate_file_path)
                                                <div>
                                                    <a href="{{ asset('storage/'.$crew->certificate_file_path) }}" target="_blank" class="btn btn-primary d-flex align-items-center">
                                                        <i class="fa-solid fa-eye me-2"></i> Lihat
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Form Kanan -->
                                </div>
                                <!-- End Form -->
                                
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="footer container-fluid mx-0 bg-primary text-light position-sticky overflow-y-auto bottom-0">
                        &copy;2024 by <b>NCI System Dev</b>
                    </div>
                    <!-- End Footer -->
                </div>
                <!-- End Content-->
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleInputsCheckbox = document.getElementById('EditEnable');
        const formControls = document.querySelectorAll('.form-control');
        const submitButton = document.getElementById('EditSubmit');
        const inputExperience = document.getElementById('experience_name');
        const form = document.getElementById('EditForm');
    
        function toggleInputs() {
            const enable = toggleInputsCheckbox.checked;

            // Enable or disable form controls
            formControls.forEach(input => {
                input.disabled = !enable;
            });

            // Show or hide the submit button and experience input
            if (submitButton) {
                submitButton.style.display = enable ? 'block' : 'none';
            }

            if (inputExperience) {
                inputExperience.style.display = enable ? 'block' : 'none';
            }

            // Enable the submit button if form is editable
            if (enable) {
                submitButton.disabled = false;
            }
        }

        toggleInputsCheckbox.addEventListener('change', toggleInputs);

        // Initialize the form state
        toggleInputs();

        // Listen for form input changes and enable submit button if there's a change
        form.addEventListener('input', function() {
            submitButton.disabled = false; // Enable submit button when any input changes
        });

        // Handle submit button click event
        submitButton.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default form submission
            form.submit(); // Manually submit the form
        });

        // Make sure to submit the form directly if the button is clicked
        form.addEventListener('submit', function(e) {
            // Disable the submit button to prevent multiple submissions
            submitButton.disabled = true;
        });
    });
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>