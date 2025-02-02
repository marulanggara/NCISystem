<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NCI System | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Mengubah Warna Background Input Menjadi Abu-abu Ketika Kolom Input Kosong 
    Dan Mengubahnya Menjadi Putih Ketika Kolom Input Terisi */ 
    .form-control {
      background-color: rgb(211, 211, 211);
      color: white;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .form-control:focus,
    .form-control:not(:placeholder-shown) {
      background-color: white;
      color: black;
    }

    ::placeholder {
      text-align: center;
    }
    /* End */
  </style>
</head>

<body>
  <!-- Isi Halaman -->
  <div class="container-fluid bg-light d-flex justify-content-center align-items-center"
    style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/boat.jpg') }}'); background-repeat: no-repeat; background-size: cover; height: 100vh;"> <!-- Pengaturan Background Page Login -->

    <!-- Card Untuk Menempatkan Form Login -->
    <div class="card border-0 w-25">
      <div class="card-body container-fluid p-0">
        <!-- Nama System -->
        <div class="card border-0 bg-primary py-5">
          <h3 class="text-center text-light">NCI System</h3>
        </div>
        <!-- End -->

        <!-- Form Login -->
        <form action="{{route('login.process') }}" method="POST">
          @csrf
          <div class="d-flex flex-column justify-content-center align-items-center" style="padding-top: 15%; padding-bottom: 2%;">
            <div class="mb-3">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            </div>
          </div>
          <div class="d-flex justify-content-center" style="padding-bottom: 7.5%;">
            <button type="submit" id="login-button" class="btn btn-primary rounded-5" style="width: 40%;">Login</button>
          </div>
        </form>
        <!-- End -->
      </div>
    </div>
  </div>
  <!-- End -->

  <script>
    //Mekanisme Submit Form Menggunakan Key "Enter" Selain Melalui Klik Tombol Login 
    document.getElementById('login-form').addEventListener('keydown', function (event) {
      if (event.key === 'Enter') {
        event.preventDefault();
        document.getElementById('login-button').click();
      }
    });
    //End
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>