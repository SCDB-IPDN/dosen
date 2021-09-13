<style>
    /* Style tab links */
    .tablink {
        background-color: #0460ca;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 33.3%;
    }

    .tablink:hover {
        background-color: #65a8f5;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }

    #Home {
        background-color: #1b80f5;
    }

    #News {
        background-color: #1b80f5;
    }

    #Contact {
        background-color: #1b80f5;
    }

    #About {
        background-color: #1b80f5;
    }
</style>
<?php

if ($get_absen_pulang_perbulan_chart_perhari != false && !empty($get_absen_pulang_perbulan_chart_perhari)) {
    $count_pulang_perbulan_1_ = 0;
    $count_pulang_perbulan_1_1 = 0;
    $count_pulang_perbulan_1_2 = 0;
    $count_pulang_perbulan_1_3 = 0;
    $count_pulang_perbulan_1_4 = 0;
    foreach ($get_absen_pulang_perbulan_chart_perhari as $data) {
        $count_pulang_perbulan_1_ += $data->jumlah_hadir;
        if ($data->role == "Dosen") {
            $count_pulang_perbulan_1_1 += $data->jumlah_hadir;
        }
        if ($data->role == "PNS") {
            $count_pulang_perbulan_1_2 += $data->jumlah_hadir;
        }
        if ($data->role == "PNS dan DOSEN") {
            $count_pulang_perbulan_1_3 += $data->jumlah_hadir;
        }
        if ($data->role == "THL dan TA") {
            $count_pulang_perbulan_1_4 += $data->jumlah_hadir;
        }
    }
} else {
    $count_pulang_perbulan_1_ = 0;
    $count_pulang_perbulan_1_1 = 0;
    $count_pulang_perbulan_1_2 = 0;
    $count_pulang_perbulan_1_3 = 0;
    $count_pulang_perbulan_1_4 = 0;
}

if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
    $count_pulang_perbulan = 0;
    $count_pulang_perbulan1 = 0;
    $count_pulang_perbulan2 = 0;
    $count_pulang_perbulan3 = 0;
    $count_pulang_perbulan4 = 0;
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
        if ($data->role == "THL dan TA") {
            $count_pulang_perbulan4 += $data->jumlah_hadir;
        }
    }
} else {
    $count_pulang_perbulan = 0;
    $count_pulang_perbulan1 = 0;
    $count_pulang_perbulan2 = 0;
    $count_pulang_perbulan3 = 0;
    $count_pulang_perbulan4 = 0;
}

if ($get_absen_masuk_perbulan_chart_perhari != false && !empty($get_absen_masuk_perbulan_chart_perhari)) {
    $count_masuk_perbulan_1_ = 0;
    $count_masuk_perbulan_1_1 = 0;
    $count_masuk_perbulan_1_2 = 0;
    $count_masuk_perbulan_1_3 = 0;
    $count_masuk_perbulan_1_4 = 0;
    foreach ($get_absen_masuk_perbulan_chart_perhari as $data) {
        $count_masuk_perbulan_1_ += $data->jumlah_hadir;
        if ($data->role == "Dosen") {
            $count_masuk_perbulan_1_1 += $data->jumlah_hadir;
        }
        if ($data->role == "PNS") {
            $count_masuk_perbulan_1_2 += $data->jumlah_hadir;
        }
        if ($data->role == "PNS dan DOSEN") {
            $count_masuk_perbulan_1_3 += $data->jumlah_hadir;
        }
        if ($data->role == "THL dan TA") {
            $count_masuk_perbulan_1_4 += $data->jumlah_hadir;
        }
    }
} else {
    $count_masuk_perbulan_1_ = 0;
    $count_masuk_perbulan_1_1 = 0;
    $count_masuk_perbulan_1_2 = 0;
    $count_masuk_perbulan_1_3 = 0;
    $count_masuk_perbulan_1_4 = 0;
}

