<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/images/') ?>logo-polinema.png" rel="shortcut icon">
        <title>E-Vote || Reset Password</title>
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
    <body class="py-5">                
      
    <div class="content">
      <div class="intro-y flex items-center mt-8">
          <h2 class="text-lg font-medium mr-auto">
              Manajemen Akun
          </h2>
      </div>
      <div class="grid grid-cols-12 gap-6">
          <div class="col-span-12 2xl:col-span-9">
              <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <!-- BEGIN: Change Password -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Ubah Password
                            </h2>
                        </div>
                        <form action="<?= base_url()?>reset-password/<?= $this->session->userdata('login_data_admin')['id'] ?>" method="post">
                          <div class="p-5">
                              <div>
                                  <label for="change-password-form-2" class="form-label">Password Baru</label>
                                  <input id="change-password-form-2" type="text" name="password" class="form-control" placeholder="Masukkan Password Baru" required autocomplete="off">
                              </div>
                              <div class="flex">
                                <a href="<?= base_url() ?>" class="btn btn-secondary mt-4">Kembali</a>
                                <button type="submit" class="btn btn-primary mt-4 ml-5">Ubah</button>
                              </div>
                          </div>
                        </form>
                    </div>
                    <!-- END: Change Password -->
                </div>
              </div>
          </div>
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
