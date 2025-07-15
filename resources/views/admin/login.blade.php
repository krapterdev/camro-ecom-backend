<!DOCTYPE html>
<html lang="en">

<head>
  <?php $subTitle = "login"; ?>

  <!-- Title Meta -->
  <meta charset="utf-8" />
  <title><?php echo $subTitle ?> | Larkon - Responsive Admin Dashboard Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully responsive premium admin dashboard template" />
  <meta name="author" content="Techzaa" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.ico')}}">
  <link href="{{ asset('admin_assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Icons css (Require in all Page) -->
  <link href="{{ asset('admin_assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- App css (Require in all Page) -->
  <link href="{{ asset('admin_assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Theme Config js (Require in all Page) -->
  <script src="{{ asset('admin_assets/js/config.js')}}"></script>

</head>

<body>

  <div class="h-100">
    <div class="d-flex flex-column h-100">
      <div class="d-flex flex-column flex-grow-1">
        <div class="row h-100">
          <div class="col-xxl-7">
            <div class="row justify-content-center h-100">
              <div class="col-lg-6 py-lg-5">
                <div class="d-flex flex-column h-100 justify-content-center">
                  <div class="auth-logo mb-4">
                    <a href="index.php" class="logo-dark">
                      <img src="{{ asset('admin_assets/images/logo-dark.png')}}" height="24" alt="logo dark">
                    </a>

                    <a href="index.php" class="logo-light">
                      <img src="{{ asset('admin_assets/images/logo-light.png')}}" height="24" alt="logo light">
                    </a>
                  </div>

                  <h2 class="fw-bold fs-24">Sign In</h2>

                  <p class="text-muted mb-3">Enter your email address and password to access admin
                    panel.</p>
                  <p class="text-success mb-3"> {{ session('error') }}</p>

                  <div class="mb-1">
                    <form action="{{ route('admin.auth')}}" method="POST">
                      @csrf
                      <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" required class="form-control bg-"
                          placeholder="Enter your email">
                        <span class="text-danger"><?php echo "error"; ?></span>
                      </div>
                      <div class="mb-2">
                        <!-- <a href="auth-password.php" class="float-end text-muted text-unline-dashed ms-1">Reset password</a> -->
                        <label class="form-label" for="password">Password</label>
                        <input type="password" type="password" id="password" name="password" required
                          class="form-control" placeholder="Enter your password">
                      </div>

                      <div class=" text-center d-grid">
                        <button class="btn btn-soft-primary" type="submit">Sign In</button>
                      </div>
                    </form>


                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-5 d-none d-xxl-flex">
            <div class="card h-100 mb-0 overflow-hidden">
              <div class="d-flex flex-column h-100">
                <img src="{{ asset('admin_assets/images/small/img-10.jpg')}}" alt="" class="w-100 h-100">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Start Container Fluid -->




  <!-- End Container Fluid -->




  <!-- footer start -->
  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-center">
          <script>document.write(new Date().getFullYear())</script> &copy; Larkon. Crafted by
          <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon>
          <a href="" class="fw-bold footer-text" target="_blank">Techzaa</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer end  -->


  <!-- ==================================================== -->
  <!-- End Page Content -->
  <!-- ==================================================== -->


  <!-- END Wrapper -->

  <!-- Vendor Javascript (Require in all Page) -->
  <script src="{{ asset('admin_assets/js/vendor.js')}}"></script>

  <!-- App Javascript (Require in all Page) -->
  <script src="{{ asset('admin_assets/js/app.js')}}"></script>


  <!-- Vector Map Js -->
  <script src="{{ asset('admin_assets/vendor/jsvectormap/jsvectormap.min.js')}}"></script>
  <script src="{{ asset('admin_assets/vendor/jsvectormap/maps/world-merc.js')}}"></script>
  <script src="{{ asset('admin_assets/vendor/jsvectormap/maps/world.js')}}"></script>

  <!-- Dashboard Js -->
  <script src="{{ asset('admin_assets/js/pages/dashboard.js')}}"></script>

</body>

</html>