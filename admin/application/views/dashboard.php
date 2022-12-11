        <!-- BEGIN: Content -->
        <div class="content">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 2xl:col-span-9">
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-10">
                            <div class="intro-y flex justify-center items-center h-10">
                                <img alt="" class="intro-x w-2/5 mr-5" src="<?= base_url('assets/images/') ?>logo-kpr.png">
                            </div>
                        </div>
                        <!-- END: General Report -->
                        <div class="col-span-12 mt-5">
                            <div class="grid grid-cols-4 gap-4">
                                <!-- Diagram Presiden -->
                                <div class="intro-y box px-5 py-5">
                                    <div class="flex justify-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            PRESIDEN & WAKIL
                                        </h2>
                                    </div>
                                    <div class="mt-3">
                                        <?php 
                                        $colorEkskutif = array("#30245B", "#EFE413");
                                        $colorCount = 0;
                                         ?>
                                        <div class="h-[213px]">
                                            <canvas id="EkskutifChart"></canvas>
                                        </div>
                                        <script>
                                            var chartEkskutif = document.getElementById('EkskutifChart').getContext('2d');
                                            var chartEksData = {
                                                labels: [
                                                    "<?= $diagramEkskutif[0]['nama_paslon'] ?>",
                                                    "<?= $diagramEkskutif[1]['nama_paslon'] ?>",
                                                ],
                                                datasets: [
                                                    {
                                                        data: [
                                                            <?php 
                                                            foreach ($diagramEkskutif as $key) {
                                                                echo $key["hasil"].",";
                                                            } ?>
                                                        ],
                                                        backgroundColor: [ 
                                                            "<?= $colorEkskutif[0] ?>",
                                                            "<?= $colorEkskutif[1] ?>",
                                                        ]
                                                    }]
                                            };
                                            var chartEks = new Chart(chartEkskutif, {
                                                type: 'pie',
                                                data: chartEksData,
                                                options: {
                                                    legend: {
                                                        display: false
                                                    },
                                                    responsive: true,
                                                    maintainAspectRatio: false,
                                                }
                                            });
                                        </script>
                                    </div>
                                    <div class="w-52 sm:w-auto mx-auto mt-8">
                                        <?php 
                                        $colorCount = 0;
                                        foreach ($diagramEkskutif as $key) { ?>
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 rounded-full mr-3" style="background-color:<?= $colorEkskutif[$colorCount] ?>;"></div>
                                                <span class="truncate w-3/5"><?= $key['nama_paslon'] ?></span> <span class="font-medium ml-auto"><?= $key['hasil_persentase'] ?></span> 
                                            </div>
                                        <?php $colorCount++; } ?>
                                    </div>
                                </div>
                                <!-- Diagram DPM -->
                                <?php 
                                foreach ($diagramLegislatif as $key => $dapil) { 
                                    $totalPaslon = count($dapil);
                                    if ($totalPaslon == 2) {
                                        $colorLegislatif = array("#30245B", "#EFE413");
                                    }else if($totalPaslon == 3){
                                        $colorLegislatif = array("#30245B", "#EFE413", "#E37B14");
                                    }else{
                                        $colorLegislatif = array("#30245B", "#EFE413", "#E37B14","#C9C4D8");
                                    }
                                    $colorCount = 0;
                                    ?>
                                    <div class="intro-y box px-5 py-5">
                                        <div class="flex justify-center h-10">
                                            <h2 class="text-lg font-medium truncate mr-5">
                                                DPM <?= $key ?>
                                            </h2>
                                        </div>
                                        <div class="mt-3">
                                            <div class="h-[213px]">
                                                <canvas id="LegislatifChart-<?= str_replace(' ', '', $key) ?>"></canvas>
                                                <script>
                                                    var chartLegislatif<?= str_replace(' ', '', $key) ?> = document.getElementById('LegislatifChart-<?= str_replace(' ', '', $key) ?>').getContext('2d');
                                                    var chartLegData<?= str_replace(' ', '', $key) ?> = {
                                                        <?php 
                                                            if ($totalPaslon == 2) { ?>
                                                                labels: [
                                                                    "<?= $dapil[0]['nama_paslon'] ?>",
                                                                    "<?= $dapil[1]['nama_paslon'] ?>",
                                                                ],
                                                            <?php }else if($totalPaslon == 3){ ?>
                                                                labels: [
                                                                    "<?= $dapil[0]['nama_paslon'] ?>",
                                                                    "<?= $dapil[1]['nama_paslon'] ?>",
                                                                    "<?= $dapil[2]['nama_paslon'] ?>",
                                                                ],
                                                            <?php }else{ ?>
                                                                labels: [
                                                                    "<?= $dapil[0]['nama_paslon'] ?>",
                                                                    "<?= $dapil[1]['nama_paslon'] ?>",
                                                                    "<?= $dapil[2]['nama_paslon'] ?>",
                                                                    "<?= $dapil[3]['nama_paslon'] ?>",
                                                                ],
                                                            <?php } ?>
                                                        datasets: [
                                                            {
                                                                data: [
                                                                    <?php 
                                                                    foreach ($dapil as $paslon) {
                                                                        echo $paslon["hasil"].",";
                                                                    } ?>
                                                                ],
                                                                <?php 
                                                                    if ($totalPaslon == 2) { ?>
                                                                        backgroundColor: [ 
                                                                            "<?= $colorLegislatif[0] ?>",
                                                                            "<?= $colorLegislatif[1] ?>",
                                                                        ],
                                                                    <?php }else if($totalPaslon == 3){ ?>
                                                                        backgroundColor: [ 
                                                                            "<?= $colorLegislatif[0] ?>",
                                                                            "<?= $colorLegislatif[1] ?>",
                                                                            "<?= $colorLegislatif[2] ?>",
                                                                        ],
                                                                    <?php }else{ ?>
                                                                        backgroundColor: [ 
                                                                            "<?= $colorLegislatif[0] ?>",
                                                                            "<?= $colorLegislatif[1] ?>",
                                                                            "<?= $colorLegislatif[2] ?>",
                                                                        ],
                                                                    <?php } ?>
                                                            }]
                                                    };
                                                    var chartLeg<?= str_replace(' ', '', $key) ?> = new Chart(chartLegislatif<?= str_replace(' ', '', $key) ?>, {
                                                        type: 'pie',
                                                        data: chartLegData<?= str_replace(' ', '', $key) ?>,
                                                        options: {
                                                            legend: {
                                                                display: false
                                                            },
                                                            responsive: true,
                                                            maintainAspectRatio: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="w-52 sm:w-auto mx-auto mt-8">
                                            <?php 
                                            foreach ($dapil as $paslon) { ?>
                                                <div class="flex items-center">
                                                    <div class="w-2 h-2 rounded-full mr-3" style="background-color:<?= $colorLegislatif[$colorCount] ?>;"></div>
                                                    <span class="truncate w-3/5"><?= $paslon['nama_paslon'] ?></span> <span class="font-medium ml-auto"><?= $paslon['hasil_persentase'] ?></span> 
                                                </div>
                                            <?php $colorCount++; } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="intro-y box px-5 py-5">
                                    <div class="flex justify-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            <?= $diagramGolput['title'] ?>
                                        </h2>
                                    </div>
                                        <div class="mt-3">
                                            <div class="h-[213px]">
                                                <canvas id="GolputChart"></canvas>
                                                <script>
                                                    var chartGolput = document.getElementById('GolputChart').getContext('2d');
                                                    var chartGolputData = {
                                                        labels: [
                                                            "Golput",
                                                        ],
                                                        datasets: [
                                                            {
                                                                data: [
                                                                    <?= $diagramGolput["hasil"].","; ?>
                                                                ],
                                                                backgroundColor: [ 
                                                                    "darkgrey",
                                                                ],
                                                            }]
                                                    };
                                                    var chartGol = new Chart(chartGolput, {
                                                        type: 'pie',
                                                        data: chartGolputData,
                                                        options: {
                                                            legend: {
                                                                display: false
                                                            },
                                                            responsive: true,
                                                            maintainAspectRatio: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="w-52 sm:w-auto mx-auto mt-8">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 rounded-full mr-3" style="background-color:darkgrey;"></div>
                                                <span class="truncate w-3/5">Golput</span> <span class="font-medium ml-auto"><?= $diagramGolput['hasil_persentase'] ?></span> 
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->