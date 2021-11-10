<?php

if ($get_all_total != false && !empty($get_all_total)) {
    $get_total_fakultas = 0;
    $get_total_prodi = 0;
    $get_total_matkul = 0;
    $get_total_dosen = 0;
    $get_total_kelas = 0;

    $get_kelas_belum_mulai = 0;
    $get_kelas_berlangsung = 0;
    $get_kelas_selesai = 0;

    $get_total_dosen_fhtp = 0;
    $get_total_dosen_fmp = 0;
    $get_total_dosen_fpp = 0;

    $get_total_matkul_fhtp = 0;
    $get_total_matkul_fmp = 0;
    $get_total_matkul_fpp = 0;

    $get_total_prodi_fhtp = 0;
    $get_total_prodi_fmp = 0;
    $get_total_prodi_fpp = 0;

    foreach ($get_all_total as $data) {
        if ($get_all_total_kelas != false && !empty($get_all_total_kelas)) {
            foreach ($get_all_total_kelas as $dataxxx) {
                if ($dataxxx->id_fakultas == $data->id_fakultas) {
                    $data_kelas_ex = explode(',', $dataxxx->kelas);
                    $get_total_kelas += count($data_kelas_ex);
                }
            }
        }
        if ($get_all_kelas_belum_mulai != false && !empty($get_all_kelas_belum_mulai)) {
            foreach ($get_all_kelas_belum_mulai as $belummulai) {
                if ($belummulai->id_fakultas == $data->id_fakultas) {
                    $data_kelas_belum_mulai = explode(',', $belummulai->kelas);
                    $get_kelas_belum_mulai += count($data_kelas_belum_mulai);
                }
            }
        }

        if ($get_all_kelas_berlangsung != false && !empty($get_all_kelas_berlangsung)) {
            foreach ($get_all_kelas_berlangsung as $berlangsung) {
                if ($berlangsung->id_fakultas == $data->id_fakultas) {
                    $data_kelas_berlangsung = explode(',', $berlangsung->kelas);
                    $get_kelas_berlangsung += count($data_kelas_berlangsung);
                }
            }
        }

        if ($get_all_kelas_selesai != false && !empty($get_all_kelas_selesai)) {
            foreach ($get_all_kelas_selesai as $selesai) {
                if ($selesai->id_fakultas == $data->id_fakultas) {
                    $data_kelas_selesai = explode(',', $selesai->kelas);
                    $get_kelas_selesai += count($data_kelas_selesai);
                }
            }
        }

        $get_total_fakultas += $data->total_fakultas;
        $get_total_prodi += $data->total_prodi;
        $get_total_matkul += $data->total_matkul;
        $get_total_dosen += $data->total_dosen;

        if ($data->id_fakultas == 'FHTP') {
            $get_total_dosen_fhtp += $data->total_dosen;
            $get_total_matkul_fhtp += $data->total_matkul;
            $get_total_prodi_fhtp += $data->total_prodi;
        }
        if ($data->id_fakultas == 'FMP') {
            $get_total_dosen_fmp += $data->total_dosen;
            $get_total_matkul_fmp += $data->total_matkul;
            $get_total_prodi_fmp += $data->total_prodi;
        }
        if ($data->id_fakultas == 'FPP') {
            $get_total_dosen_fpp += $data->total_dosen;
            $get_total_matkul_fpp += $data->total_matkul;
            $get_total_prodi_fpp += $data->total_prodi;
        }
    }
} else {
    $get_total_fakultas = 0;
    $get_total_prodi = 0;
    $get_total_matkul = 0;
    $get_total_dosen = 0;
    $get_total_kelas = 0;

    $get_kelas_belum_mulai = 0;
    $get_kelas_berlangsung = 0;
    $get_kelas_selesai = 0;

    $get_total_dosen_fhtp = 0;
    $get_total_dosen_fmp = 0;
    $get_total_dosen_fpp = 0;

    $get_total_matkul_fhtp = 0;
    $get_total_matkul_fmp = 0;
    $get_total_matkul_fpp = 0;

    $get_total_prodi_fhtp = 0;
    $get_total_prodi_fmp = 0;
    $get_total_prodi_fpp = 0;
}

if ($get_all_total_done != false && !empty($get_all_total_done)) {
    $get_total_matkul_done = 0;
    $get_total_dosen_done = 0;

    $get_total_dosen_selesai_fhtp = 0;
    $get_total_dosen_selesai_fmp = 0;
    $get_total_dosen_selesai_fpp = 0;

    $get_total_matkul_selesai_fhtp = 0;
    $get_total_matkul_selesai_fmp = 0;
    $get_total_matkul_selesai_fpp = 0;

    $get_total_prodi_selesai_fhtp = 0;
    $get_total_prodi_selesai_fmp = 0;
    $get_total_prodi_selesai_fpp = 0;

    foreach ($get_all_total_done as $data) {
        $get_total_matkul_done += $data->total_matkul;
        $get_total_dosen_done += $data->total_dosen;

        if ($data->id_fakultas == 'FHTP') {
            $get_total_dosen_selesai_fhtp += $data->total_dosen;
            $get_total_matkul_selesai_fhtp += $data->total_matkul;
            $get_total_prodi_selesai_fhtp += $data->total_prodi;
        }
        if ($data->id_fakultas == 'FMP') {
            $get_total_dosen_selesai_fmp += $data->total_dosen;
            $get_total_matkul_selesai_fmp += $data->total_matkul;
            $get_total_prodi_selesai_fmp += $data->total_prodi;
        }
        if ($data->id_fakultas == 'FPP') {
            $get_total_dosen_selesai_fpp += $data->total_dosen;
            $get_total_matkul_selesai_fpp += $data->total_matkul;
            $get_total_prodi_selesai_fpp += $data->total_prodi;
        }
    }
} else {
    $get_total_matkul_done = 0;
    $get_total_dosen_done = 0;

    $get_total_dosen_selesai_fhtp = 0;
    $get_total_dosen_selesai_fmp = 0;
    $get_total_dosen_selesai_fpp = 0;

    $get_total_matkul_selesai_fhtp = 0;
    $get_total_matkul_selesai_fmp = 0;
    $get_total_matkul_selesai_fpp = 0;

    $get_total_prodi_selesai_fhtp = 0;
    $get_total_prodi_selesai_fmp = 0;
    $get_total_prodi_selesai_fpp = 0;
}

