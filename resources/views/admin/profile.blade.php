<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NCI System | Profile</title>
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

                <!-- Content-->
                <div class="col pt-3 px-0 d-flex flex-column">
                    
                    <!-- Header Content -->
                    <h2 class="mt-2 ps-3">Profile</h2>
                    <!-- End Header Content -->

                    <!-- Container Card-->
                    <div class="container-fluid mt-5 mb-2 flex-grow-1" style="width: 90%;">
                        
                        <!-- Card -->
                        <div class="card container-fluid bg-secondary-subtle px-0 d-flex align-items-center justify-content-center" style="height: 75vh;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                
                                <!-- Avatar -->
                                <div class="position-relative text-center mb-4">
                                    <img class="rounded-circle" 
                                        style="width: 240px; height: 240px;" 
                                        alt="avatar" 
                                        src=" https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" />
                                </div>
                                <!-- End Avatar -->
                                
                                <!-- Form -->
                                <div class="w-100">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput1" placeholder="" value="{{ Auth::user()->name }}" disabled>
                                        <label for="floatingInput1">Nama</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput2" placeholder="" value="{{ Auth::user()->email }}" disabled>
                                        <label for="floatingInput2">Email</label>
                                    </div>
                                </div>
                                <!-- End Form -->

                            </div>
                        </div>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>