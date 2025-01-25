<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NCI System | Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    .sidebar-btn.active {
    background-color: #0b5ed7 !important; /* Warna lebih gelap */
}
</style>

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
                                <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name}}</span>
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
                <div class="col pt-3 px-0 d-flex flex-column">
                    <!-- Header Content -->
                    <h2 class="mt-2 ms-3">Dashboard</h2>
                    <!-- End Header Content -->
                    
                    <!-- Search Bar -->
                    <div class="d-flex justify-content-end">
                        <form action="{{ route('crews.search') }}" method="GET" class="input-group mt-3 pe-3 w-25">
                            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </form>
                    </div>
                    <!-- End Search Bar -->

                    <!-- Table -->
                    <div class="container-fluid mt-5 flex-grow-1">
                        <table class="table overflow-hidden rounded-3 w-100" style="table-layout: fixed;">
                            <!-- Header Table -->
                            <thead>
                                <tr>
                                    <td class="text-light text-center" style="background-color: #0d6efd; width: 20%;">Nama</td>
                                    <td class="text-light text-center" style="background-color: #0d6efd; width: 20%;">Posisi</td>
                                    <td class="text-light text-center" style="background-color: #0d6efd; width: 30%;">Email</td>
                                    <td class="text-light text-center" style="background-color: #0d6efd; width: 30%;">Aksi</td>
                                </tr>
                            </thead>
                            <!-- End Header Table -->

                            <!-- Isi Table -->
                            <tbody>

                                <!-- Baris Table -->
                                @if (count($crews) > 0)
                                    @foreach ($crews as $crew)
                                        <tr class="text-center align-middle text-break">
                                            <td class="border-start border-secondary-subtle">{{ $crew->name }}</td>
                                            <td class="border-start border-secondary-subtle">{{ $crew->position }}</td>
                                            <td class="border-start border-secondary-subtle">{{ $crew->email }}</td>
                                            <td class="border-start border-end border-secondary-subtle">
                                                {{-- Detail & Edit button --}}
                                                <a href="{{ route('crews.show', $crew->id) }}" class="btn btn-warning w-100 text-light mb-2">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <i class="fa-regular fa-id-card"></i>
                                                        </div>
                                                        <div class="col-8">
                                                            <span>Detail & Edit</span>
                                                        </div>
                                                    </div>
                                                </a>

                                                {{-- Delete Confirmation button --}}
                                                <button type="button" class="btn btn-danger w-100 text-light delete-button"
                                                    data-id="{{ $crew->id }}" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </div>
                                                        <div class="col-8">
                                                            <span>Delete</span>
                                                        </div>
                                                    </div>
                                                </button>

                                                {{-- Form Delete --}}
                                                <form id="deleteForm{{ $crew->id }}" action="{{ route('crews.destroy', $crew->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                <!-- End Baris Table -->
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endif
                            </tbody>
                            <!-- End Isi Table -->
                        </table>
                    </div>
                    <!-- End Table -->

                    <!-- Pagination -->
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $crews->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
                    </div>
                    <!-- Footer -->
                    <div class="footer container-fluid mx-0 bg-primary text-light position-sticky overflow-y-auto bottom-0">
                        &copy;2024 by <b>NCI System Dev</b>
                    </div>
                    <!-- End Footer -->
                     
                    <!-- End Pagination -->
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>

    <script>
        // Fungsi Untuk Menandai Halaman Aktif Berdasarkan Tombol Sidebar Yang Ditekan
        function handleActiveState(event) {
          // Mengambil Seluruh Sidebar Button Yang Ada
          const buttons = document.querySelectorAll('.sidebar-btn');
          
          // Menghapus Class Active Pada Button Yang Aktif
          buttons.forEach(button => button.classList.remove('active'));
          
          // Menambah Class Active Pada Button Yang Diklik
          event.currentTarget.classList.add('active');
        }
      
        // Memasang Event Klik Pada
        const sidebarButtons = document.querySelectorAll('.sidebar-btn');
        sidebarButtons.forEach(button => button.addEventListener('click', handleActiveState));
    </script>

<script>
    let deleteCrewId = null;

    // Tangkap semua tombol delete
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            deleteCrewId = this.getAttribute('data-id'); // Ambil ID crew yang ingin dihapus
        });
    });

    // Pastikan tombol hapus modal berfungsi
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            if (deleteCrewId) {
                document.getElementById(`deleteForm${deleteCrewId}`).submit(); // Kirim form sesuai ID
            }
        });
    });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

    {{-- Modal konfirmasi delete --}}
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>