<?php
if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
    $count_pulang_perbulan = 0;
    $count_pulang_perbulan1 = 0;
    $count_pulang_perbulan2 = 0;
    $count_pulang_perbulan3 = 0;
    foreach ($get_absen_pulang_perbulan_chart as $data) {
        $count_pulang_perbulan += $data->jumlah_hadir;
        if ($data->role == "Dosen") {
            $count_pulang_perbulan1 += $data->jumlah_hadir;
        }
        if ($data->role == "PNS") {
            $count_pulang_perbulan2 += $data->jumlah_hadir;
        }
        if ($data->role == "PNS dan DOSEN") {
            $count_pulang_perbulan3 += $data->jumlah_hadir;
        }
    }
} else {
    $count_pulang_perbulan = 0;
    $count_pulang_perbulan1 = 0;
    $count_pulang_perbulan2 = 0;
    $count_pulang_perbulan3 = 0;
}

if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
    $count_masuk_perbulan = 0;
    $count_masuk_perbulan1 = 0;
    $count_masuk_perbulan2 = 0;
    $count_masuk_perbulan3 = 0;
    foreach ($get_absen_masuk_perbulan_chart as $data) {
        $count_masuk_perbulan += $data->jumlah_hadir;
        if ($data->role == "Dosen") {
            $count_masuk_perbulan1 += $data->jumlah_hadir;
        }
        if ($data->role == "PNS") {
            $count_masuk_perbulan2 += $data->jumlah_hadir;
        }
        if ($data->role == "PNS dan DOSEN") {
            $count_masuk_perbulan3 += $data->jumlah_hadir;
        }
    }
} else {
    $count_masuk_perbulan = 0;
    $count_masuk_perbulan1 = 0;
    $count_masuk_perbulan2 = 0;
    $count_masuk_perbulan3 = 0;
}

if ($get_count_fakultas != false && !empty($get_count_fakultas)) {
    $count_total_pembelajaran = 0;
    $count_pembelajaran_berlangsung = 0;
    $count_pembelajaran_selesai = 0;
    foreach ($get_count_fakultas as $data) {
        $count_total_pembelajaran += $data->total_pembelajaran;
        $count_pembelajaran_berlangsung += $data->proses_pembelajaran;
        $count_pembelajaran_selesai += $data->selesai_pembelajaran;
    }
} else {
    $count_total_pembelajaran = 0;
    $count_pembelajaran_berlangsung = 0;
    $count_pembelajaran_selesai = 0;
}
// var_dump($get_absen_all[0]->total);exit;
?>

