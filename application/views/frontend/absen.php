<!-- Maps -->
<meta name="viewport" content="width = device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
<script src="https://code.google.com/apis/gears/gears_init.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/frontend/js/geo.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>

<script>
    function initialize_map() {
        var myOptions = {
            zoom: 4,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            navigationControl: true,
            navigationControlOptions: {
                style: google.maps.NavigationControlStyle.SMALL
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    }

    function initialize() {
        if (geo_position_js.init()) {
            document.getElementById('current').innerHTML = "Receiving...";
            geo_position_js.getCurrentPosition(show_position, function() {
                document.getElementById('current').innerHTML = "Couldn't get location"
            }, {
                enableHighAccuracy: true
            });
        } else {
            document.getElementById('current').innerHTML = "Functionality not available";
        }
    }

    function show_position(p) {
        document.getElementById('current').innerHTML = "Latitude = " + p.coords.latitude.toFixed(2) + " Longitude = " + p.coords.longitude.toFixed(2);
        document.getElementById('latitude_x').value = p.coords.latitude.toFixed(2);
        document.getElementById('longitude_x').value = p.coords.longitude.toFixed(2);
        var pos = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
        map.setCenter(pos);
        map.setZoom(14);

        var infowindow = new google.maps.InfoWindow({
            content: "<strong>Saya Disini</strong>"
        });

        var marker = new google.maps.Marker({
            position: pos,
            map: map,
            title: "You are here"
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });

    }
</script>

<style>
    body {
        font-family: Helvetica;
        font-size: 11pt;
        padding: 0px;
        margin: 0px
    }

    #title {
        background-color: #e22640;
        padding: 5px;
    }

    #current {
        font-size: 10pt;
        padding: 5px;
    }
