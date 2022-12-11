<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/images/') ?>logo-polinema.png" rel="shortcut icon">
        <title>E-Vote || <?= $title ?></title>
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

    <!-- Alert Success -->
    <?php
      $success = $this->session->flashdata('success');
      if ($success) {
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
                icon: 'success',
                title: '&nbsp;<?php echo $success ?>'
              })
            });
        </script>
      <?php } ?>
    <!-- END: Head -->
    <body class="py-5">
        <!-- BEGIN: Top Bar -->
        <div class="border-b border-white/[0.08] mt-[2.2rem] md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
            <div class="top-bar-boxed flex items-center">
                <!-- BEGIN: Logo -->
                <a href="" class="-intro-x hidden md:flex">
                    <img alt="" class="w-12" src="<?= base_url('assets/images/') ?>logo-polinema.png">
                    <span class="text-white text-2xl ml-3 my-auto"> E-Vote </span> 
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="" src="<?= base_url('assets/images/') ?>user.png">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">Hai, Voter!</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="<?= site_url("logout") ?>" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->