<!-- Dashboard -->
<section id="home" class="w3l-banner py-5">
    <!-- <div class="banner-image">
    </div> -->

    <div id="particles-js"></div>
    <script src="<?php echo base_url('assets/frontend/js/particles.min.js'); ?>"></script>

    <div class="banner-content">
        <div class="container pt-5 mt-5 pb-md-4">
            <div class="card shadow text-center mb-3 mt-3 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                    <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#cardx1"><i class="fa fa-expand"></i> Monitoring Pembelajaran (<?= date('d-M-Y'); ?>)</a>
                </div>
                <div id="cardx1" class="card-body ">
                    <!-- <h4><b>Total Pembelajaran: <?= $count_total_pembelajaran; ?></b></h4> -->
                    <div class="progress" style="height:30px">
                        <div class="progress-bar bg-warning" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_pembelajaran_berlangsung; ?>" aria-valuemin="0" aria-valuemax="<?= $count_total_pembelajaran; ?>"><?= $count_pembelajaran_berlangsung; ?> (Sedang Berlangsung)</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_pembelajaran_selesai; ?>" aria-valuemin="0" aria-valuemax="<?= $count_total_pembelajaran; ?>"><?= $count_pembelajaran_selesai; ?> (Selesai)</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_total_pembelajaran; ?>" aria-valuemin="0" aria-valuemax="<?= $count_total_pembelajaran; ?>"><?= $count_total_pembelajaran; ?> (Total Pembelajaran)</div>
                    </div>
                </div>

                <?php if ($get_count_fakultas != false && !empty($get_count_fakultas)) {
                    foreach ($get_count_fakultas as $data) { ?>
                        <div id="cardx1" class="card-body ">
                            <h4><b><a href="<?php echo base_url('dashboard/fakultas_detail/'.$data->id_fakultas); ?>" target="_blank">Fakultas <?= $data->id_fakultas; ?></a></b></h4>
                            <div class="progress" style="height:30px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $data->proses_pembelajaran; ?>" aria-valuemin="0" aria-valuemax="<?= $data->total_pembelajaran; ?>"><?= $data->proses_pembelajaran; ?> (Sedang Berlangsung)</div>
                                <div class="progress-bar bg-success" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $data->selesai_pembelajaran; ?>" aria-valuemin="0" aria-valuemax="<?= $data->total_pembelajaran; ?>"><?= $data->selesai_pembelajaran; ?> (Selesai)</div>
                                <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $data->total_pembelajaran; ?>" aria-valuemin="0" aria-valuemax="<?= $data->total_pembelajaran; ?>"><?= $data->total_pembelajaran; ?> (Total Pembelajaran)</div>
                            </div>
                        </div>

                <?php
                    }
                } ?>
            </div>

            <!-- <div class="row">
                <?php if ($get_count_fakultas != false && !empty($get_count_fakultas)) {
                    if (count($get_count_fakultas) == 3) {
                        $col_md = 4;
                    } elseif (count($get_count_fakultas) == 2) {
                        $col_md = 6;
                    } elseif (count($get_count_fakultas) == 1) {
                        $col_md = 12;
                    } else {
                        $col_md = 3;
                    }
                    $ix = 1;
                    foreach ($get_count_fakultas as $data) {
                        // var_dump($get_count_fakultas1);exit;
                        if ($ix == 1) {
                            $card_counter = 'primary';
                        } elseif ($ix == 2) {
                            $card_counter = 'danger';
                        } elseif ($ix == 3) {
                            $card_counter = 'success';
                        } else {
                            $card_counter = 'info';
                        } ?>
                        <div class="col-md-<?= $col_md; ?>">
                            <a href="">
                                <div class="card-counter <?= $card_counter; ?>">
                                    <i class="fa fa-code-fork"></i>
                                    <span class="count-numbers"><?= $data->total_pembelajaran; ?>/<?= $data->proses_pembelajaran; ?>/<?= $data->selesai_pembelajaran; ?></span>
                                    <span class="count-name"><?= $data->id_fakultas; ?></span>
                                </div>
                            </a>
                        </div>
                <?php $ix++;
                    }
                }
                ?>
            </div> -->
        </div>

        <div class="container pt-5 pb-md-4">
            <div class="card shadow text-center mb-3 mt-3 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                    <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card1"><i class="fa fa-expand"></i> Rekapitulasi Data Presensi Perbulan Tahun <?= date('Y'); ?> (Masuk dan Pulang)</a>
                </div>
                <div id="card1" class="card-body ">

                    <div class="progress" style="height:30px">
                        <div class="progress-bar bg-success" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_pulang_perbulan; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $count_pulang_perbulan; ?> (Masuk dan Pulang)</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $get_absen_all[0]->total; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $get_absen_all[0]->total; ?> (Total Pegawai)</div>
                    </div>
                    <!-- <h4><b>Total Data: <?= $count_pulang_perbulan; ?></b></h4> -->
                </div>
            </div>
            <!-- </div> -->
            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-4 my-1">
                    <div class="card shadow border-0 animated fadeInLeft" style="border-radius: 1rem !important;">
                        <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                            <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card11">Data Dosen Non PNS</a>
                        </div>
                        <div id="card11" class="card-body collapse show">
                            <p class="card-text"><b>Total Data: <?= $count_pulang_perbulan1; ?></b></p>
                            <canvas id="absenpulangdosenperbln"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <div class="card shadow border-0 animated zoomIn" style="border-radius: 1rem !important;">
                        <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                            <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card12">Data PNS</a>
                        </div>
                        <div id="card12" class="card-body collapse show">
                            <p class="card-text"><b>Total Data: <?= $count_pulang_perbulan2; ?></b></p>
                            <canvas id="absenpulangpnsperbln"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <div class="card shadow border-0 animated fadeInRight" style="border-radius: 1rem !important;">
                        <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                            <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card13">Data PNS Dosen</a>
                        </div>
                        <div id="card13" class="card-body collapse show">
                            <p class="card-text"><b>Total Data: <?= $count_pulang_perbulan3; ?></b></p>
                            <canvas id="absenpulangpnsdosenperbln"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div>
    <div class="banner-content"> -->
        <div class="container pt-5 pb-md-4">
            <div class="card text-center shadow mb-3 border-0 animated fadeInUp" style="border-radius: 1rem !important;">
                <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                    <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card2">Rekapitulasi Data Presensi Perbulan Tahun <?= date('Y'); ?> (Hanya Masuk)</a>
                </div>
                <div id="card2" class="card-body">

                    <div class="progress" style="height:30px">
                        <div class="progress-bar bg-danger" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_masuk_perbulan; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $count_masuk_perbulan; ?> (Hanya Masuk)</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $get_absen_all[0]->total; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $get_absen_all[0]->total; ?> (Total Pegawai)</div>
                    </div>
                </div>
                <!-- <p class="card-text"><b>Total Data: <?= $count_masuk_perbulan; ?></b></p> -->
            </div>
            <div class="row">
                <div class="col-md-4 my-1">
                    <div class="card shadow border-0 animated fadeInLeft" style="border-radius: 1rem !important;">
                        <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card21">Data Dosen Non PNS</a>
                        </div>
                        <div id="card21" class="card-body">
                            <p class="card-text"><b>Total Data: <?= $count_masuk_perbulan1; ?></b></p>
                            <canvas id="absenmasukdosenperbln"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <div class="card shadow border-0 animated zoomIn" style="border-radius: 1rem !important;">
                        <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                            <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card22">Data PNS</a>
                        </div>
                        <div id="card22" class="card-body">
                            <p class="card-text"><b>Total Data: <?= $count_masuk_perbulan2; ?></b></p>
                            <canvas id="absenmasukpnsperbln"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <div class="card shadow border-0 animated fadeInRight" style="border-radius: 1rem !important;">
                        <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                            <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card23">Data PNS Dosen</a>
                        </div>
                        <div id="card23" class="card-body">
                            <p class="card-text"><b>Total Data: <?= $count_masuk_perbulan3; ?></b></p>
                            <canvas id="absenmasukpnsdosenperbln"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //Dashboard -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<script>
    // ABSEN PULANG DOSEN PERBULAN
    var ctx = document.getElementById('absenpulangdosenperbln').getContext('2d');
    var absenpulangdosenperbln = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                    foreach ($get_absen_pulang_perbulan_chart as $data) {
                        if ($data->role == "Dosen") {
                            switch ($data->bulan) {
                                case "1":
                                    $namaBulan = "'Januari'";
                                    break;
                                case "2":
                                    $namaBulan = "'Februari'";
                                    break;
                                case "3":
                                    $namaBulan = "'Maret'";
                                    break;
                                case "4":
                                    $namaBulan = "'April'";
                                    break;
                                case "5":
                                    $namaBulan = "'Mei'";
                                    break;
                                case "6":
                                    $namaBulan = "'Juni'";
                                    break;
                                case "7":
                                    $namaBulan = "'Juli'";
                                    break;
                                case "8":
                                    $namaBulan = "'Agustus'";
                                    break;
                                case "9":
                                    $namaBulan = "'September'";
                                    break;
                                case "10":
                                    $namaBulan = "'Oktober'";
                                    break;
                                case "11":
                                    $namaBulan = "'November'";
                                    break;
                                case "12":
                                    $namaBulan = "'Desember'";
                                    break;
                                default:
                                    break;
                            }
                            echo $namaBulan . ",";
                        }
                    }
                } else {
                    echo "0,";
                } ?>
            ],
            datasets: [{
                    label: "Data Dosen Non PNS",
                    fill: false,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: [
                        <?php if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                            foreach ($get_absen_pulang_perbulan_chart as $data) {
                                if ($data->role == "Dosen") {
                                    echo $data->jumlah_hadir . ",";
                                }
                            }
                        } else {
                            echo "0,";
                        } ?>
                    ]
                },
                // {
                //     label: "Data PNS",
                //     fill: true,
                //     backgroundColor: 'rgb(148, 80, 2)',
                //     borderColor: 'rgb(0, 0, 0)',
                //     data: [
                //         <?php
                            //         if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                            //             foreach ($get_absen_pulang_perbulan_chart as $data) {
                            //                 if ($data->role == "PNS") {
                            //                     echo $data->jumlah_hadir . ",";
                            //                 }
                            //             }
                            //         } else {
                            //             echo "0";
                            //         } 
                            ?>
                //     ]
                // },
                // {
                //     label: "Data Dosen PNS",
                //     fill: true,
                //     backgroundColor: 'rgb(68, 59, 238)',
                //     borderColor: 'rgb(0, 0, 0)',
                //     data: [
                //         <?php
                            //         if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                            //             foreach ($get_absen_pulang_perbulan_chart as $data) {
                            //                 if ($data->role == "PNS dan DOSEN") {
                            //                     echo $data->jumlah_hadir . ",";
                            //                 }
                            //             }
                            //         } else {
                            //             echo "0";
                            //         }
                            //         
                            ?>
                //     ]
                // }
            ]
        },

        plugins: [ChartDataLabels],
        options: {
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#17202a',
                    font: {
                        weight: 'bold',
                    }
                },
                title: {
                    // display: true,
                    // text: 'Total Presensi: <?= $count_pulang_perbulan ?>',

                    font: {
                        size: 20
                    },
                    color: 'blue',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });

    // ABSEN PULANG PNS PERBULAN
    var ctx = document.getElementById('absenpulangpnsperbln').getContext('2d');
    var absenpulangpnsperbln = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                    foreach ($get_absen_pulang_perbulan_chart as $data) {
                        if ($data->role == "PNS") {
                            switch ($data->bulan) {
                                case "1":
                                    $namaBulan = "'Januari'";
                                    break;
                                case "2":
                                    $namaBulan = "'Februari'";
                                    break;
                                case "3":
                                    $namaBulan = "'Maret'";
                                    break;
                                case "4":
                                    $namaBulan = "'April'";
                                    break;
                                case "5":
                                    $namaBulan = "'Mei'";
                                    break;
                                case "6":
                                    $namaBulan = "'Juni'";
                                    break;
                                case "7":
                                    $namaBulan = "'Juli'";
                                    break;
                                case "8":
                                    $namaBulan = "'Agustus'";
                                    break;
                                case "9":
                                    $namaBulan = "'September'";
                                    break;
                                case "10":
                                    $namaBulan = "'Oktober'";
                                    break;
                                case "11":
                                    $namaBulan = "'November'";
                                    break;
                                case "12":
                                    $namaBulan = "'Desember'";
                                    break;
                                default:
                                    break;
                            }
                            echo $namaBulan . ",";
                        }
                    }
                } else {
                    echo "0,";
                } ?>
            ],
            datasets: [{
                label: "Data PNS",
                fill: true,
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1,
                data: [
                    <?php
                    if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                        foreach ($get_absen_pulang_perbulan_chart as $data) {
                            if ($data->role == "PNS") {
                                echo $data->jumlah_hadir . ",";
                            }
                        }
                    } else {
                        echo "0,";
                    } ?>
                ]
            }]
        },

        plugins: [ChartDataLabels],
        options: {
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#17202a',
                    font: {
                        weight: 'bold',
                    }
                },
                title: {

                    font: {
                        size: 20
                    },
                    color: 'blue',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });

    // ABSEN PULANG PNS DOSEN PERBULAN
    var ctx = document.getElementById('absenpulangpnsdosenperbln').getContext('2d');
    var absenpulangpnsdosenperbln = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                    foreach ($get_absen_pulang_perbulan_chart as $data) {
                        if ($data->role == "PNS dan DOSEN") {
                            switch ($data->bulan) {
                                case "1":
                                    $namaBulan = "'Januari'";
                                    break;
                                case "2":
                                    $namaBulan = "'Februari'";
                                    break;
                                case "3":
                                    $namaBulan = "'Maret'";
                                    break;
                                case "4":
                                    $namaBulan = "'April'";
                                    break;
                                case "5":
                                    $namaBulan = "'Mei'";
                                    break;
                                case "6":
                                    $namaBulan = "'Juni'";
                                    break;
                                case "7":
                                    $namaBulan = "'Juli'";
                                    break;
                                case "8":
                                    $namaBulan = "'Agustus'";
                                    break;
                                case "9":
                                    $namaBulan = "'September'";
                                    break;
                                case "10":
                                    $namaBulan = "'Oktober'";
                                    break;
                                case "11":
                                    $namaBulan = "'November'";
                                    break;
                                case "12":
                                    $namaBulan = "'Desember'";
                                    break;
                                default:
                                    break;
                            }
                            echo $namaBulan . ",";
                        }
                    }
                } else {
                    echo "0,";
                } ?>
            ],
            datasets: [

                {
                    label: "Data Dosen PNS",
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: [
                        <?php
                        if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                            foreach ($get_absen_pulang_perbulan_chart as $data) {
                                if ($data->role == "PNS dan DOSEN") {
                                    echo $data->jumlah_hadir . ",";
                                }
                            }
                        } else {
                            echo "0,";
                        }

                        ?>
                    ]
                }
            ]
        },

        plugins: [ChartDataLabels],
        options: {
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#17202a',
                    font: {
                        weight: 'bold',
                    }
                },
                title: {
                    font: {
                        size: 20
                    },
                    color: 'blue',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });

    // ABSEN MASUK DOSEN PERBULAN
    var ctx = document.getElementById('absenmasukdosenperbln').getContext('2d');
    var absenmasukdosenperbln = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
                    foreach ($get_absen_masuk_perbulan_chart as $data) {
                        if ($data->role == "Dosen") {
                            switch ($data->bulan) {
                                case "1":
                                    $namaBulan = "'Januari'";
                                    break;
                                case "2":
                                    $namaBulan = "'Februari'";
                                    break;
                                case "3":
                                    $namaBulan = "'Maret'";
                                    break;
                                case "4":
                                    $namaBulan = "'April'";
                                    break;
                                case "5":
                                    $namaBulan = "'Mei'";
                                    break;
                                case "6":
                                    $namaBulan = "'Juni'";
                                    break;
                                case "7":
                                    $namaBulan = "'Juli'";
                                    break;
                                case "8":
                                    $namaBulan = "'Agustus'";
                                    break;
                                case "9":
                                    $namaBulan = "'September'";
                                    break;
                                case "10":
                                    $namaBulan = "'Oktober'";
                                    break;
                                case "11":
                                    $namaBulan = "'November'";
                                    break;
                                case "12":
                                    $namaBulan = "'Desember'";
                                    break;
                                default:
                                    break;
                            }
                            echo $namaBulan . ",";
                        }
                    }
                } else {
                    echo "0,";
                } ?>
            ],
            datasets: [{
                label: "Data Dosen Non PNS",
                fill: false,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: [
                    <?php if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
                        foreach ($get_absen_masuk_perbulan_chart as $data) {
                            if ($data->role == "Dosen") {
                                echo $data->jumlah_hadir . ",";
                            }
                        }
                    } else {
                        echo "0,";
                    } ?>
                ]
            }]
        },

        plugins: [ChartDataLabels],
        options: {
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#17202a',
                    font: {
                        weight: 'bold',
                    }
                },
                title: {
                    font: {
                        size: 20
                    },
                    color: 'blue',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });

    // ABSEN MASUK PNS PERBULAN
    var ctx = document.getElementById('absenmasukpnsperbln').getContext('2d');
    var absenmasukpnsperbln = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
                    foreach ($get_absen_masuk_perbulan_chart as $data) {
                        if ($data->role == "PNS") {
                            switch ($data->bulan) {
                                case "1":
                                    $namaBulan = "'Januari'";
                                    break;
                                case "2":
                                    $namaBulan = "'Februari'";
                                    break;
                                case "3":
                                    $namaBulan = "'Maret'";
                                    break;
                                case "4":
                                    $namaBulan = "'April'";
                                    break;
                                case "5":
                                    $namaBulan = "'Mei'";
                                    break;
                                case "6":
                                    $namaBulan = "'Juni'";
                                    break;
                                case "7":
                                    $namaBulan = "'Juli'";
                                    break;
                                case "8":
                                    $namaBulan = "'Agustus'";
                                    break;
                                case "9":
                                    $namaBulan = "'September'";
                                    break;
                                case "10":
                                    $namaBulan = "'Oktober'";
                                    break;
                                case "11":
                                    $namaBulan = "'November'";
                                    break;
                                case "12":
                                    $namaBulan = "'Desember'";
                                    break;
                                default:
                                    break;
                            }
                            echo $namaBulan . ",";
                        }
                    }
                } else {
                    echo "0,";
                } ?>
            ],
            datasets: [{
                label: "Data PNS",
                fill: true,
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1,
                data: [
                    <?php
                    if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
                        foreach ($get_absen_masuk_perbulan_chart as $data) {
                            if ($data->role == "PNS") {
                                echo $data->jumlah_hadir . ",";
                            }
                        }
                    } else {
                        echo "0,";
                    } ?>
                ]
            }]
        },

        plugins: [ChartDataLabels],
        options: {
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#17202a',
                    font: {
                        weight: 'bold',
                    }
                },
                title: {

                    font: {
                        size: 20
                    },
                    color: 'blue',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });

    // ABSEN MASUK PNS DOSEN PERBULAN
    var ctx = document.getElementById('absenmasukpnsdosenperbln').getContext('2d');
    var absenmasukpnsdosenperbln = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
                    foreach ($get_absen_masuk_perbulan_chart as $data) {
                        if ($data->role == "PNS dan DOSEN") {
                            switch ($data->bulan) {
                                case "1":
                                    $namaBulan = "'Januari'";
                                    break;
                                case "2":
                                    $namaBulan = "'Februari'";
                                    break;
                                case "3":
                                    $namaBulan = "'Maret'";
                                    break;
                                case "4":
                                    $namaBulan = "'April'";
                                    break;
                                case "5":
                                    $namaBulan = "'Mei'";
                                    break;
                                case "6":
                                    $namaBulan = "'Juni'";
                                    break;
                                case "7":
                                    $namaBulan = "'Juli'";
                                    break;
                                case "8":
                                    $namaBulan = "'Agustus'";
                                    break;
                                case "9":
                                    $namaBulan = "'September'";
                                    break;
                                case "10":
                                    $namaBulan = "'Oktober'";
                                    break;
                                case "11":
                                    $namaBulan = "'November'";
                                    break;
                                case "12":
                                    $namaBulan = "'Desember'";
                                    break;
                                default:
                                    break;
                            }
                            echo $namaBulan . ",";
                        }
                    }
                } else {
                    echo "0,";
                } ?>
            ],
            datasets: [

                {
                    label: "Data Dosen PNS",
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: [
                        <?php
                        if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
                            foreach ($get_absen_masuk_perbulan_chart as $data) {
                                if ($data->role == "PNS dan DOSEN") {
                                    echo $data->jumlah_hadir . ",";
                                }
                            }
                        } else {
                            echo "0,";
                        }

                        ?>
                    ]
                }
            ]
        },

        plugins: [ChartDataLabels],
        options: {
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#17202a',
                    font: {
                        weight: 'bold',
                    }
                },
                title: {
                    font: {
                        size: 20
                    },
                    color: 'blue',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });
</script>