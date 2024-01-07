<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Line Supply Request</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo BASEURL ?>/img/favicon.png" rel="icon">
  <link href="<?php echo BASEURL ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo BASEURL ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo BASEURL ?>/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo BASEURL ?>/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Line Supply Request</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form method="post" action="<?php echo BASEURL; ?>/login/loginUser" class="row g-3 needs-validation"
                    novalidate>

                    <div class="col-12">
                      <label for="Username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="Username" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="Password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="Password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> -->

                    <div class="col-12 pt-4 pb-2">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>

                  </form>

                </div>
              </div>

              <div class="credits">
                Created By <strong><span>PPIC</span></strong> @2023.
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo BASEURL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo BASEURL ?>/js/main.js"></script>

</body>

</html>