</style>

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
                                <?php if ($this->session->userdata('role') != 1) {
                                    if (!empty($get_validate[0]->id_absen)) {
                                        if ($get_validate[0]->penugasan == '24 Jam') { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasuk" disabled>
                                                Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#absenpulang">
                                                Absen Pulang <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                            </button>

                                            <?php } else {
                                            if (empty($get_validate[0]->waktu_pulang)) { ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasuk" disabled>
                                                    Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                                </button>
                                                <?php if (date("H:i:s") < "12:00:00") { ?>
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
                                        <?php }
                                        }
                                    } else { ?>
                                        <?php if (date("H:i:s") < "12:00:00") {
                                            if (!empty($get_pamdal[0]->penugasan) && $get_pamdal[0]->penugasan == 'Tenaga Pengamanan Dalam') { ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasukpamdal">
                                                    Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasuk">
                                                    Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                                </button>
                                            <?php } ?>
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

        <?php if ($this->session->userdata('role') == 1) { ?>
            <div class="row card shadow mt-3 mx-0">
                <div class="col-md-12 mt-4 mb-2">
                    <div class="table-responsive-xl">
                        <table class="table table-hover" id="records">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Username</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jam Masuk</th>
                                    <th>Tanggal Pulang</th>
                                    <th>Jam Pulang</th>
                                    <th>Via</th>
                                    <th>Kondisi</th>
                                    <th>Status</th>
                                    <th>Aktivitas</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row card shadow mt-3 mx-0">
                <div class="col-md-12 mt-4 mb-2">
                    <div class="table-responsive-xl">
                        <table class="table table-hover" id="records">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jam Masuk</th>
                                    <th>Tanggal Pulang</th>
                                    <th>Jam Pulang</th>
                                    <th>Via</th>
                                    <th>Kondisi</th>
                                    <th>Status</th>
                                    <th>Aktivitas</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Modal Absen Masuk Pamdal -->
        <div class="modal fade" id="absenmasukpamdal" tabindex="-1" role="dialog" aria-labelledby="absenmasukpamdallabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="absenmasukpamdallabel">Absen Masuk</h5>
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
                            <div class="form-group">
                                <label for="">Penugasan</label>
                                <select name="penugasan" id="penugasan" class="form-control">
                                    <option value="Normal">Normal</option>
                                    <option value="24 Jam">24 Jam</option>
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
                                <input type="hidden" name="penugasan" id="penugasan" class="form-control" value="Normal" readonly>
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

                            <!-- <body class="form-group" onload="initialize_map();initialize()">
                                <input type="hidden" name="latitude_x" id="latitude_x" class="form-control" readonly>
                                <input type="hidden" name="longitude_x" id="longitude_x" class="form-control" readonly>
                                <div class="form-group" id="title">Lokasi Absen</div>
                                <div class="form-group" id="current">Mencari Lokasi...</div>
                                <div class="form-group" id="map_canvas" style="width:35; height:350px"></div>
                            </body> -->
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
                                <label for="">Tanggal Pulang</label>
                                <input type="text" name="tgl1" id="tgl1" class="form-control" value="<?php echo $get_validate[0]->tgl; ?>" readonly>
                                <input type="text" name="tgl_pulang1" id="tgl_pulang1" class="form-control" value="<?php echo date("Y-m-d") ?>" readonly>
                                <input type="text" name="username1" id="username1" class="form-control" value="<?php echo $this->session->userdata('username') ?>" readonly>
                                <input type="text" name="waktu_pulang1" id="waktu_pulang1" class="form-control" value="<?php echo date("H:i:s") ?>" readonly>
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
        document.getElementById("add").disabled = true;

        var username = $("#username").val();
        var jns_user = <?php echo $this->session->userdata('role') ?>;
        var tgl = $("#tgl").val();
        var waktu = $("#waktu").val();
        var via = $("#via").val();
        var kondisi = $("#kondisi").val();
        var penugasan = $("#penugasan").val();
        // var latitude_masuk = $("#latitude_x").val();
        // var longitude_masuk = $("#longitude_x").val();
        // var keterangan = $("#keterangan").val();
        var status = "Masuk";

        if (tgl == "" || via == "" || kondisi == "" || waktu == "" || username == "" || jns_user == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap Untuk Mengisi Data Dengan Lengkap',
            })
            document.getElementById("add").disabled = false;
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
                    penugasan: penugasan,
                    // latitude_masuk: latitude_masuk,
                    // longitude_masuk: longitude_masuk,
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

            document.getElementById("add").disabled = false;
            $("#form")[0].reset();
        }
        setInterval('location.reload()', 1000)
    });

    /* -------------------------------------------------------------------------- */
    /*                               Update Records                               */
    /* -------------------------------------------------------------------------- */
    $(document).on("click", "#updatex", function(e) {
        e.preventDefault();
        document.getElementById("updatex").disabled = true;

        var username = $("#username1").val();
        var tgl = $("#tgl1").val();
        var tgl_pulang = $("#tgl_pulang1").val();
        var jns_user = <?php echo $this->session->userdata('role') ?>;
        var waktu_pulang = $("#waktu_pulang1").val();
        var keterangan = $("#keterangan").val();
        // var latitude_pulang = $("#latitude_x").val();
        // var longitude_pulang = $("#longitude_x").val();
        var status = "Pulang";

        if (tgl == "" || tgl_pulang == "" || waktu_pulang == "" || keterangan == "" || status == "" || username == "" || jns_user == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap Untuk Mengisi Aktivitas',
            })
            document.getElementById("updatex").disabled = false;
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>absen_pulang",
                type: "post",
                dataType: "json",
                data: {
                    username: username,
                    tgl: tgl,
                    tgl_pulang: tgl_pulang,
                    jns_user: jns_user,
                    waktu_pulang: waktu_pulang,
                    keterangan: keterangan,
                    // latitude_pulang: latitude_pulang,
                    // longitude_pulang: longitude_pulang,
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

            document.getElementById("updatex").disabled = false;
            // $("#form")[0].reset();
            // setInterval('location.reload()', 1000)
        }
    });

    /* -------------------------------------------------------------------------- */
    /*                                Fetch Records                               */
    /* -------------------------------------------------------------------------- */
    <?php if ($this->session->userdata('role') == 1) { ?>

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
                                    "data": "username"
                                },
                                {
                                    "data": "tgl"
                                },
                                {
                                    "data": "waktu"
                                },
                                {
                                    "data": "tgl_pulang"
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
                                },
                                {
                                    "render": function(data, type, row, meta) {
                                        var a = `Jam Masuk ${row.penugasan}`;
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
        fetch();

    <?php } else { ?>

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
                                        "data": "tgl_pulang"
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
                                    },
                                    {
                                        "render": function(data, type, row, meta) {
                                            var a = `Jam Masuk ${row.penugasan}`;
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
            fetch();
        <?php } ?>

    <?php } ?>
</script>