if ($get_all_total_berlangsung != false && !empty($get_all_total_berlangsung)) {
    $get_total_matkul_berlangsung = 0;
    $get_total_dosen_berlangsung = 0;

    $get_total_dosen_berlangsung_fhtp = 0;
    $get_total_dosen_berlangsung_fmp = 0;
    $get_total_dosen_berlangsung_fpp = 0;

    $get_total_matkul_berlangsung_fhtp = 0;
    $get_total_matkul_berlangsung_fmp = 0;
    $get_total_matkul_berlangsung_fpp = 0;

    $get_total_prodi_berlangsung_fhtp = 0;
    $get_total_prodi_berlangsung_fmp = 0;
    $get_total_prodi_berlangsung_fpp = 0;

    foreach ($get_all_total_berlangsung as $data) {
        $get_total_matkul_berlangsung += $data->total_matkul;
        $get_total_dosen_berlangsung += $data->total_dosen;

        if ($data->id_fakultas == 'FHTP') {
            $get_total_dosen_berlangsung_fhtp += $data->total_dosen;
            $get_total_prodi_berlangsung_fhtp += $data->total_prodi;
        }
        if ($data->id_fakultas == 'FMP') {
            $get_total_dosen_berlangsung_fmp += $data->total_dosen;
            $get_total_matkul_berlangsung_fmp += $data->total_matkul;
            $get_total_prodi_berlangsung_fmp += $data->total_prodi;
        }
        if ($data->id_fakultas == 'FPP') {
            $get_total_dosen_berlangsung_fpp += $data->total_dosen;
            $get_total_matkul_berlangsung_fpp += $data->total_matkul;
            $get_total_prodi_berlangsung_fpp += $data->total_prodi;
        }
    }
} else {
    $get_total_matkul_berlangsung = 0;
    $get_total_dosen_berlangsung = 0;

    $get_total_dosen_berlangsung_fhtp = 0;
    $get_total_dosen_berlangsung_fmp = 0;
    $get_total_dosen_berlangsung_fpp = 0;

    $get_total_matkul_berlangsung_fhtp = 0;
    $get_total_matkul_berlangsung_fmp = 0;
    $get_total_matkul_berlangsung_fpp = 0;

    $get_total_prodi_berlangsung_fhtp = 0;
    $get_total_prodi_berlangsung_fmp = 0;
    $get_total_prodi_berlangsung_fpp = 0;
}

if ($get_all_total_belum_mulai != false && !empty($get_all_total_belum_mulai)) {
    $get_total_matkul_belum_mulai = 0;
    $get_total_dosen_belum_mulai = 0;

    $get_total_dosen_belum_mulai_fhtp = 0;
    $get_total_dosen_belum_mulai_fmp = 0;
    $get_total_dosen_belum_mulai_fpp = 0;

    $get_total_matkul_belum_mulai_fhtp = 0;
    $get_total_matkul_belum_mulai_fmp = 0;
    $get_total_matkul_belum_mulai_fpp = 0;

    $get_total_prodi_belum_mulai_fhtp = 0;
    $get_total_prodi_belum_mulai_fmp = 0;
    $get_total_prodi_belum_mulai_fpp = 0;

    foreach ($get_all_total_belum_mulai as $data) {
        $get_total_matkul_belum_mulai += $data->total_matkul;
        $get_total_dosen_belum_mulai += $data->total_dosen;

        if ($data->id_fakultas == 'FHTP') {
            $get_total_dosen_belum_mulai_fhtp += $data->total_dosen;
            $get_total_matkul_belum_mulai_fhtp += $data->total_matkul;
            $get_total_prodi_belum_mulai_fhtp += $data->total_prodi;
        }
        if ($data->id_fakultas == 'FMP') {
            $get_total_dosen_belum_mulai_fmp += $data->total_dosen;
            $get_total_matkul_belum_mulai_fmp += $data->total_matkul;
            $get_total_prodi_belum_mulai_fmp += $data->total_prodi;
        }
        if ($data->id_fakultas == 'FPP') {
            $get_total_dosen_belum_mulai_fpp += $data->total_dosen;
            $get_total_matkul_belum_mulai_fpp += $data->total_matkul;
            $get_total_prodi_belum_mulai_fpp += $data->total_prodi;
        }
    }
} else {
    $get_total_matkul_belum_mulai = 0;
    $get_total_dosen_belum_mulai = 0;

    $get_total_dosen_belum_mulai_fhtp = 0;
    $get_total_dosen_belum_mulai_fmp = 0;
    $get_total_dosen_belum_mulai_fpp = 0;

    $get_total_matkul_belum_mulai_fhtp = 0;
    $get_total_matkul_belum_mulai_fmp = 0;
    $get_total_matkul_belum_mulai_fpp = 0;

    $get_total_prodi_belum_mulai_fhtp = 0;
    $get_total_prodi_belum_mulai_fmp = 0;
    $get_total_prodi_belum_mulai_fpp = 0;
}

if ($get_count_status_monitoring != false && !empty($get_count_status_monitoring)) {
    $get_pembelajaran_belum_mulai = 0;
    $get_pembelajaran_berlangsung = 0;
    $get_pembelajaran_selesai = 0;

    foreach ($get_count_status_monitoring as $data) {
        $get_status = $data->StatusMonitoring;
        if ($get_status == 'Belum Mulai') {
            $get_pembelajaran_belum_mulai = $data->TotalMonitoring;
        } else if ($get_status == 'Sedang Berlangsung') {
            $get_pembelajaran_berlangsung = $data->TotalMonitoring;
        } else {
            $get_pembelajaran_selesai = $data->TotalMonitoring;
        }
    }
} else {
    $get_pembelajaran_belum_mulai = 0;
    $get_pembelajaran_berlangsung = 0;
    $get_pembelajaran_selesai = 0;
}

if ($get_count_status_prodi != false && !empty($get_count_status_prodi)) {
    $get_prodi_belum_mulai = 0;
    $get_prodi_berlangsung = 0;
    $get_prodi_selesai = 0;

    foreach ($get_count_status_prodi as $data) {
        $get_status = $data->StatusMonitoring;
        if ($get_status == 'Belum Mulai') {
            $get_prodi_belum_mulai = $data->TotalProdi;
        } else if ($get_status == 'Sedang Berlangsung') {
            $get_prodi_berlangsung = $data->TotalProdi;
        } else {
            $get_prodi_selesai = $data->TotalProdi;
        }
    }
} else {
    $get_prodi_belum_mulai = 0;
    $get_prodi_berlangsung = 0;
    $get_prodi_selesai = 0;
}
?>

