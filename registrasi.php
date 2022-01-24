<?php
require 'functions.php';


if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>alert('Selamat Anda Telah Berhasil Registrasi!')</script>";
  } else {
    echo mysqli_error($koneksi);
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Register Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="assets/registrasi.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://kit.fontawesome.com/70753bf0c6.js" crossorigin="anonymous"></script>
</head>

<body>

  <form class="form-login" method="POST" action="">

    <div class="container">
      <div class="row px-3">
        <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
          <div class="img-left d-none d-md-flex"></div>

          <div class="card-body">
            <h4 class="title text-center mt-4">
              Register Form
            </h4>

            <form class="form-box px-3">
              <div class="form-input">
                <span><i class="fas fa-user"></i></span>
                <input type="username" name="username" placeholder="NIS/Username" required>
              </div>

              <form class="form-box px-3">
                <div class="form-input">
                  <span><i class="far fa-user"></i></span>
                  <input type="username" name="nama" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-input">
                  <span><i class="fa fa-key"></i></span>
                  <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-input">
                  <span><i class="fa fa-key"></i></span>
                  <input type="password" name="password2" placeholder="Confirm Password" required>
                </div>

                <div class="mb-3">
                  <button type="submit" name="register" class="button-login">
                    Register
                  </button>
                </div>

                <hr class="my-4">

                <div class="text-center mb-2">
                  Already have an account?
                  <a href="index.php" class="register-link">
                    Login here
                  </a>
              </form>

          </div>
        </div>
      </div>
    </div>

    <form>

</body>

</html>