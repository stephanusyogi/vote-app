
<div class="content">
    <div class="col-span-12 mt-8">
        <div class="intro-y flex justify-center items-center h-10">
            <img alt="" class="intro-x w-40 mr-5" src="<?= base_url('assets/images/') ?>logo-kpr.png">
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
              <form action="<?= base_url("tambah-data-tunggal") ?>" method="post">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Data Tunggal
                    </h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                      <button type="submit" class="btn btn-primary mt-5">Tambahkan</button>
                    </div>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="regular-form-1" class="form-label">NIM :</label>
                            <input id="regular-form-1" name="nim" type="text" class="form-control" placeholder="Masukkan NIM" autocomplete="off" required>
                        </div>
                        <div>
                            <label for="regular-form-1" class="form-label mt-2">Nama :</label>
                            <input id="regular-form-1" name="nama" type="text" class="form-control" placeholder="Masukkan Nama Mahasiswa" autocomplete="off" required>
                        </div>
                        <div>
                            <label for="regular-form-1" class="form-label mt-2">Dapil :</label>
                            <select class="form-select sm:mr-2" name="dapil" aria-label="Default select example" required>
                                <option selected disabled>Pilih Dapil Mahasiswa</option>
                                <option value="Administrasi Niaga">Administrasi Niaga</option>
                                <option value="Akuntansi">Akuntansi</option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                                <option value="Teknik Kimia">Teknik Kimia</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                            </select>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <!-- END: Input -->
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Input Sizing -->
            <div class="intro-y box">
              <div class="intro-y box">
                <form class="" action="<?= base_url("tambah-data-csv") ?>" enctype="multipart/form-data" method="post">
                  <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                      <h2 class="font-medium text-base mr-auto">
                          Data File Upload
                      </h2>
                      <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <button type="submit" class="btn btn-primary mt-5">Tambahkan CSV</button>
                      </div>
                  </div>
                  <div id="single-file-upload" class="p-5">
                      <div class="preview">
                        <input name="fileExcel" type="file" required/>
                      </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- END: Input Sizing -->
        </div>
    </div>
</div>