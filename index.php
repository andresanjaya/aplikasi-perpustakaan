
<!DOCTYPE html>
<html>

<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="assets/index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>

  <form class="form-login" method="POST" action="cek_login.php">

    <div class="container">
      <div class="row px-3">
        <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
          <div class="img-left d-none d-md-flex"></div>

          <div class="card-body">
            <h4 class="title text-center mt-4">
              Login Form
            </h4>

            <form class="form-box px-3">
              <div class="form-input">
                <span><i class="fa fa-envelope-o"></i></span>
                <input type="username" name="username" placeholder="Username" required>
              </div>

              <div class="form-input">
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="password" placeholder="Password" required>
              </div>

              <div class="form-label-group">
                <select class="form-control" name="level">
                  <option value="Siswa">Siswa</option>
                  <option value="Petugas">Petugas</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>

              <br>

              <div class="mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cb1" name="remember">
                  <label class="custom-control-label" for="cb1">Remember me</label>
                </div>
              </div>



              <div class="mb-3">
                <button type="submit" class="button-login">
                  Login
                </button>
              </div>

              <hr class="my-4">

              <div class="text-center mb-2">
                Don't have an account?
                <a href="registrasi.php" class="register-link">
                  Register here
                </a>
            </form>

          </div>
        </div>
      </div>
    </div>

    <form>

</body>

</html>