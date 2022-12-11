<style>
  .img-crop{
    width:200px;
    height:200px;
    object-fit:cover;
  }
</style>
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
                        <div class="col-span-12 mt-4">
                            <div class="intro-y text-center mb-10">
                                <h1 class="text-4xl font-medium truncate">Calon Steering Committee</h1>
                                <h2 class="text-xl font-medium truncate">Dewan Perwakilan Mahasiswa</h2>
                            </div>
                            <form id="form-vote" action="<?= base_url() ?>send-vote-legislatif/<?= $this->session->userdata('login_data_user')['nim'] ?>" method="post">
                              <div class="grid grid-cols-4 gap-4 mt-10">
                                  <?php 
                                      foreach ($dataLegislatif as $keyLeg) { ?>
                                          <div class="intro-y box px-5 py-5">
                                              <div class="flex justify-center">
                                                <img src="<?= base_url() ?><?= $keyLeg['image_dir'] ?>" alt="" class="img-crop">
                                              </div>
                                              <div class="flex justify-center items-center mt-10">
                                                  <input id="<?= $keyLeg['kode'] ?>" name="legislatif" type="radio" value="<?= $keyLeg['kode'] ?>" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                                                  <label for="<?= $keyLeg['kode'] ?>" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?= $keyLeg['nama'] ?></label>
                                              </div>
                                          </div>      
                                      <?php } ?>
                              </div>
                              <div class="intro-y flex justify-center items-center mt-10">
                                  <button type="submit" id="vote" class="btn btn-primary">Vote!</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
