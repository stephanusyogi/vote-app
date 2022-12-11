<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/images/') ?>logo-polinema.png" rel="shortcut icon">
        <title>E-Vote || Login</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/app.css" />
        <!-- END: CSS Assets-->
        <!-- Toast -->
        <link rel="stylesheet" href="<?= base_url('/assets/plugins'); ?>/toastr/toastr.min.css">
        

        <!-- jQuery -->
        <script src="<?= base_url("assets/plugins/") ?>/jquery/jquery.min.js"></script>
    </head>
    <!-- Alert Error -->
    <?php
      $error = $this->session->flashdata('error');
      if ($error) {
      ?>
        <script type="text/javascript">
            $(function() {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 5000
              });

              Toast.fire({
                icon: 'error',
                title: '&nbsp;<?php echo $error ?>'
              })
            });
        </script>
      <?php }
    ?>
    <body class="login">
      <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="" class="w-20" src="<?= base_url('assets/images/') ?>logo-polinema.png">
                </a>
                <div class="my-auto">
                    <img alt="" class="-intro-x w-2/3 -mt-16" src="<?= base_url('assets/template/') ?>dist/images/illustration.png">
                        <div class="-intro-x text-white text-center font-medium text-2xl leading-tight mt-5 w-2/3">
                          Salurkan Aspirasi Dengan Semangat Demokrasi Untuk Mencetak Pemimpin Yang Transparansi Dan Terintegrasi
                        </div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <img alt="" class="intro-x w-50" src="<?= base_url('assets/images/') ?>logo-kpr.png">
                    <form action="<?= base_url("login-verification") ?>" method="post">
                      <div class="intro-x mt-8">
                          <input type="text" class="intro-x login__input form-control py-3 px-4 block" name="nim" placeholder="Masukkan NIM" autocomplete="off" required>
                          <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" name="password" placeholder="Masukkan Password" required>
                      </div>
                      <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                          <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Log In</button>
                      </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <!-- BEGIN: JS Assets-->
      <script src="<?= base_url('assets/template/') ?>dist/js/app.js"></script>
    <!-- END: JS Assets-->
        
    <!-- Toast -->
    <script src="<?= base_url('assets/plugins'); ?>/toastr/toastr.min.js"></script>  
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </body>
</html>