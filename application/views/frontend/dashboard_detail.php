<?php
if ($get_prodi != false && !empty($get_prodi)) {
    $count_total_pembelajaran = 0;
    $count_pembelajaran_berlangsung = 0;
    $count_pembelajaran_selesai = 0;
    foreach ($get_prodi as $data) {
        $count_total_pembelajaran += $data->total_pembelajaran;
        $count_pembelajaran_berlangsung += $data->proses_pembelajaran;
        $count_pembelajaran_selesai += $data->selesai_pembelajaran;
    }
} else {
    $count_total_pembelajaran = 0;
    $count_pembelajaran_berlangsung = 0;
    $count_pembelajaran_selesai = 0;
}
?>

<!-- Dashboard -->
<section id="home" class="w3l-banner py-5">

    <div id="particles-js"></div>
    <script src="<?php echo base_url('assets/frontend/js/particles.min.js'); ?>"></script>

    <div class="banner-content">
        <div class="container pt-5 mt-5 pb-md-4">
            <div class="card shadow text-center mb-3 mt-3 border-0 animated fadeInDown" style="border-radius: 1rem !important;">
                <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
                    <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#cardx1"><i class="fa fa-expand"></i> Monitoring Pembelajaran Fakultas <?= $get_prodi[0]->id_fakultas; ?> (<?= date('d-M-Y'); ?>)</a>
                </div>
                <div id="cardx1" class="card-body ">
                    <div class="progress" style="height:30px">
                        <div class="progress-bar bg-warning" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_pembelajaran_berlangsung; ?>" aria-valuemin="0" aria-valuemax="<?= $count_total_pembelajaran; ?>"><?= $count_pembelajaran_berlangsung; ?> (Sedang Berlangsung)</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_pembelajaran_selesai; ?>" aria-valuemin="0" aria-valuemax="<?= $count_total_pembelajaran; ?>"><?= $count_pembelajaran_selesai; ?> (Selesai)</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width:100%;height:30px" aria-valuenow="<?= $count_total_pembelajaran; ?>" aria-valuemin="0" aria-valuemax="<?= $count_total_pembelajaran; ?>"><?= $count_total_pembelajaran; ?> (Total Pembelajaran)</div>
                    </div>
                </div>

                <?php if ($get_prodi != false && !empty($get_prodi)) {
                    foreach ($get_prodi as $data) { ?>
                        <div id="cardx1" class="card-body ">
                            <h4><b><a href="<?php echo base_url('dashboard/fakultas_detail/' . $data->id_prodi); ?>" target="_blank">Prodi <?= $data->id_prodi; ?></a></b></h4>
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
        </div>

    </div>
</section>
<!-- //Dashboard -->