if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
    $count_masuk_perbulan = 0;
    $count_masuk_perbulan1 = 0;
    $count_masuk_perbulan2 = 0;
    $count_masuk_perbulan3 = 0;
    $count_masuk_perbulan4 = 0;
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
        if ($data->role == "THL dan TA") {
            $count_masuk_perbulan4 += $data->jumlah_hadir;
        }
    }
} else {
    $count_masuk_perbulan = 0;
    $count_masuk_perbulan1 = 0;
    $count_masuk_perbulan2 = 0;
    $count_masuk_perbulan3 = 0;
    $count_masuk_perbulan4 = 0;
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

if ($get_all_total != false && !empty($get_all_total)) {

    $get_total_fakultas = 0;
    $get_total_prodi = 0;
    $get_total_matkul = 0;
    $get_total_dosen = 0;
    $get_total_kelas = 0;

    foreach ($get_all_total as $data) {
        $get_total_fakultas += $data->total_fakultas;
        $get_total_prodi += $data->total_prodi;
        $get_total_matkul += $data->total_matkul;
        $get_total_dosen += $data->total_dosen;
        $get_total_kelas += $data->total_kelas;
    }
} else {
    $get_total_fakultas = 0;
    $get_total_prodi = 0;
    $get_total_matkul = 0;
    $get_total_dosen = 0;
    $get_total_kelas = 0;
}

if ($get_all_total_done != false && !empty($get_all_total_done)) {

    $get_total_fakultas_done = 0;
    $get_total_prodi_done = 0;
    $get_total_matkul_done = 0;
    $get_total_dosen_done = 0;
    $get_total_kelas_done = 0;

    foreach ($get_all_total_done as $data) {
        $get_total_fakultas_done += $data->total_fakultas;
        $get_total_prodi_done += $data->total_prodi;
        $get_total_matkul_done += $data->total_matkul;
        $get_total_dosen_done += $data->total_dosen;
        $get_total_kelas_done += $data->total_kelas;
    }
} else {
    $get_total_fakultas_done = 0;
    $get_total_prodi_done = 0;
    $get_total_matkul_done = 0;
    $get_total_dosen_done = 0;
    $get_total_kelas_done = 0;
}

if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {

    $get_fakultas = 'Tidak Ada Pembelajaran Daring!';
    $get_prodi = 0;
    $get_matkul = 0;
    $get_dosen = 0;
    $get_kelas = 0;

    foreach ($get_summary_fakultas as $data) {
        $get_fakultas = $data->id_fakultas;
        $get_prodi += $data->prodi;
        $get_matkul += $data->matkul;
        $get_dosen += $data->dosen;
        $get_kelas += $data->kelas;
    }
} else {
    $get_fakultas = 'Tidak Ada Pembelajaran Daring!';
    $get_prodi = 0;
    $get_matkul = 0;
    $get_dosen = 0;
    $get_kelas = 0;
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
        <div class="container mt-5">
            <div class="card shadow text-center mb-3 mt-3 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                    <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#cardatas"><i class="fa fa-expand"></i> Monitoring Pembelajaran (<?= date('d-M-Y'); ?>)</a>
                </div>
                <div id="cardatas" class="card-body">

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <p>*Chart jumlah status monitoring pembelajaran daring</p>
                            <canvas id="myChart3"></canvas>
                            <button type="button" class="btn btn-outline-info btn-sm btn-block mt-2" data-toggle="modal" data-target="#detail_modal">Tampilkan Detail</button>
                        </div>
                    </div>

                    <!-- <button class="tablink" onclick="openPage('Home', this, '#1b80f5')">Home</button> -->
                    <button class="tablink" onclick="openPage('News', this, '#1b80f5')">Belum Mulai</button>
                    <button class="tablink" onclick="openPage('Contact', this, '#1b80f5')">Sedang Berlangsung</button>
                    <button class="tablink" onclick="openPage('About', this, '#1b80f5')" id="defaultOpen">Telah Selesai</button>

                    <!-- <div id="Home" class="tabcontent">
                        <h3>Home</h3>
                        <p>Home is where the heart is..</p>
                    </div> -->

                    <div id="News" class="tabcontent">

                    </div>

                    <div id="Contact" class="tabcontent">
                        <p class="text-light">Daftar pembelajaran <b>Sedang Berlangsung</b></p>
                        <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                            <div class="col-md-12 my-5">
                                <div class="table-responsive-xl mx-2">
                                    <table class="table table-hover table-xl" id="sedang_berlangsung">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Dosen</th>
                                                <th>Matakuliah</th>
                                                <th>Jam</th>
                                                <th>Kelas</th>
                                                <th>Prodi</th>
                                                <th>Fakultas</th>
                                                <th>Link</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="About" class="tabcontent">
                        <p class="text-light">Daftar pembelajaran <b>Telah Selesai</b></p>
                        <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                            <div class="col-md-12 my-5">
                                <div class="table-responsive-xl mx-2">
                                    <table class="table table-hover table-xl" id="telah_selesai">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Dosen</th>
                                                <th>Matakuliah</th>
                                                <th>Jam</th>
                                                <th>Kelas</th>
                                                <th>Prodi</th>
                                                <th>Fakultas</th>
                                                <th>Link</th>
                                                <th>Gambar</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function openPage(pageName, elmnt, color) {
                            // Hide all elements with class="tabcontent" by default */
                            var i, tabcontent, tablinks;
                            tabcontent = document.getElementsByClassName("tabcontent");
                            for (i = 0; i < tabcontent.length; i++) {
                                tabcontent[i].style.display = "none";
                            }

                            // Remove the background color of all tablinks/buttons
                            tablinks = document.getElementsByClassName("tablink");
                            for (i = 0; i < tablinks.length; i++) {
                                tablinks[i].style.backgroundColor = "";
                            }

                            // Show the specific tab content
                            document.getElementById(pageName).style.display = "block";

                            // Add the specific color to the button used to open the tab content
                            elmnt.style.backgroundColor = color;
                        }

                        // Get the element with id="defaultOpen" and click on it
                        document.getElementById("defaultOpen").click();
                    </script>

                    <div class="row">
                        <div class="col-lg-12 col-sm-6">
                            <div class="card-box bg-primary">
                                <div class="inner">
                                    <h3 class="text-light"> <?= $get_total_kelas_done; ?> / <?= $get_total_kelas; ?> </h3>
                                    <p class="text-light"> KELAS </p>
                                </div>
                                <!-- <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div> -->
                                <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseKelas">View More <i class="fa fa-arrow-circle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="collapseKelas" class="col-lg-12 col-sm-6 mt-0 collapse In">
                            <div class="card-box bg-primary">
                                <div class="inner">
                                    <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                        foreach ($get_summary_fakultas as $data) { ?>
                                            <p class="text-light"> <?= $data->id_fakultas; ?> : <?= $data->kelas; ?> </p>
                                    <?php
                                        }
                                    } ?>
                                </div>
                                <!-- <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div> -->
                                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-6">
                            <div class="card-box bg-primary">
                                <div class="inner">
                                    <h3 class="text-light"> <?= $get_total_dosen; ?> </h3>
                                    <p class="text-light"> DOSEN </p>
                                </div>
                                <!-- <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div> -->
                                <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseDosen">View More <i class="fa fa-arrow-circle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="collapseDosen" class="col-lg-12 col-sm-6 collapse In">
                            <div class="card-box bg-primary">
                                <div class="inner">
                                    <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                        foreach ($get_summary_fakultas as $data) { ?>
                                            <p class="text-light"> <?= $data->id_fakultas; ?> : <?= $data->dosen; ?> </p>
                                    <?php
                                        }
                                    } ?>
                                </div>

                                <!-- <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div> -->
                                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 col-sm-6">
                            <div class="card-box bg-primary">
                                <div class="inner">
                                    <h3 class="text-light"> <?= $get_total_matkul; ?> </h3>
                                    <p class="text-light"> MATAKULIAH </p>
                                </div>
                                <!-- <div class="icon">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                </div> -->
                                <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseMatkul">View More <i class="fa fa-arrow-circle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="collapseMatkul" class="col-lg-12 col-sm-6 collapse In">
                            <div class="card-box bg-primary">
                                <div class="inner">
                                    <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                        foreach ($get_summary_fakultas as $data) { ?>
                                            <p class="text-light"> <?= $data->id_fakultas; ?> : <?= $data->matkul; ?> </p>
                                    <?php
                                        }
                                    } ?>
                                </div>
                                <!-- <div class="icon">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                </div> -->
                                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card-box bg-primary">
                                <div class="inner">
                                    <h3 class="text-light"> <?= $get_total_prodi; ?> </h3>
                                    <p class="text-light"> PRODI </p>
                                </div>
                                <!-- <div class="icon">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div> -->
                                <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseProdi">View More <i class="fa fa-arrow-circle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="collapseProdi" class="col-md-12 col-sm-6 collapse In">
                            <div class="card-box bg-primary">
                                <div class="inner">
                                    <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                        foreach ($get_summary_fakultas as $data) { ?>
                                            <p class="text-light"> <?= $data->id_fakultas; ?> : <?= $data->prodi; ?> </p>
                                    <?php
                                        }
                                    } ?>

                                </div>
                                <!-- <div class="icon">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div> -->
                                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card-box bg-blue">
                                <div class="inner">

                                    <h3 class="text-light"> <?= $get_total_fakultas; ?> </h3>
                                    <p class="text-light"> FAKULTAS </p>
                                </div>
                                <!-- <div class="icon">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                </div> -->
                                <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseFakultas">View More <i class="fa fa-arrow-circle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="collapseFakultas" class="col-md-12 col-sm-6 collapse In">
                            <div class="card-box bg-blue">
                                <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                    foreach ($get_summary_fakultas as $data) { ?>
                                        <p class="text-light"> <?= $data->id_fakultas; ?> </p>
                                <?php
                                    }
                                } ?>
                                <!-- <div class="icon">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                </div> -->
                                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- detail modal -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailModalLabel">Status Monitoring Pembelajaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive-xl mx-2">
                                            <table class="table table-hover table-xl" id="detail_monitoring">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Dosen</th>
                                                        <th>Matakuliah</th>
                                                        <th>Prodi</th>
                                                        <th>Status</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div> -->

                                <center><p>Daftar Pembelajaran <b>Belum dimulai</b></p></center>
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive-xl mx-2">
                                            <table class="table table-hover table-xl" id="belum_dimulai">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Dosen</th>
                                                        <th>Matakuliah</th>
                                                        <th>Jam</th>
                                                        <th>Kelas</th>
                                                        <th>Prodi</th>
                                                        <th>Fakultas</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="container pt-5 mt-5 pb-md-4">
            <div class="card shadow text-center mb-3 mt-3 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                    <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#cardx1"><i class="fa fa-expand"></i> Monitoring Pembelajaran (<?= date('d-M-Y'); ?>)</a>
                </div>
                <div id="cardx1" class="card-body ">
                    <h4><b>Total Pembelajaran: <?= $count_total_pembelajaran; ?></b></h4>
                    <div class="progress" style="height:30px">
                        <div class="progress-bar bg-warning" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_pembelajaran_berlangsung; ?>" aria-valuemin="0" aria-valuemax="<?= $count_total_pembelajaran; ?>"><?= $count_pembelajaran_berlangsung; ?> (Sedang Berlangsung)</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_pembelajaran_selesai; ?>" aria-valuemin="0" aria-valuemax="<?= $count_total_pembelajaran; ?>"><?= $count_pembelajaran_selesai; ?> (Selesai)</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_total_pembelajaran; ?>" aria-valuemin="0" aria-valuemax="<?= $count_total_pembelajaran; ?>"><?= $count_total_pembelajaran; ?> (Total Pembelajaran)</div>
                    </div>
                </div>

                <?php if ($get_count_fakultas != false && !empty($get_count_fakultas)) {
                    foreach ($get_count_fakultas as $data) { ?>
                        <div id="cardx1" class="card-body ">
                            <h4><b><a href="<?php echo base_url('dashboard/fakultas_detail/' . $data->id_fakultas); ?>" target="_blank">Fakultas <?= $data->id_fakultas; ?></a></b></h4>
                            <div class="progress" style="height:30px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $data->proses_pembelajaran; ?>" aria-valuemin="0" aria-valuemax="<?= $data->total_pembelajaran; ?>"><?= $data->proses_pembelajaran; ?> (Sedang Berlangsung)</div>
                                <div class="progress-bar bg-success" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $data->selesai_pembelajaran; ?>" aria-valuemin="0" aria-valuemax="<?= $data->total_pembelajaran; ?>"><?= $data->selesai_pembelajaran; ?> (Selesai)</div>
                                <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $data->total_pembelajaran; ?>" aria-valuemin="0" aria-valuemax="<?= $data->total_pembelajaran; ?>"><?= $data->total_pembelajaran; ?> (Total Pembelajaran)</div>
                            </div>
                        </div>

                <?php
                    }
                } ?>
            </div> -->

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
        <!-- </div> -->

        <div class="container pt-5 pb-md-4">
            <div class="card shadow text-center mb-3 mt-3 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                    <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card1"><i class="fa fa-expand"></i> Rekapitulasi Data Presensi Tanggal <?= date('Y-m-d'); ?></a>
                </div>
                <div id="card1" class="card-body ">
                    <h4>Presensi Masuk dan Pulang</h4>
                    <div class="progress" style="height:30px">
                        <div class="progress-bar bg-success" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_pulang_perbulan_1_; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $count_pulang_perbulan_1_; ?> Pegawai</div>
                        <div class="progress-bar bg-danger" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= ($get_absen_all[0]->total - $count_pulang_perbulan_1_); ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= ($get_absen_all[0]->total - $count_pulang_perbulan_1_); ?> (Tidak Absen)</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $get_absen_all[0]->total; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $get_absen_all[0]->total; ?> (Total Pegawai)</div>
                    </div>
                </div>
                <div id="card1" class="card-body ">
                    <h4>Presensi Hanya Masuk</h4>
                    <div class="progress" style="height:30px">
                        <div class="progress-bar bg-success" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_masuk_perbulan_1_; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $count_masuk_perbulan_1_; ?> Pegawai</div>
                        <div class="progress-bar bg-danger" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= ($get_absen_all[0]->total - $count_masuk_perbulan_1_); ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= ($get_absen_all[0]->total - $count_masuk_perbulan_1_); ?> (Tidak Absen)</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $get_absen_all[0]->total; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $get_absen_all[0]->total; ?> (Total Pegawai)</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-5 pb-md-4">
            <div class="card shadow text-center mb-3 mt-3 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                    <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card1"><i class="fa fa-expand"></i> Rekapitulasi Data Presensi Perbulan Tahun <?= date('Y'); ?> (Masuk dan Pulang)</a>
                </div>
                <div id="card1" class="card-body ">

                    <div class="progress" style="height:30px">
                        <div class="progress-bar bg-success" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_pulang_perbulan; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $count_pulang_perbulan; ?> (Masuk dan Pulang)</div>
                        <!-- <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $get_absen_all[0]->total; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $get_absen_all[0]->total; ?> (Total Pegawai)</div> -->
                    </div>
                    <!-- <h4><b>Total Data: <?= $count_pulang_perbulan; ?></b></h4> -->
                </div>
            </div>
            <!-- </div> -->
            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-6 my-1">
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
                <div class="col-md-6 my-1">
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
                <div class="col-md-6 my-1">
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
                <div class="col-md-6 my-1">
                    <div class="card shadow border-0 animated fadeInRight" style="border-radius: 1rem !important;">
                        <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                            <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card14">Data THL dan TA</a>
                        </div>
                        <div id="card14" class="card-body collapse show">
                            <p class="card-text"><b>Total Data: <?= $count_pulang_perbulan4; ?></b></p>
                            <canvas id="absenpulangthltaperbln"></canvas>
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
                        <!-- <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $get_absen_all[0]->total; ?>" aria-valuemin="0" aria-valuemax="<?= $get_absen_all[0]->total; ?>"><?= $get_absen_all[0]->total; ?> (Total Pegawai)</div> -->
                    </div>
                </div>
                <!-- <p class="card-text"><b>Total Data: <?= $count_masuk_perbulan; ?></b></p> -->
            </div>
            <div class="row">
                <div class="col-md-6 my-1">
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
                <div class="col-md-6 my-1">
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
                <div class="col-md-6 my-1">
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
                <div class="col-md-6 my-1">
                    <div class="card shadow border-0 animated fadeInRight" style="border-radius: 1rem !important;">
                        <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                            <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#card24">Data THL dan TA</a>
                        </div>
                        <div id="card24" class="card-body">
                            <p class="card-text"><b>Total Data: <?= $count_masuk_perbulan4; ?></b></p>
                            <canvas id="absenmasukthltaperbln"></canvas>
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
    var ctx = document.getElementById('myChart3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php if (count($get_count_status_monitoring) > 0) {
                    foreach ($get_count_status_monitoring as $data) { ?> "<?= $data->StatusMonitoring ?>",
                <?php }
                } ?>
            ],
            datasets: [{
                label: 'Pembelajaran',
                fill: true,
                data: [
                    <?php if (count($get_count_status_monitoring) > 0) {
                        foreach ($get_count_status_monitoring as $data) { ?>
                            <?= $data->TotalMonitoring ?>,
                    <?php }
                    } ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            }]
        },

        options: {
            plugins: {
                legend: {
                    display: false
                },
                // title: {
                //   display: true,
                //   text: '',

                //   font: {
                //     size: 20
                //   },
                //   color: 'blue',
                //   padding: {
                //     top: 10,
                //     bottom: 30
                //   }
                // }
            },
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php $this->load->view('page/js_datatable_frontend'); ?>
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

    // ABSEN PULANG THL DAN TA PERBULAN
    var ctx = document.getElementById('absenpulangthltaperbln').getContext('2d');
    var absenpulangpnsdosenperbln = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                    foreach ($get_absen_pulang_perbulan_chart as $data) {
                        if ($data->role == "THL dan TA") {
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
                    label: "Data THL dan TA",
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: [
                        <?php
                        if ($get_absen_pulang_perbulan_chart != false && !empty($get_absen_pulang_perbulan_chart)) {
                            foreach ($get_absen_pulang_perbulan_chart as $data) {
                                if ($data->role == "THL dan TA") {
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

    // ABSEN MASUK THL DAN TA PERBULAN
    var ctx = document.getElementById('absenmasukthltaperbln').getContext('2d');
    var absenmasukpnsdosenperbln = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
                    foreach ($get_absen_masuk_perbulan_chart as $data) {
                        if ($data->role == "THL dan TA") {
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
                    label: "Data THL dan TA",
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: [
                        <?php
                        if ($get_absen_masuk_perbulan_chart != false && !empty($get_absen_masuk_perbulan_chart)) {
                            foreach ($get_absen_masuk_perbulan_chart as $data) {
                                if ($data->role == "THL dan TA") {
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


    /* -------------------------------------------------------------------------- */
    /*                       Fetch Status Monitoring Records                      */
    /* -------------------------------------------------------------------------- */
    function fetchStatusMonitoring() {
        $.ajax({
            url: "<?php echo base_url(); ?>fetchstatusdashboard",
            type: "post",
            dataType: "json",
            success: function(data) {
                if (data.responce == "success") {

                    var i = "1";
                    $('#detail_monitoring').DataTable({
                        "data": data.posts,
                        "responsive": true,
                        dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        buttons: [
                            'copy', 'excel', 'pdf'
                        ],
                        "columns": [{
                                "render": function() {
                                    return a = i++;
                                }
                            },
                            {
                                "data": "nama"
                            },
                            {
                                "data": "nama_matkul"
                            },
                            {
                                "data": "id_prodi"
                            },
                            {
                                "data": "StatusMonitoring"
                            },
                            {
                                "data": "TotalMonitoring"
                            }

                        ]
                    });
                } else {
                    toastr["error"](data.message);
                }

            }
        });
    }
    fetchStatusMonitoring();

    /* -------------------------------------------------------------------------- */
    /*                           Fetch Status Belum Dimulai                       */
    /* -------------------------------------------------------------------------- */
    function fetchBelumDimulai() {
        $.ajax({
            url: "<?php echo base_url(); ?>fetchstatusbelumdimulai",
            type: "post",
            dataType: "json",
            success: function(data) {
                if (data.responce == "success") {

                    var i = "1";
                    $('#belum_dimulai').DataTable({
                        "data": data.posts,
                        "responsive": true,
                        dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        buttons: [
                            'copy', 'excel', 'pdf'
                        ],
                        "columns": [{
                                "render": function() {
                                    return a = i++;
                                }
                            },
                            {
                                "data": "nama"
                            },
                            {
                                "data": "nama_matkul"
                            },
                            {
                                "data": "jam"
                            },
                            {
                                "data": "kelas"
                            },
                            {
                                "data": "id_prodi"
                            },
                            {
                                "data": "id_fakultas"
                            }

                        ]
                    });
                } else {
                    toastr["error"](data.message);
                }

            }
        });
    }
    fetchBelumDimulai();
    /* -------------------------------------------------------------------------- */
    /*                           Fetch Status Sedang Berlangsung                    */
    /* -------------------------------------------------------------------------- */
    function fetchSedangBerlangsung() {
        $.ajax({
            url: "<?php echo base_url(); ?>fetchstatussedangberlangsung",
            type: "post",
            dataType: "json",
            success: function(data) {
                if (data.responce == "success") {

                    var i = "1";
                    $('#sedang_berlangsung').DataTable({
                        "data": data.posts,
                        "responsive": true,
                        dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        buttons: [
                            'copy', 'excel', 'pdf'
                        ],
                        "columns": [{
                                "render": function() {
                                    return a = i++;
                                }
                            },
                            {
                                "data": "nama"
                            },
                            {
                                "data": "nama_matkul"
                            },
                            {
                                "data": "jam"
                            },
                            {
                                "data": "kelas"
                            },
                            {
                                "data": "id_prodi"
                            },
                            {
                                "data": "id_fakultas"
                            },
                            {
                                "data": "keterangan",
                                render: function(data, type, row, meta) {
                                    if (`${row.keterangan}` != 'null') {
                                        var a = `
                                <a href="${row.keterangan}" target="_blank">Kunjungi Link Pembelajaran</a>
                              `;

                                    } else {
                                        var a = `Belum menyisipkan link`;
                                    }


                                    return a;
                                }
                            }

                        ]
                    });
                } else {
                    toastr["error"](data.message);
                }

            }
        });
    }
    fetchSedangBerlangsung();

    /* -------------------------------------------------------------------------- */
    /*                           Fetch Status Telah Selesai                       */
    /* -------------------------------------------------------------------------- */
    function fetchTelahSelesai() {
        $.ajax({
            url: "<?php echo base_url(); ?>fetchstatustelahselesai",
            type: "post",
            dataType: "json",
            success: function(data) {
                if (data.responce == "success") {

                    var i = "1";
                    $('#telah_selesai').DataTable({
                        "data": data.posts,
                        "responsive": true,
                        dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        buttons: [
                            'copy', 'excel', 'pdf'
                        ],
                        "columns": [{
                                "render": function() {
                                    return a = i++;
                                }
                            },
                            {
                                "data": "nama"
                            },
                            {
                                "data": "nama_matkul"
                            },
                            {
                                "data": "jam"
                            },
                            {
                                "data": "kelas"
                            },
                            {
                                "data": "id_prodi"
                            },
                            {
                                "data": "id_fakultas"
                            },
                            {
                                "data": "keterangan",
                                render: function(data, type, row, meta) {
                                    if (`${row.keterangan}` != 'null') {
                                        var a = `
                                <a href="${row.keterangan}" target="_blank">Kunjungi Link Pembelajaran</a>
                              `;

                                    } else {
                                        var a = `Belum menyisipkan link`;
                                    }


                                    return a;
                                }
                            },
                            {
                                "data": "upload",
                                render: function(data, type, row, meta) {

                                    if (`${row.upload}` != 'null') {
                                        var a = `
                                <img src="<?php echo base_url(); ?>/assets/upload/${row.upload}" width="300" height="200" class="img-thumbnail" id="zoom" value="${row.id_plot}"/>
                            `;

                                    } else {
                                        var a = ` Tidak ada Bukti Foto pembelajaran daring!`;
                                    }

                                    return a;
                                },
                            }

                        ]
                    });
                } else {
                    toastr["error"](data.message);
                }

            }
        });
    }
    fetchTelahSelesai();
</script>