<!-- Dashboard -->
<section id="home" class="w3l-banner py-5">
    <div id="particles-js"></div>
    <script src="<?php echo base_url('assets/frontend/js/particles.min.js'); ?>"></script>

    <div class="banner-content">

        <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 22 || $this->session->userdata('role') == 29 || $this->session->userdata('role') == 30 || $this->session->userdata('role') == 31 || $this->session->userdata('role') == 32 || $this->session->userdata('role') == 33 || $this->session->userdata('role') == 34 || $this->session->userdata('role') == 35 || $this->session->userdata('role') == 36 || $this->session->userdata('role') == 37 || $this->session->userdata('role') == 38) { ?>
            <div class="container mt-5">
                <div class="card shadow text-center mb-3 mt-5 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                    <div class="card-header" style="background-color:#D3E0EA; border-radius: 1rem !important;">
                        <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-dark" data-toggle="collapse" data-target="#cardchart"><i class="fa fa-expand"></i> Monitoring Pembelajaran (<?= date('d-M-Y'); ?>)</a>
                    </div>
                    <div id="cardchart" class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-8">
                                <p>*Chart jumlah status monitoring pembelajaran daring</p>
                                <canvas id="myChart3"></canvas>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-block btn-danger btn-lg mt-5 mx-auto" data-toggle="modal" data-target="#modal_mulai"><b><?= $get_pembelajaran_belum_mulai; ?></b> Belum Dimulai</button>
                                <button type="button" class="btn btn-block btn-warning btn-lg mt-2" data-toggle="modal" data-target="#modal_berlangsung"><b><?= $get_pembelajaran_berlangsung; ?></b> Berlangsung</button>
                                <button type="button" class="btn btn-block btn-primary btn-lg mt-2" data-toggle="modal" data-target="#modal_selesai"><b><?= $get_pembelajaran_selesai; ?></b> Selesai</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow text-center mb-3 mt-5 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                    <div class="card-header" style="background-color:#D3E0EA; border-radius: 1rem !important;">
                        <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-dark" data-toggle="collapse" data-target="#cardatas"><i class="fa fa-expand"></i> Monitoring Pembelajaran (<?= date('d-M-Y'); ?>)</a>
                    </div>
                    <div id="cardatas" class="card-body">

                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#7952B3;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#7952B3;" data-toggle="modal" data-target="#kelas_total">
                                            <h3 class="text-light"> <?= $get_total_kelas; ?> </h3>
                                        </button>
                                        <p class="text-light"> KELAS </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#7952B3;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#7952B3;" data-toggle="modal" data-target="#kelas_belum_mulai">
                                            <h3 class="text-light"> <?= $get_kelas_belum_mulai; ?> </h3>
                                        </button>
                                        <p class="text-light"> BELUM MULAI </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#7952B3;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#7952B3;" data-toggle="modal" data-target="#kelas_berlangsung">
                                            <h3 class="text-light"> <?= $get_kelas_berlangsung; ?> </h3>
                                        </button>
                                        <p class="text-light"> BERLANGSUNG </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#7952B3;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#7952B3;" data-toggle="modal" data-target="#kelas_selesai">
                                            <h3 class="text-light"> <?= $get_kelas_selesai; ?> </h3>
                                        </button>
                                        <p class="text-light"> SELESAI </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_total_dosen; ?> </h3>
                                        <p class="text-light"> DOSEN </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseDosen">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_total_dosen_belum_mulai; ?> </h3>
                                        <p class="text-light"> BELUM MULAI </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseDosenBelumMulai">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_total_dosen_berlangsung; ?> </h3>
                                        <p class="text-light"> BERLANGSUNG </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseDosenBerlangsung">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_total_dosen_done; ?> </h3>
                                        <p class="text-light"> SELESAI </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseDosenSelesai">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseDosen" class="col-lg-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <p class="text-light"> Total Dosen </p>
                                        <p class="text-light"> FHTP : <?= $get_total_dosen_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_dosen_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_dosen_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseDosenBelumMulai" class="col-lg-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <p class="text-light"> Total Dosen Belum Mulai </p>
                                        <p class="text-light"> FHTP : <?= $get_total_dosen_belum_mulai_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_dosen_belum_mulai_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_dosen_belum_mulai_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseDosenBerlangsung" class="col-lg-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <p class="text-light"> Total Dosen Sedang Berlangsung </p>
                                        <p class="text-light"> FHTP : <?= $get_total_dosen_berlangsung_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_dosen_berlangsung_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_dosen_berlangsung_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseDosenSelesai" class="col-lg-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <p class="text-light"> Total Dosen Selesai </p>
                                        <p class="text-light"> FHTP : <?= $get_total_dosen_selesai_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_dosen_selesai_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_dosen_selesai_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_total_matkul; ?> </h3>
                                        <p class="text-light"> MATAKULIAH </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseMatkul">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_total_matkul_belum_mulai; ?> </h3>
                                        <p class="text-light"> BELUM MULAI </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseMatkulBelumMulai">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_total_matkul_berlangsung; ?> </h3>
                                        <p class="text-light"> BERLANGSUNG </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseMatkulBerlangsung">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_total_matkul_done; ?> </h3>
                                        <p class="text-light"> SELESAI </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseMatkulSelesai">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseMatkul" class="col-lg-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <p class="text-light"> Total Matakuliah </p>
                                        <p class="text-light"> FHTP : <?= $get_total_matkul_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_matkul_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_matkul_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseMatkulBelumMulai" class="col-lg-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <p class="text-light"> Total Matakuliah Belum Mulai</p>
                                        <p class="text-light"> FHTP : <?= $get_total_matkul_belum_mulai_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_matkul_belum_mulai_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_matkul_belum_mulai_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseMatkulBerlangsung" class="col-lg-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <p class="text-light"> Total Matakuliah Berlangsung</p>
                                        <p class="text-light"> FHTP : <?= $get_total_matkul_berlangsung_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_matkul_berlangsung_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_matkul_berlangsung_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseMatkulSelesai" class="col-lg-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <p class="text-light"> Total Matakuliah Selesai</p>
                                        <p class="text-light"> FHTP : <?= $get_total_matkul_selesai_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_matkul_selesai_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_matkul_selesai_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_total_prodi; ?> </h3>
                                        <p class="text-light"> PRODI </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseProdi">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_prodi_belum_mulai; ?> </h3>
                                        <p class="text-light"> BELUM MULAI </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseProdiBelumMulai">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_prodi_berlangsung; ?> </h3>
                                        <p class="text-light"> BERLANGSUNG </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseProdiBerlangsung">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <h3 class="text-light"> <?= $get_prodi_selesai; ?> </h3>
                                        <p class="text-light"> SELESAI </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseProdiSelesai">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseProdi" class="col-md-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <p class="text-light"> Total Prodi </p>
                                        <p class="text-light"> FHTP : <?= $get_total_prodi_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_prodi_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_prodi_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseProdiBelumMulai" class="col-md-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <p class="text-light"> Total Prodi Belum Mulai</p>
                                        <p class="text-light"> FHTP : <?= $get_total_prodi_belum_mulai_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_prodi_belum_mulai_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_prodi_belum_mulai_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseProdiBerlangsung" class="col-md-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <p class="text-light"> Total Prodi Berlangsung</p>
                                        <p class="text-light"> FHTP : <?= $get_total_prodi_berlangsung_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_prodi_berlangsung_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_prodi_berlangsung_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseProdiSelesai" class="col-md-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <p class="text-light"> Total Prodi Selesai</p>
                                        <p class="text-light"> FHTP : <?= $get_total_prodi_selesai_fhtp; ?> </p>
                                        <p class="text-light"> FMP : <?= $get_total_prodi_selesai_fmp; ?> </p>
                                        <p class="text-light"> FPP : <?= $get_total_prodi_selesai_fpp; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAKULTAS -->
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="card-box" style="background-color:#035397;">
                                    <div class="inner">

                                        <h3 class="text-light"> <?= $get_total_fakultas; ?> </h3>
                                        <p class="text-light"> FAKULTAS </p>
                                    </div>
                                    <a href="javascript:;" class="card-box-footer" data-toggle="collapse" data-target="#collapseFakultas">View More <i class="fa fa-arrow-circle-down"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="collapseFakultas" class="col-md-12 col-sm-6 collapse In">
                                <div class="card-box" style="background-color:#035397;">
                                    <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                        foreach ($get_summary_fakultas as $data) { ?>
                                            <p class="text-light"> <?= $data->id_fakultas; ?> </p>
                                    <?php
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <!-- // FAKULTAS -->

                    </div>
                </div>
            </div>

            <!-- MODAL TOTAL KELAS -->
            <div class="container">
                <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="kelas_total" tabindex="-1" role="dialog" aria-labelledby="detailmodalkelastotal" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-light" id="detailmodalkelastotal">Kelas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark">Daftar pembelajaran</p>

                                    <div class="card shadow" style="width: 18rem;">
                                        <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                            $get_total_kelas1 = 0;
                                            $get_total_kelas2 = 0;
                                            $get_total_kelas3 = 0;

                                            if ($get_all_total_kelas != false && !empty($get_all_total_kelas)) {
                                                foreach ($get_all_total_kelas as $dataxxx) {
                                                    if ($dataxxx->id_fakultas == 'FHTP') {
                                                        $data_kelas_ex_det1 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas1 += count($data_kelas_ex_det1);
                                                    }
                                                    if ($dataxxx->id_fakultas == 'FMP') {
                                                        $data_kelas_ex_det2 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas2 += count($data_kelas_ex_det2);
                                                    }
                                                    if ($dataxxx->id_fakultas == 'FPP') {
                                                        $data_kelas_ex_det3 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas3 += count($data_kelas_ex_det3);
                                                    }
                                                }
                                            }
                                            foreach ($get_summary_fakultas as $data) {
                                                if ($data->id_fakultas == 'FHTP') {
                                                    echo "
                                                <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas1 Kelas</li>";
                                                }
                                                if ($data->id_fakultas == 'FMP') {
                                                    echo "
                                                <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas2 Kelas</li>";
                                                }
                                                if ($data->id_fakultas == 'FPP') {
                                                    echo "
                                                <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas3 Kelas</li>";
                                                }
                                            }
                                        } ?>
                                    </div>

                                    <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                        <div class="col-md-12 my-5">
                                            <div class="table-responsive mx-2">
                                                <table class="table table-hover table-xl" id="tabel_kelas_total">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Dosen</th>
                                                            <th>Matakuliah</th>
                                                            <th>Jam</th>
                                                            <th>Kelas</th>
                                                            <th>Prodi</th>
                                                            <th>Fakultas</th>
                                                            <th>Angkatan</th>
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

            <!-- MODAL TOTAL KELAS BELUM MULAI -->
            <div class="container">
                <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="kelas_belum_mulai" tabindex="-1" role="dialog" aria-labelledby="detailmodalkelas_belum_mulai" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-light" id="detailmodalkelas_belum_mulai">Kelas Belum Mulai</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark">Daftar pembelajaran</p>

                                    <div class="card shadow" style="width: 18rem;">
                                        <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                            $get_total_kelas1 = 0;
                                            $get_total_kelas2 = 0;
                                            $get_total_kelas3 = 0;
                                            if ($get_all_kelas_belum_mulai != false && !empty($get_all_kelas_belum_mulai)) {
                                                foreach ($get_all_kelas_belum_mulai as $dataxxx) {
                                                    if ($dataxxx->id_fakultas == 'FHTP') {
                                                        $data_kelas_ex_det1 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas1 += count($data_kelas_ex_det1);
                                                    }
                                                    if ($dataxxx->id_fakultas == 'FMP') {
                                                        $data_kelas_ex_det2 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas2 += count($data_kelas_ex_det2);
                                                    }
                                                    if ($dataxxx->id_fakultas == 'FPP') {
                                                        $data_kelas_ex_det3 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas3 += count($data_kelas_ex_det3);
                                                    }
                                                }
                                            }
                                            foreach ($get_summary_fakultas as $data) {
                                                if ($data->id_fakultas == 'FHTP') {
                                                    echo "
                                        <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas1 Kelas</li>";
                                                }
                                                if ($data->id_fakultas == 'FMP') {
                                                    echo "
                                        <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas2 Kelas</li>";
                                                }
                                                if ($data->id_fakultas == 'FPP') {
                                                    echo "
                                        <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas3 Kelas</li>";
                                                }
                                            }
                                        } ?>
                                    </div>

                                    <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                        <div class="col-md-12 my-5">
                                            <div class="table-responsive mx-2">
                                                <table class="table table-hover table-xl" id="tabel_kelas_belum_mulai">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Dosen</th>
                                                            <th>Matakuliah</th>
                                                            <th>Jam</th>
                                                            <th>Kelas</th>
                                                            <th>Prodi</th>
                                                            <th>Fakultas</th>
                                                            <th>Angkatan</th>
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

            <!-- MODAL TOTAL KELAS BERLANGSUNG -->
            <div class="container">
                <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="kelas_berlangsung" tabindex="-1" role="dialog" aria-labelledby="detailmodalkelas_berlangsung" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-light" id="detailmodalkelas_berlangsung">Kelas Berlangsung</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark">Daftar pembelajaran</p>

                                    <div class="card shadow" style="width: 18rem;">
                                        <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                            $get_total_kelas1 = 0;
                                            $get_total_kelas2 = 0;
                                            $get_total_kelas3 = 0;
                                            if ($get_all_kelas_berlangsung != false && !empty($get_all_kelas_berlangsung)) {
                                                foreach ($get_all_kelas_berlangsung as $dataxxx) {
                                                    if ($dataxxx->id_fakultas == 'FHTP') {
                                                        $data_kelas_ex_det1 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas1 += count($data_kelas_ex_det1);
                                                    }
                                                    if ($dataxxx->id_fakultas == 'FMP') {
                                                        $data_kelas_ex_det2 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas2 += count($data_kelas_ex_det2);
                                                    }
                                                    if ($dataxxx->id_fakultas == 'FPP') {
                                                        $data_kelas_ex_det3 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas3 += count($data_kelas_ex_det3);
                                                    }
                                                }
                                            }
                                            foreach ($get_summary_fakultas as $data) {
                                                if ($data->id_fakultas == 'FHTP') {
                                                    echo "
                                <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas1 Kelas</li>";
                                                }
                                                if ($data->id_fakultas == 'FMP') {
                                                    echo "
                                <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas2 Kelas</li>";
                                                }
                                                if ($data->id_fakultas == 'FPP') {
                                                    echo "
                                <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas3 Kelas</li>";
                                                }
                                            }
                                        } ?>
                                    </div>

                                    <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                        <div class="col-md-12 my-5">
                                            <div class="table-responsive mx-2">
                                                <table class="table table-hover table-xl" id="tabel_kelas_berlangsung">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Dosen</th>
                                                            <th>Matakuliah</th>
                                                            <th>Jam</th>
                                                            <th>Kelas</th>
                                                            <th>Prodi</th>
                                                            <th>Fakultas</th>
                                                            <th>Angkatan</th>
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

            <!-- MODAL TOTAL KELAS SELESAI -->
            <div class="container">
                <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="kelas_selesai" tabindex="-1" role="dialog" aria-labelledby="detailmodalkelas_selesai" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-light" id="detailmodalkelas_selesai">Kelas Selesai</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark">Daftar pembelajaran</p>

                                    <div class="card shadow" style="width: 18rem;">
                                        <?php if ($get_summary_fakultas != false && !empty($get_summary_fakultas)) {
                                            $get_total_kelas1 = 0;
                                            $get_total_kelas2 = 0;
                                            $get_total_kelas3 = 0;
                                            if ($get_all_kelas_selesai != false && !empty($get_all_kelas_selesai)) {
                                                foreach ($get_all_kelas_selesai as $dataxxx) {
                                                    if ($dataxxx->id_fakultas == 'FHTP') {
                                                        $data_kelas_ex_det1 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas1 += count($data_kelas_ex_det1);
                                                    }
                                                    if ($dataxxx->id_fakultas == 'FMP') {
                                                        $data_kelas_ex_det2 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas2 += count($data_kelas_ex_det2);
                                                    }
                                                    if ($dataxxx->id_fakultas == 'FPP') {
                                                        $data_kelas_ex_det3 = explode(',', $dataxxx->kelas);
                                                        $get_total_kelas3 += count($data_kelas_ex_det3);
                                                    }
                                                }
                                            }
                                            foreach ($get_summary_fakultas as $data) {
                                                if ($data->id_fakultas == 'FHTP') {
                                                    echo "
                        <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas1 Kelas</li>";
                                                }
                                                if ($data->id_fakultas == 'FMP') {
                                                    echo "
                        <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas2 Kelas</li>";
                                                }
                                                if ($data->id_fakultas == 'FPP') {
                                                    echo "
                        <li class=\"list-group-item\">$data->id_fakultas : $get_total_kelas3 Kelas</li>";
                                                }
                                            }
                                        } ?>
                                    </div>

                                    <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                        <div class="col-md-12 my-5">
                                            <div class="table-responsive mx-2">
                                                <table class="table table-hover table-xl" id="tabel_kelas_selesai">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Dosen</th>
                                                            <th>Matakuliah</th>
                                                            <th>Jam</th>
                                                            <th>Kelas</th>
                                                            <th>Prodi</th>
                                                            <th>Fakultas</th>
                                                            <th>Angkatan</th>
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

            <!-- modal belum dimulai -->
            <div class="container">
                <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="modal_mulai" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-light" id="detailModalLabel">Status Monitoring Pembelajaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <p>Daftar Pembelajaran <b>Belum dimulai</b></p>
                                    </center>
                                    <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                        <div class="col-md-12 my-5">
                                            <div class="table-responsive mx-2">
                                                <div class="container">
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
                                                                <th>Angkatan</th>
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
            </div>

            <!-- modal sedang berlangsung -->
            <div class="container">
                <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="modal_berlangsung" tabindex="-1" role="dialog" aria-labelledby="detailModalLabelBerlangsung" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-light" id="detailModalLabelBerlangsung">Status Monitoring Pembelajaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-light">Daftar pembelajaran <b>Sedang Berlangsung</b></p>
                                    <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                        <div class="col-md-12 my-5">
                                            <div class="table-responsive mx-2">
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
                                                            <th>Angkatan</th>
                                                            <th>Link</th>
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

            <!-- modal telah selesai -->
            <div class="container">
                <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="modal_selesai" tabindex="-1" role="dialog" aria-labelledby="detailModalLabelSelesai" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-light" id="detailModalLabelSelesai">Status Monitoring Pembelajaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-light">Daftar pembelajaran <b>Telah Selesai</b></p>
                                    <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                        <div class="col-md-12 my-5">
                                            <div class="table-responsive mx-2">
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
                                                            <th>Angkatan</th>
                                                            <th>Gambar</th>
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
        <?php } ?>

        <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 24 || $this->session->userdata('role') == 39 || $this->session->userdata('role') == 40) { ?>
            <div class="container">
                <div class="card shadow text-center mb-3 mt-5 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                    <div class="card-header" style="background-color:#D3E0EA; border-radius: 1rem !important;">
                        <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-dark" data-toggle="collapse" data-target="#cardpresensiatas"><i class="fa fa-expand"></i> Rekapitulasi Data Presensi Kehadiran Tanggal <?= date('d-M-Y'); ?></a>
                    </div>
                    <div id="cardpresensiatas" class="card-body">

                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#7952B3;">
                                    <div class="inner">
                                        <!-- <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#7952B3;" data-toggle="modal" data-target="#presensi_total"> -->
                                        <h3 class="text-light">
                                            <?php
                                            $data_countx1 = 0;
                                            $data_countx4 = 0;
                                            $data_countx7 = 0;
                                            $data_countx10 = 0;
                                            if ($count_get_absen_perkampus_dosen != false && !empty($count_get_absen_perkampus_dosen)) {
                                                foreach ($count_get_absen_perkampus_dosen as $datax) {
                                                    $data_countx1 += $datax->total;
                                                }
                                                $data_countx1 = $data_countx1;
                                            } else {
                                                $data_countx1 = 0;
                                            }

                                            if ($count_get_absen_perkampus_pns != false && !empty($count_get_absen_perkampus_pns)) {
                                                foreach ($count_get_absen_perkampus_pns as $datax) {
                                                    $data_countx4 += $datax->total;
                                                }
                                                $data_countx4 = $data_countx4;
                                            } else {
                                                $data_countx4 = 0;
                                            }

                                            if ($count_get_absen_perkampus_thl != false && !empty($count_get_absen_perkampus_thl)) {
                                                foreach ($count_get_absen_perkampus_thl as $datax) {
                                                    $data_countx7 += $datax->total;
                                                }
                                                $data_countx7 = $data_countx7;
                                            } else {
                                                $data_countx7 = 0;
                                            }

                                            if ($count_get_absen_perkampus_ta != false && !empty($count_get_absen_perkampus_ta)) {
                                                foreach ($count_get_absen_perkampus_ta as $datax) {
                                                    $data_countx10 += $datax->total;
                                                }
                                                $data_countx10 = $data_countx10;
                                            } else {
                                                $data_countx10 = 0;
                                            }

                                            $total_presensi = $data_countx1 + $data_countx4 + $data_countx7 + $data_countx10;
                                            echo $total_presensi;
                                            ?>
                                        </h3>
                                        <!-- </button> -->
                                        <p class="text-light"> TOTAL </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#7952B3;">
                                    <div class="inner">
                                        <!-- <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#7952B3;" data-toggle="modal" data-target="#presensi_total_masuk"> -->
                                        <h3 class="text-light">
                                            <?php
                                            $data_countx2 = 0;
                                            $data_countx5 = 0;
                                            $data_countx8 = 0;
                                            $data_countx11 = 0;
                                            if ($count_get_absen_perkampus_dosen_masuk != false && !empty($count_get_absen_perkampus_dosen_masuk)) {
                                                foreach ($count_get_absen_perkampus_dosen_masuk as $datax) {
                                                    $data_countx2 += $datax->total;
                                                }
                                                $data_countx2 = $data_countx2;
                                            } else {
                                                $data_countx2 = 0;
                                            }

                                            if ($count_get_absen_perkampus_pns_masuk != false && !empty($count_get_absen_perkampus_pns_masuk)) {
                                                foreach ($count_get_absen_perkampus_pns_masuk as $datax) {
                                                    $data_countx5 += $datax->total;
                                                }
                                                $data_countx5 = $data_countx5;
                                            } else {
                                                $data_countx5 = 0;
                                            }

                                            if ($count_get_absen_perkampus_thl_masuk != false && !empty($count_get_absen_perkampus_thl_masuk)) {
                                                foreach ($count_get_absen_perkampus_thl_masuk as $datax) {
                                                    $data_countx8 += $datax->total;
                                                }
                                                $data_countx8 = $data_countx8;
                                            } else {
                                                $data_countx8 = 0;
                                            }

                                            if ($count_get_absen_perkampus_ta_masuk != false && !empty($count_get_absen_perkampus_ta_masuk)) {
                                                foreach ($count_get_absen_perkampus_ta_masuk as $datax) {
                                                    $data_countx11 += $datax->total;
                                                }
                                                $data_countx11 = $data_countx11;
                                            } else {
                                                $data_countx11 = 0;
                                            }

                                            $total_presensi_masuk = $data_countx2 + $data_countx5 + $data_countx8 + $data_countx11;
                                            echo $total_presensi_masuk;
                                            ?>
                                        </h3>
                                        <!-- </button> -->
                                        <p class="text-light"> PRESENSI MASUK </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#7952B3;">
                                    <div class="inner">
                                        <!-- <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#7952B3;" data-toggle="modal" data-target="#presensi_total_pulang"> -->
                                        <h3 class="text-light">
                                            <?php
                                            $data_countx3 = 0;
                                            $data_countx6 = 0;
                                            $data_countx9 = 0;
                                            $data_countx12 = 0;
                                            if ($count_get_absen_perkampus_dosen_pulang != false && !empty($count_get_absen_perkampus_dosen_pulang)) {
                                                foreach ($count_get_absen_perkampus_dosen_pulang as $datax) {
                                                    $data_countx3 += $datax->total;
                                                }
                                                $data_countx3 = $data_countx3;
                                            } else {
                                                $data_countx3 = 0;
                                            }

                                            if ($count_get_absen_perkampus_pns_pulang != false && !empty($count_get_absen_perkampus_pns_pulang)) {
                                                foreach ($count_get_absen_perkampus_pns_pulang as $datax) {
                                                    $data_countx6 += $datax->total;
                                                }
                                                $data_countx6 = $data_countx6;
                                            } else {
                                                $data_countx6 = 0;
                                            }

                                            if ($count_get_absen_perkampus_thl_pulang != false && !empty($count_get_absen_perkampus_thl_pulang)) {
                                                foreach ($count_get_absen_perkampus_thl_pulang as $datax) {
                                                    $data_countx9 += $datax->total;
                                                }
                                                $data_countx9 = $data_countx9;
                                            } else {
                                                $data_countx9 = 0;
                                            }

                                            if ($count_get_absen_perkampus_ta_pulang != false && !empty($count_get_absen_perkampus_ta_pulang)) {
                                                foreach ($count_get_absen_perkampus_ta_pulang as $datax) {
                                                    $data_countx12 += $datax->total;
                                                }
                                                $data_countx12 = $data_countx12;
                                            } else {
                                                $data_countx12 = 0;
                                            }

                                            $total_presensi_pulang = $data_countx3 + $data_countx6 + $data_countx9 + $data_countx12;
                                            echo $total_presensi_pulang;
                                            ?>
                                        </h3>
                                        <!-- </button> -->
                                        <p class="text-light"> PRESENSI PULANG </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#346751;" data-toggle="modal" data-target="#presensi_total_dosen">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count1 = 0;
                                                if ($count_get_absen_perkampus_dosen != false && !empty($count_get_absen_perkampus_dosen)) {
                                                    foreach ($count_get_absen_perkampus_dosen as $datax) {
                                                        $data_count1 += $datax->total; ?>
                                                <?php }
                                                    echo $data_count1;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> DOSEN </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#346751;" data-toggle="modal" data-target="#presensi_total_dosen_masuk">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count2 = 0;
                                                if ($count_get_absen_perkampus_dosen_masuk != false && !empty($count_get_absen_perkampus_dosen_masuk)) {
                                                    foreach ($count_get_absen_perkampus_dosen_masuk as $datax) {
                                                        $data_count2 += $datax->total; ?>
                                                <?php }
                                                    echo $data_count2;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> PRESENSI MASUK </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#346751;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#346751;" data-toggle="modal" data-target="#presensi_total_dosen_pulang">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count3 = 0;
                                                if ($count_get_absen_perkampus_dosen_pulang != false && !empty($count_get_absen_perkampus_dosen_pulang)) {
                                                    foreach ($count_get_absen_perkampus_dosen_pulang as $datax) {
                                                        $data_count3 += $datax->total; ?>
                                                <?php }
                                                    echo $data_count3;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> PRESENSI PULANG </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#C84B31;" data-toggle="modal" data-target="#presensi_total_pns">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count4 = 0;
                                                if ($count_get_absen_perkampus_pns != false && !empty($count_get_absen_perkampus_pns)) {
                                                    foreach ($count_get_absen_perkampus_pns as $datax) {
                                                        $data_count4 += $datax->total; ?>
                                                <?php }
                                                    echo $data_count4;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> PNS </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#C84B31;" data-toggle="modal" data-target="#presensi_total_pns_masuk">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count5 = 0;
                                                if ($count_get_absen_perkampus_pns_masuk != false && !empty($count_get_absen_perkampus_pns_masuk)) {
                                                    foreach ($count_get_absen_perkampus_pns_masuk as $datax) {
                                                        $data_count5 += $datax->total; ?>
                                                <?php }
                                                    echo $data_count5;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> PRESENSI MASUK </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#C84B31;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#C84B31;" data-toggle="modal" data-target="#presensi_total_pns_pulang">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count6 = 0;
                                                if ($count_get_absen_perkampus_pns_pulang != false && !empty($count_get_absen_perkampus_pns_pulang)) {
                                                    foreach ($count_get_absen_perkampus_pns_pulang as $datax) {
                                                        $data_count6 += $datax->total; ?>
                                                <?php }
                                                    echo $data_count6;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> PRESENSI PULANG </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#AF0069;" data-toggle="modal" data-target="#presensi_total_thl">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count7 = 0;
                                                if ($count_get_absen_perkampus_thl != false && !empty($count_get_absen_perkampus_thl)) {
                                                    foreach ($count_get_absen_perkampus_thl as $datax) {
                                                        $data_count7 += $datax->total; ?>
                                                <?php }
                                                    echo $data_count7;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> THL </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#AF0069;" data-toggle="modal" data-target="#presensi_total_thl_masuk">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count8 = 0;
                                                if ($count_get_absen_perkampus_thl_masuk != false && !empty($count_get_absen_perkampus_thl_masuk)) {
                                                    foreach ($count_get_absen_perkampus_thl_masuk as $datax) {
                                                        $data_count8 += $datax->total; ?>
                                                <?php }
                                                    echo $data_count8;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> PRESENSI MASUK </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#AF0069;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#AF0069;" data-toggle="modal" data-target="#presensi_total_thl_pulang">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count9 = 0;
                                                if ($count_get_absen_perkampus_thl_pulang != false && !empty($count_get_absen_perkampus_thl_pulang)) {
                                                    foreach ($count_get_absen_perkampus_thl_pulang as $datax) {
                                                        $data_count9 += $datax->total; ?>
                                                <?php }
                                                    echo $data_count9;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> PRESENSI PULANG </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#035397;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#035397;" data-toggle="modal" data-target="#presensi_total_ta">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count10 = 0;
                                                if ($count_get_absen_perkampus_ta != false && !empty($count_get_absen_perkampus_ta)) {
                                                    foreach ($count_get_absen_perkampus_ta as $datax) {
                                                        $data_count10 += $datax->total;
                                                    }
                                                    echo $data_count10;
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> TA </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#035397;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#035397;" data-toggle="modal" data-target="#presensi_total_ta_masuk">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count11 = 0;
                                                if ($count_get_absen_perkampus_ta_masuk != false && !empty($count_get_absen_perkampus_ta_masuk)) {
                                                    foreach ($count_get_absen_perkampus_ta_masuk as $datax) {
                                                        $data_count11 += $datax->total;
                                                    }
                                                    echo $data_count11;
                                                } else {
                                                    echo 0;
                                                }
                                                // if (date("H:i:s") > "08:00:00" && date("H:i:s") < "17:00:00") {
                                                //     echo 4;
                                                // } else {
                                                //     echo 0;
                                                // }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> PRESENSI MASUK </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-box" style="background-color:#035397;">
                                    <div class="inner">
                                        <button type="button" class="btn btn-block btn-lg mt-2" style="background-color:#035397;" data-toggle="modal" data-target="#presensi_total_ta_pulang">
                                            <h3 class="text-light">
                                                <?php
                                                $data_count12 = 0;
                                                if ($count_get_absen_perkampus_ta_pulang != false && !empty($count_get_absen_perkampus_ta_pulang)) {
                                                    foreach ($count_get_absen_perkampus_ta_pulang as $datax) {
                                                        $data_count12 += $datax->total;
                                                    }
                                                    echo $data_count12;
                                                } else {
                                                    echo 0;
                                                }

                                                // if (date("H:i:s") > "17:00:00" && date("H:i:s") < "00:00:00") {
                                                //     echo 4;
                                                // } else {
                                                //     echo 0;
                                                // }
                                                ?>
                                            </h3>
                                        </button>
                                        <p class="text-light"> PRESENSI PULANG </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- MODAL PRESENSI TOTAL DOSEN -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_dosen" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotaldosen" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotaldosen">PRESENSI DOSEN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php if ($count_get_absen_perkampus_dosen != false && !empty($count_get_absen_perkampus_dosen)) {
                                                        foreach ($count_get_absen_perkampus_dosen as $dataxxx) {
                                                            echo "
                                                        <tr>
                                                            <th>$dataxxx->kampus</th>
                                                            <th>$dataxxx->total Pegawai</th>
                                                        </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                            <tr>
                                                                <th>Tidak Ada Presensi Dosen</th>
                                                            </tr>";
                                                    }  ?>
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

        <!-- MODAL PRESENSI TOTAL DOSEN MASUK -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_dosen_masuk" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotaldosenmasuk" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotaldosenmasuk">PRESENSI MASUK DOSEN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php if ($count_get_absen_perkampus_dosen_masuk != false && !empty($count_get_absen_perkampus_dosen_masuk)) {
                                                        foreach ($count_get_absen_perkampus_dosen_masuk as $dataxxx) {
                                                            echo "
                                                                <tr>
                                                                    <th>$dataxxx->kampus</th>
                                                                    <th>$dataxxx->total Pegawai</th>
                                                                </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                            <tr>
                                                                <th>Tidak Ada Presensi Masuk Dosen</th>
                                                            </tr>";
                                                    } ?>
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

        <!-- MODAL PRESENSI TOTAL DOSEN PULANG -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_dosen_pulang" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotaldosenpulang" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotaldosenpulang">PRESENSI PULANG DOSEN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php if ($count_get_absen_perkampus_dosen_pulang != false && !empty($count_get_absen_perkampus_dosen_pulang)) {
                                                        foreach ($count_get_absen_perkampus_dosen_pulang as $dataxxx) {
                                                            echo "
                                                                <tr>
                                                                    <th>$dataxxx->kampus</th>
                                                                    <th>$dataxxx->total Pegawai</th>
                                                                </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                            <tr>
                                                                <th>Tidak Ada Presensi Pulang Dosen</th>
                                                            </tr>";
                                                    } ?>
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

        <!-- MODAL PRESENSI TOTAL PNS -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_pns" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotalpns" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotalpns">PRESENSI PNS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php if ($count_get_absen_perkampus_pns != false && !empty($count_get_absen_perkampus_pns)) {
                                                        foreach ($count_get_absen_perkampus_pns as $dataxxx) {
                                                            echo "
                                                                <tr>
                                                                    <th>$dataxxx->bagian</th>
                                                                    <th>$dataxxx->total Pegawai</th>
                                                                </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                            <tr>
                                                                <th>Tidak Ada Presensi Pulang PNS</th>
                                                            </tr>";
                                                    } ?>
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

        <!-- MODAL PRESENSI TOTAL PNS MASUK -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_pns_masuk" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotalpnsmasuk" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotalpnsmasuk">PRESENSI MASUK PNS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php if ($count_get_absen_perkampus_pns_masuk != false && !empty($count_get_absen_perkampus_pns_masuk)) {
                                                        foreach ($count_get_absen_perkampus_pns_masuk as $dataxxx) {
                                                            echo "
                                                                <tr>
                                                                    <th>$dataxxx->bagian</th>
                                                                    <th>$dataxxx->total Pegawai</th>
                                                                </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                            <tr>
                                                                <th>Tidak Ada Presensi Masuk PNS</th>
                                                            </tr>";
                                                    } ?>
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

        <!-- MODAL PRESENSI TOTAL PNS PULANG -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_pns_pulang" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotalpnspulang" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotalpnspulang">PRESENSI PULANG PNS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php if ($count_get_absen_perkampus_pns_pulang != false && !empty($count_get_absen_perkampus_pns_pulang)) {
                                                        foreach ($count_get_absen_perkampus_pns_pulang as $dataxxx) {
                                                            echo "
                                                                <tr>
                                                                    <th>$dataxxx->bagian</th>
                                                                    <th>$dataxxx->total Pegawai</th>
                                                                </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                            <tr>
                                                                <th>Tidak Ada Presensi Pulang PNS</th>
                                                            </tr>";
                                                    } ?>
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

        <!-- MODAL PRESENSI TOTAL THL -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_thl" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotalthl" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotalthl">PRESENSI THL</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php if ($count_get_absen_perkampus_thl != false && !empty($count_get_absen_perkampus_thl)) {
                                                        foreach ($count_get_absen_perkampus_thl as $dataxxx) {
                                                            echo "
                                                                <tr>
                                                                    <th>$dataxxx->nama_satker</th>
                                                                    <th>$dataxxx->total Pegawai</th>
                                                                </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                            <tr>
                                                                <th>Tidak Ada Presensi THL</th>
                                                            </tr>";
                                                    } ?>
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

        <!-- MODAL PRESENSI TOTAL THL MASUK -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_thl_masuk" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotalthlmasuk" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotalthlmasuk">PRESENSI MASUK THL</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php if ($count_get_absen_perkampus_thl_masuk != false && !empty($count_get_absen_perkampus_thl_masuk)) {
                                                        foreach ($count_get_absen_perkampus_thl_masuk as $dataxxx) {
                                                            echo "
                                                                <tr>
                                                                    <th>$dataxxx->nama_satker</th>
                                                                    <th>$dataxxx->total Pegawai</th>
                                                                </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                            <tr>
                                                                <th>Tidak Ada Presensi Masuk THL</th>
                                                            </tr>";
                                                    } ?>
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

        <!-- MODAL PRESENSI TOTAL THL PULANG -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_thl_pulang" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotalthlpulang" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotalthlpulang">PRESENSI PULANG THL</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php if ($count_get_absen_perkampus_thl_pulang != false && !empty($count_get_absen_perkampus_thl_pulang)) {
                                                        foreach ($count_get_absen_perkampus_thl_pulang as $dataxxx) {
                                                            echo "
                                                                <tr>
                                                                    <th>$dataxxx->nama_satker</th>
                                                                    <th>$dataxxx->total Pegawai</th>
                                                                </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                            <tr>
                                                                <th>Tidak Ada Presensi Pulang THL</th>
                                                            </tr>";
                                                    } ?>
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

        <!-- MODAL PRESENSI TOTAL TA -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_ta" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotalta" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotalta">PRESENSI TA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php
                                                    if ($count_get_absen_perkampus_ta != false && !empty($count_get_absen_perkampus_ta)) {
                                                        foreach ($count_get_absen_perkampus_ta as $dataxxx) {
                                                            echo "
                                                                    <tr>
                                                                        <th>$dataxxx->penugasan</th>
                                                                        <th>$dataxxx->total Pegawai</th>
                                                                    </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                                <tr>
                                                                    <th>Tidak Ada Presensi Pulang THL</th>
                                                                </tr>";
                                                    }
                                                    ?>
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

        <!-- MODAL PRESENSI TOTAL TA MASUK -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_ta_masuk" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotaltamasuk" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotaltamasuk">PRESENSI MASUK TA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php
                                                    if ($count_get_absen_perkampus_ta_masuk != false && !empty($count_get_absen_perkampus_ta_masuk)) {
                                                        foreach ($count_get_absen_perkampus_ta_masuk as $dataxxx) {
                                                            echo "
                                                                    <tr>
                                                                        <th>$dataxxx->penugasan</th>
                                                                        <th>$dataxxx->total Pegawai</th>
                                                                    </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                                <tr>
                                                                    <th>Tidak Ada Presensi Masuk TA</th>
                                                                </tr>";
                                                    }

                                                    // if (date("H:i:s") > "08:00:00" && date("H:i:s") < "17:00:00") {
                                                    //     echo "
                                                    //         <tr>
                                                    //             <th>Staf Ahli IT</th>
                                                    //             <th>4 Pegawai</th>
                                                    //         </tr>";
                                                    // } else {
                                                    //     echo "<tr>
                                                    //         <th>Tidak Ada Presensi Pulang THL</th>
                                                    //     </tr>";
                                                    // }
                                                    ?>
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

        <!-- MODAL PRESENSI TOTAL TA PULANG -->
        <div class="container">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="presensi_total_ta_pulang" tabindex="-1" role="dialog" aria-labelledby="detailmodalpresensitotaltapulang" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="detailmodalpresensitotaltapulang">PRESENSI PULANG TA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
                                    <div class="col-md-12 my-5">
                                        <div class="table-responsive mx-2">
                                            <table class="table table-hover table-xl">
                                                <thead>
                                                    <?php
                                                    if ($count_get_absen_perkampus_ta_pulang != false && !empty($count_get_absen_perkampus_ta_pulang)) {
                                                        foreach ($count_get_absen_perkampus_ta_pulang as $dataxxx) {
                                                            echo "
                                                                    <tr>
                                                                        <th>$dataxxx->penugasan</th>
                                                                        <th>$dataxxx->total Pegawai</th>
                                                                    </tr>";
                                                        }
                                                    } else {
                                                        echo "
                                                                <tr>
                                                                    <th>Tidak Ada Presensi Pulang TA</th>
                                                                </tr>";
                                                    }

                                                    // if (date("H:i:s") > "08:00:00" && date("H:i:s") < "17:00:00") {
                                                    //     echo "<tr>
                                                    //         <th>Tidak Ada Presensi Pulang TA</th>
                                                    //     </tr>";
                                                    // } elseif (date("H:i:s") > "17:00:00" && date("H:i:s") < "00:00:00") {
                                                    //     echo "
                                                    //         <tr>
                                                    //             <th>Staf Ahli IT</th>
                                                    //             <th>4 Pegawai</th>
                                                    //         </tr>";
                                                    // } else {
                                                    //     echo "<tr>
                                                    //         <th>Tidak Ada Presensi Pulang TA</th>
                                                    //     </tr>";
                                                    // }
                                                    ?>
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

    </div>
</section>
<!-- //Dashboard -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<?php $this->load->view('page/js_datatable_frontend'); ?>

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
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
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
            },
            indexAxis: 'x',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

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
                            },
                            {
                                render: function(data, type, row, meta) {
                                    var a = ` Angkatan ${row.angkatan} ${row.tingkatan} `;
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
                                render: function(data, type, row, meta) {
                                    var a = ` Angkatan ${row.angkatan} ${row.tingkatan} `;
                                    return a;
                                }
                            },
                            {
                                render: function(data, type, row, meta) {
                                    if (`${row.keterangan}`.substring(8, 0) != 'https://') {
                                        var a = `
                                <a href="https://${row.keterangan}" target="_blank">Kunjungi Link Pembelajaran</a>
                              `;

                                    } else {
                                        var a = `
                                <a href="${row.keterangan}" target="_blank">Kunjungi Link Pembelajaran</a>
                              `;
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
                                    if (`${row.keterangan}`.substring(8, 0) != 'https://') {
                                        var a = `
                                <a href="https://${row.keterangan}" target="_blank">Kunjungi Link Pembelajaran</a>
                              `;

                                    } else {
                                        var a = `
                                <a href="${row.keterangan}" target="_blank">Kunjungi Link Pembelajaran</a>
                              `;
                                    }


                                    return a;
                                }
                            },
                            {
                                render: function(data, type, row, meta) {
                                    var a = ` Angkatan ${row.angkatan} ${row.tingkatan} `;
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

    /* -------------------------------------------------------------------------- */
    /*                           Fetch KELAS TOTAL                                */
    /* -------------------------------------------------------------------------- */
    function fetchkelastotal() {
        $.ajax({
            url: "<?php echo base_url(); ?>kelas_total",
            type: "post",
            dataType: "json",
            success: function(data) {
                if (data.responce == "success") {

                    var i = "1";
                    $('#tabel_kelas_total').DataTable({
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
                                render: function(data, type, row, meta) {
                                    var a = ` Angkatan ${row.angkatan} ${row.tingkatan} `;
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
    fetchkelastotal();

    /* -------------------------------------------------------------------------- */
    /*                           Fetch KELAS BELUM MULAI                          */
    /* -------------------------------------------------------------------------- */
    function fetchtabel_kelas_belum_mulai() {
        $.ajax({
            url: "<?php echo base_url(); ?>kelas_belum_mulai",
            type: "post",
            dataType: "json",
            success: function(data) {
                if (data.responce == "success") {

                    var i = "1";
                    $('#tabel_kelas_belum_mulai').DataTable({
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
                                render: function(data, type, row, meta) {
                                    var a = ` Angkatan ${row.angkatan} ${row.tingkatan} `;
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
    fetchtabel_kelas_belum_mulai();

    /* -------------------------------------------------------------------------- */
    /*                           Fetch KELAS BERLANGSUNG                          */
    /* -------------------------------------------------------------------------- */
    function fetchtabel_kelas_berlangsung() {
        $.ajax({
            url: "<?php echo base_url(); ?>kelas_berlangsung",
            type: "post",
            dataType: "json",
            success: function(data) {
                if (data.responce == "success") {

                    var i = "1";
                    $('#tabel_kelas_berlangsung').DataTable({
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
                                render: function(data, type, row, meta) {
                                    var a = ` Angkatan ${row.angkatan} ${row.tingkatan} `;
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
    fetchtabel_kelas_berlangsung();

    /* -------------------------------------------------------------------------- */
    /*                           Fetch KELAS SELESAI                              */
    /* -------------------------------------------------------------------------- */
    function fetchtabel_kelas_selesai() {
        $.ajax({
            url: "<?php echo base_url(); ?>kelas_selesai",
            type: "post",
            dataType: "json",
            success: function(data) {
                if (data.responce == "success") {

                    var i = "1";
                    $('#tabel_kelas_selesai').DataTable({
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
                                render: function(data, type, row, meta) {
                                    var a = ` Angkatan ${row.angkatan} ${row.tingkatan} `;
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
    fetchtabel_kelas_selesai();
</script>