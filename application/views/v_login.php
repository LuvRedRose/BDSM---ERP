<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Cafe President</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-4">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Harap Login!</h1>
                  </div>

                    <?php
                    if(isset($_GET['alert'])){
                    if($_GET['alert']=="gagal"){
                        echo "<div class='alert alert-danger font-weight-bold text-center'>Maaf NIP & Password Salah.</div>"; 
                    }else if($_GET['alert']=='belum_login'){    
                        echo "<div class='alert alert-danger font-weight-bold text-center'>Anda Harus Login Terlebih Dahulu.</div>";
                    }else if($_GET['alert']=='logout'){
                        echo "<div class='alert alert-danger font-weight-bold text-center'>Anda Telah Logout!</div>";
                    }
                }
                    ?>

                  <form action="<?php echo base_url().'login/aksi' ?>" method="post" class="user"> 
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="nip" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter NIP...">
                    </div>
                    <?php echo form_error('nip'); ?>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <?php echo form_error('password'); ?>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
