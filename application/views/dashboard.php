        <!-- BEGIN: Content -->
        <div class="content">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 2xl:col-span-9">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex justify-center items-center h-10">
                                <img alt="" class="intro-x w-72 mr-5" src="<?= base_url('assets/images/') ?>logo-kpr.png">
                            </div>
                        </div>
                        <div class="col-span-12 mt-8">
                            <div class="intro-y block sm:flex items-center">
                                <table class="mr-5">
                                    <tbody>
                                        <tr>
                                            <td><h2 class="text-lg font-medium truncate mr-5">Nama</h2></td>
                                            <td><h2 class="text-lg font-medium truncate mr-5">: <?= $this->session->userdata('login_data_user')['nama']?></h2></td>
                                        </tr>
                                        <tr>
                                            <td><h2 class="text-lg font-medium truncate mr-5">NIM</h2></td>
                                            <td><h2 class="text-lg font-medium truncate mr-5">: <?= $this->session->userdata('login_data_user')['nim']?></h2></td>
                                        </tr>
                                        <tr>
                                            <td><h2 class="text-lg font-medium truncate mr-5">Dapil</h2></td>
                                            <td><h2 class="text-lg font-medium truncate mr-5">: <?= $this->session->userdata('login_data_user')['dapil']?></h2></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="intro-y mt-5">
                            <div class="intro-y flex justify-center items-center mt-10">
                                <?php if ($statusVote) { ?>
                                    <h1 class="text-4xl font-medium truncate mt-10">Terimakasih Telah Menggunakan Hak Suara Anda.</h1>
                                <?php } else { ?>
                                    <a href="<?= site_url("vote-legislatif") ?>" class="btn btn-primary">Vote Now</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->