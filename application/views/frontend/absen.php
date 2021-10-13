<section id="home" class="w3l-banner py-5">
    <div class="banner-image">
    </div>

    <div id="particles-js"></div>
    <script src="<?php echo base_url('assets/frontend/js/particles.min.js'); ?>"></script>

    <div class="container pt-5 pb-md-4 mt-4">
        <!-- <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center title-big">
                    Presensi Kehadiran
                </h1>
                <hr style="background-color: primary; color: primary; height: 1px;">
            </div>
        </div> -->

        <div class="row card shadow mt-4 mx-0 border-0">
            <div class="card-header bg-primary">
                <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-primary" data-toggle="collapse" data-target="#profil"><i class="fa fa-expand"></i> Profil</a>
            </div>
            <div id="profil" class="collapse show">
                <div class="row no-gutters">
                    <div class="col-md-4 ml-1 mt-1">
                        <?php if (count($get_profile) > 0 && !empty($get_profile[0]->image_url)) { ?>
                            <img src="<?php echo base_url('') . $get_profile[0]->image_url ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/frontend/images/image-not-found-scaled-1150x647.png'); ?>'" class="card-img">
                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/frontend/images/image-not-found-scaled-1150x647.png'); ?>" class="card-img">
                        <?php } ?>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">Profile</h5>

                            <div class="cont-right">
                                <h6>NIK / NIP</h6>
                                <p><?= count($get_profile) == 0 ? '-' : $this->session->userdata('username'); ?></p>
                            </div>
                            <div class="cont-right">
                                <h6>Nama Pengguna</h6>
                                <p><?= count($get_profile) == 0 ? '-' : $get_profile[0]->nama; ?></p>
                            </div>

                            <div class="cont-right">
                                <?php if ($this->session->userdata('role') != 1) { ?>
                                    <?php if (!empty($get_validate[0]->id_absen)) { ?>
                                        <?php if (empty($get_validate[0]->waktu_pulang)) { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasuk" disabled>
                                                Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                            </button>
                                            <?php if (date("H:i:s") < "16:00:00") { ?>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#absenpulang" disabled>
                                                    Absen Pulang <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#absenpulang">
                                                    Absen Pulang <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                                </button>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-primary" disabled>
                                                Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" disabled>
                                                Absen Pulang <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                            </button>
                                        <?php }  ?>
                                    <?php } else { ?>
                                        <?php if (date("H:i:s") < "16:00:00") { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasuk">
                                                Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" disabled>
                                                Absen Pulang <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasuk" disabled>
                                                Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" disabled>
                                                Absen Pulang <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                            </button>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row card shadow mt-3"> -->
        <div class="row">
            <div class="col-sm-6 my-1 mt-3">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary">
                        <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-primary" data-toggle="collapse" data-target="#demo"><i class="fa fa-expand"></i> Data Absen Pulang</a>
                    </div>
                    <div id="demo" class="card-body collapse show">
                        <canvas id="absenpulang_xxx"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-1 mt-3">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary">
                        <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-primary" data-toggle="collapse" data-target="#demo2"><i class="fa fa-expand"></i> Data Absen Masuk</a>
                    </div>
                    <div id="demo2" class="card-body">
                        <canvas id="absenmasuk_xxx"></canvas>

                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <?php
        if ($get_absen_pulang_chart != false && !empty($get_absen_pulang_chart)) {
            $count_pulang = 0;
            foreach ($get_absen_pulang_chart as $data) {
                $count_pulang += $data->jumlah_hadir;
            }
        } else {
            $count_pulang = 0;
        }
        if ($get_absen_masuk_chart != false && !empty($get_absen_masuk_chart)) {
            $count_masuk = 0;
            foreach ($get_absen_masuk_chart as $data) {
                $count_masuk += $data->jumlah_hadir;
            }
        } else {
            $count_masuk = 0;
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
        <script>
            // ABSEN PULANG
            var ctx = document.getElementById('absenpulang_xxx').getContext('2d');
            var absenpulang_xxx = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php if ($get_absen_pulang_chart != false && !empty($get_absen_pulang_chart)) {
                            foreach ($get_absen_pulang_chart as $data) { ?> "<?= $data->role ?>",
                        <?php }
                        } else {
                            echo "'Data Tidak Ditemukan'";
                        } ?>
                    ],
                    datasets: [{
                        label: 'Total Presensi',
                        fill: false,
                        data: [
                            <?php if ($get_absen_pulang_chart != false && !empty($get_absen_pulang_chart)) {
                                foreach ($get_absen_pulang_chart as $data) { ?>
                                    <?= $data->jumlah_hadir ?>,
                            <?php }
                            } else {
                                echo "0";
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
                        borderWidth: 1,
                        datalables: {
                            color: 'blue',
                            anchor: 'end',
                            align: 'top'
                        }
                    }]
                },

                plugins: [ChartDataLabels],
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Rekapitulasi Presensi Perhari (Masuk & Pulang): <?= $count_pulang ?>',

                            font: {
                                size: 20
                            },
                            color: 'blue',
                            padding: {
                                top: 10,
                                bottom: 30
                            }
                        }
                    },
                    indexAxis: 'y',
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // ABSEN MASUK
            var ctx = document.getElementById('absenmasuk_xxx').getContext('2d');
            var absenmasuk_xxx = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php if ($get_absen_masuk_chart != false && !empty($get_absen_masuk_chart)) {
                            foreach ($get_absen_masuk_chart as $data) { ?> "<?= $data->role ?>",
                        <?php }
                        } else {
                            echo "'Data Tidak Ditemukan'";
                        } ?>
                    ],
                    datasets: [{
                        label: 'Total Presensi',
                        fill: false,
                        data: [
                            <?php if ($get_absen_masuk_chart != false && !empty($get_absen_masuk_chart)) {
                                foreach ($get_absen_masuk_chart as $data) { ?>
                                    <?= $data->jumlah_hadir ?>,
                            <?php }
                            } else {
                                echo "0";
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
                        borderWidth: 1,
                        datalables: {
                            color: 'blue',
                            anchor: 'end',
                            align: 'top'
                        }
                    }]
                },

                plugins: [ChartDataLabels],
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Rekapitulasi Presensi Perhari (Hanya Masuk): <?= $count_masuk ?>',

                            font: {
                                size: 20
                            },
                            color: 'blue',
                            padding: {
                                top: 10,
                                bottom: 30
                            }
                        }
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

        <div class="row card shadow mt-3 mx-0">
            <div class="col-md-12 mt-4 mb-2">
                <div class="table-responsive-xl">
                    <table class="table table-hover" id="records">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Via</th>
                                <th>Kondisi</th>
                                <th>Status</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Absen Masuk -->
        <div class="modal fade" id="absenmasuk" tabindex="-1" role="dialog" aria-labelledby="absenmasuklabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="absenmasuklabel">Absen Masuk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="form">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="text" name="tgl" id="tgl" class="form-control" value="<?php echo date("Y-m-d") ?>" readonly>
                                <input type="hidden" name="username" id="username" class="form-control" value="<?php echo $this->session->userdata('username') ?>" readonly>
                                <input type="hidden" name="waktu" id="waktu" class="form-control" value="<?php echo date("H:i:s") ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Via</label>
                                <select name="via" id="via" class="form-control">
                                    <option value="Work From Office">Work From Office</option>
                                    <option value="Work From Home">Work From Home</option>
                                    <option value="Work From Site">Work From Site</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kondisi</label>
                                <select name="kondisi" id="kondisi" class="form-control">
                                    <option value="Sehat">Sehat</option>
                                    <!-- <option value="Kurang Sehat/Fit">Kurang Sehat/Fit</option> -->
                                    <option value="Sakit">Sakit</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea type="text" name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="add">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Absen Pulang -->
        <div class="modal fade" id="absenpulang" tabindex="-1" role="dialog" aria-labelledby="absenpulanglabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="absenpulanglabel">Absen Pulang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="form">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="text" name="tgl" id="tgl" class="form-control" value="<?php echo date("Y-m-d") ?>" readonly>
                                <input type="hidden" name="username" id="username" class="form-control" value="<?php echo $this->session->userdata('username') ?>" readonly>
                                <input type="hidden" name="waktu_pulang" id="waktu_pulang" class="form-control" value="<?php echo date("H:i:s") ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Aktivitas (*)</label>
                                <textarea type="text" name="keterangan" id="keterangan" class="form-control" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="updatex">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<input type="hidden" value="<?php echo base_url(); ?>" id="base_url">
<?php $this->load->view('page/js_datatable_frontend'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    /* --------------------------------- Baseurl -------------------------------- */
    var base_url = $("#base_url").val();

    /* -------------------- Bootstrap Custom File Input Label ------------------- */
    $(".custom-file-input").on("change", function() {
        let fileName = $(this).val().split("\\").pop();
        let label = $(this).siblings(".custom-file-label");

        if (label.data("default-title") === undefined) {
            label.data("default-title", label.html());
        }

        if (fileName === "") {
            label.removeClass("selected").html(label.data("default-title"));
        } else {
            label.addClass("selected").html(fileName);
        }
    });

    /* -------------------------------------------------------------------------- */
    /*                               Insert Records                               */
    /* -------------------------------------------------------------------------- */
    $(document).on("click", "#add", function(e) {
        e.preventDefault();

        var username = $("#username").val();
        var jns_user = <?php echo $this->session->userdata('role') ?>;
        var tgl = $("#tgl").val();
        var waktu = $("#waktu").val();
        var via = $("#via").val();
        var kondisi = $("#kondisi").val();
        // var keterangan = $("#keterangan").val();
        var status = "Masuk";

        if (tgl == "" || via == "" || kondisi == "" || waktu == "" || username == "" || jns_user == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap Untuk Mengisi Data Dengan Lengkap',
            })
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>insert_absen",
                type: "post",
                dataType: "json",
                data: {
                    username: username,
                    jns_user: jns_user,
                    tgl: tgl,
                    waktu: waktu,
                    via: via,
                    kondisi: kondisi,
                    // keterangan: keterangan,
                    status: status
                },
                success: function(data) {
                    if (data.responce == "success") {
                        $('#records').DataTable().destroy();
                        fetch();
                        $('#absenmasuk').modal('hide');
                        toastr["success"](data.message);
                    } else {
                        toastr["error"](data.message);
                    }

                }
            });

            $("#form")[0].reset();
        }
        setInterval('location.reload()', 1000)
    });

    /* -------------------------------------------------------------------------- */
    /*                               Update Records                               */
    /* -------------------------------------------------------------------------- */
    $(document).on("click", "#updatex", function(e) {
        e.preventDefault();

        var username = $("#username").val();
        var jns_user = <?php echo $this->session->userdata('role') ?>;
        var waktu_pulang = $("#waktu_pulang").val();
        var keterangan = $("#keterangan").val();
        var status = "Pulang";

        if (waktu_pulang == "" || keterangan == "" || status == "" || username == "" || jns_user == "") {
            // alert("Harap Untuk Mengisi Data Dengan Lengkap");

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap Untuk Mengisi Aktivitas',
            })
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>absen_pulang",
                type: "post",
                dataType: "json",
                data: {
                    username: username,
                    jns_user: jns_user,
                    waktu_pulang: waktu_pulang,
                    keterangan: keterangan,
                    status: status
                },
                success: function(data) {
                    if (data.responce == "success") {
                        $('#records').DataTable().destroy();
                        fetch();
                        $('#absenpulang').modal('hide');
                        toastr["success"](data.message);
                    } else {
                        toastr["error"](data.message);
                    }

                }
            });

            $("#form")[0].reset();
            setInterval('location.reload()', 1000)
        }
    });

    /* -------------------------------------------------------------------------- */
    /*                                Fetch Records                               */
    /* -------------------------------------------------------------------------- */
    <?php if (!empty($get_validate[0]->id_absen)) { ?>

        function fetch() {
            $.ajax({
                url: "<?php echo base_url('fetch_absen/' . base64_encode($this->session->userdata('username'))); ?>",
                type: "post",
                dataType: "json",
                success: function(data) {
                    if (data.responce == "success") {
                        var i = "1";
                        $('#records').DataTable({
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
                                    "data": "tgl"
                                },
                                {
                                    "data": "waktu"
                                },
                                {
                                    "data": "waktu_pulang"
                                },
                                {
                                    "data": "via"
                                },
                                {
                                    "data": "kondisi"
                                },
                                {
                                    "data": "status_pulang"
                                },
                                {
                                    "data": "keterangan"
                                }
                            ]
                        });
                    } else {
                        toastr["error"](data.message);
                    }

                }
            });
        }
        fetch();
    <?php } ?>
</script>