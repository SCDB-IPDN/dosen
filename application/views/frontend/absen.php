<style>
    .mapouter {
        position: relative;
        text-align: right;
        height: 300px;
        width: 300px;
    }

    .gmap_canvas {
        overflow: hidden;
        background: none !important;
        height: 300px;
        width: 300px;
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
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasukpamdal" disabled>
                                                Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                            </button>

                                            <?php if (empty($get_validate[0]->waktu_pulang)) { ?>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#absenpulang">
                                                    Absen Pulang <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#absenpulang" disabled>
                                                    Absen Pulang <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                                </button>
                                            <?php } ?>

                                            <?php } else {
                                            if (empty($get_validate[0]->waktu_pulang)) { ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasukpamdal" disabled>
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
                                        <?php if (date("H:i:s") < "12:00:00") { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasukpamdal">
                                                Absen Masuk <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" disabled>
                                                Absen Pulang <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#absenmasukpamdal" disabled>
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
                <!-- <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div id="map"></div>
                        </div>
                    </div>
                </div> -->
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
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jam Masuk</th>
                                    <th>Lokasi Masuk</th>
                                    <th>Tanggal Pulang</th>
                                    <th>Jam Pulang</th>
                                    <th>Lokasi Pulang</th>
                                    <th>Via</th>
                                    <th>Kondisi</th>
                                    <!-- <th>Status</th> -->
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
                                    <th>Lokasi Masuk</th>
                                    <th>Tanggal Pulang</th>
                                    <th>Jam Pulang</th>
                                    <th>Lokasi Pulang</th>
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
                                <input type="text" name="tgl2" id="tgl2" class="form-control" value="<?php echo date("Y-m-d") ?>" readonly>
                                <input type="hidden" name="username2" id="username2" class="form-control" value="<?php echo $this->session->userdata('username') ?>" readonly>
                                <input type="hidden" name="waktu2" id="waktu2" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Via</label>
                                <select name="via2" id="via2" class="form-control">
                                    <option value="">--- Pilih ---</option>
                                    <option value="Work From Office">Work From Office</option>
                                    <option value="Work From Home">Work From Home</option>
                                    <option value="Work From Site">Work From Site</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kondisi</label>
                                <select name="kondisi2" id="kondisi2" class="form-control">
                                    <option value="">--- Pilih ---</option>
                                    <option value="Sehat">Sehat</option>
                                    <!-- <option value="Kurang Sehat/Fit">Kurang Sehat/Fit</option> -->
                                    <option value="Sakit">Sakit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Penugasan</label>
                                <select name="penugasan2" id="penugasan2" class="form-control">
                                    <option value="">--- Pilih ---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="24 Jam">24 Jam</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Lokasi (*)</label>
                                <div class="card-body">
                                    <div id="map1" style='height:360px;'></div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea type="text" name="keterangan" id="keterangan" class="form-control"></textarea>
                    </div> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="add2">Simpan</button>
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
                                <input type="hidden" name="waktu" id="waktu" class="form-control" readonly>
                                <input type="hidden" name="penugasan" id="penugasan" class="form-control" value="Normal" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Via</label>
                                <select name="via" id="via" class="form-control">
                                    <option value="">--- Pilih ---</option>
                                    <option value="Work From Office">Work From Office</option>
                                    <option value="Work From Home">Work From Home</option>
                                    <option value="Work From Site">Work From Site</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kondisi</label>
                                <select name="kondisi" id="kondisi" class="form-control">
                                    <option value="">--- Pilih ---</option>
                                    <option value="Sehat">Sehat</option>
                                    <!-- <option value="Kurang Sehat/Fit">Kurang Sehat/Fit</option> -->
                                    <option value="Sakit">Sakit</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Lokasi (*)</label>
                                <div class="card-body">
                                    <div id="map" style='height:360px;'></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="latitude_x" id="latitude_x" class="form-control" readonly>
                                <input type="hidden" name="longitude_x" id="longitude_x" class="form-control" readonly>
                            </div>
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
                                <input type="hidden" name="tgl1" id="tgl1" class="form-control" value="<?php echo $get_validate[0]->tgl; ?>" readonly>
                                <input type="text" name="tgl_pulang1" id="tgl_pulang1" class="form-control" value="<?php echo date("Y-m-d") ?>" readonly>
                                <input type="hidden" name="username1" id="username1" class="form-control" value="<?php echo $this->session->userdata('username') ?>" readonly>
                                <input type="hidden" name="waktu_pulang1" id="waktu_pulang1" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Aktivitas (*)</label>
                                <textarea type="text" name="keterangan" id="keterangan" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Lokasi (*)</label>
                                <div class="card-body">
                                    <div id="map2" style='height:360px;'></div>
                                </div>
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

<!-- Maps -->
<script>
    $(document).on('show.bs.modal', function() {
        setTimeout(function() {
            var map = L.map('map').fitWorld();
            var map1 = L.map('map1').fitWorld();
            var map2 = L.map('map2').fitWorld();
            map.invalidateSize();
            map1.invalidateSize();
            map2.invalidateSize();

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map1);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map2);

            function onLocationFound(e) {
                var radius = e.accuracy / 2;

                L.marker(e.latlng).addTo(map)
                    .bindPopup("Anda berada di dalam " + radius + " meter dari poin ini").openPopup();
                L.marker(e.latlng).addTo(map1)
                    .bindPopup("Anda berada di dalam " + radius + " meter dari poin ini").openPopup();
                L.marker(e.latlng).addTo(map2)
                    .bindPopup("Anda berada di dalam " + radius + " meter dari poin ini").openPopup();

                L.circle(e.latlng, radius).addTo(map);
                L.circle(e.latlng, radius).addTo(map1);
                L.circle(e.latlng, radius).addTo(map2);

                document.getElementById('latitude_x').value = e.latitude;
                document.getElementById('longitude_x').value = e.longitude;

                var timestamp = e.timestamp;
                var date = new Date(timestamp);
                var hours = date.getHours();
                var minutes = "0" + date.getMinutes();
                var seconds = "0" + date.getSeconds();
                var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
                document.getElementById('waktu2').value = formattedTime;
                document.getElementById('waktu').value = formattedTime;
                document.getElementById('waktu_pulang1').value = formattedTime;

                map.setView(new L.LatLng(e.latitude, e.longitude), 16);
                map1.setView(new L.LatLng(e.latitude, e.longitude), 16);
                map2.setView(new L.LatLng(e.latitude, e.longitude), 16);
            }

            function onLocationError(e) {
                alert(e.message);
            }

            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);
            map1.on('locationfound', onLocationFound);
            map1.on('locationerror', onLocationError);
            map2.on('locationfound', onLocationFound);
            map2.on('locationerror', onLocationError);

            map.locate({
                setView: true,
                maxZoom: 16
            });
            map1.locate({
                setView: true,
                maxZoom: 16
            });
            map2.locate({
                setView: true,
                maxZoom: 16
            });

        }, 1000);
    });
</script>
<!-- // Maps -->

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
        var latitude_masuk = $("#latitude_x").val();
        var longitude_masuk = $("#longitude_x").val();
        // var keterangan = $("#keterangan").val();
        var status = "Masuk";

        if (tgl == "" || via == "" || kondisi == "" || waktu == "" || username == "" || jns_user == "" || latitude_masuk == "" || longitude_masuk == "" || penugasan == "") {
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
                    latitude_masuk: latitude_masuk,
                    longitude_masuk: longitude_masuk,
                    status: status
                },
                success: function(data) {
                    if (data.responce == "success") {
                        $('#records').DataTable().destroy();
                        fetch();
                        $('#absenmasuk').modal('hide');
                        // toastr["success"](data.message);
                        Swal.fire({
                            icon: 'success',
                            title: 'Yeay...',
                            text: data.message,
                        });

                        $("#form")[0].reset();
                        setInterval('location.reload()', 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                        document.getElementById("add").disabled = false;
                    }
                }
            });
        }
    });

    $(document).on("click", "#add2", function(e) {
        e.preventDefault();
        document.getElementById("add2").disabled = true;

        var username = $("#username2").val();
        var jns_user = <?php echo $this->session->userdata('role') ?>;
        var tgl = $("#tgl2").val();
        var waktu = $("#waktu2").val();
        var via = $("#via2").val();
        var kondisi = $("#kondisi2").val();
        var penugasan = $("#penugasan2").val();
        var latitude_masuk = $("#latitude_x").val();
        var longitude_masuk = $("#longitude_x").val();
        // var keterangan = $("#keterangan").val();
        var status = "Masuk";

        if (tgl == "" || via == "" || kondisi == "" || waktu == "" || username == "" || jns_user == "" || latitude_masuk == "" || longitude_masuk == "" || penugasan == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap Untuk Mengisi Data Dengan Lengkap',
            })
            document.getElementById("add2").disabled = false;
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
                    latitude_masuk: latitude_masuk,
                    longitude_masuk: longitude_masuk,
                    status: status
                },
                success: function(data) {
                    if (data.responce == "success") {
                        $('#records').DataTable().destroy();
                        fetch();
                        $('#absenmasukpamdal').modal('hide');
                        // toastr["success"](data.message);
                        Swal.fire({
                            icon: 'success',
                            title: 'Yeay...',
                            text: data.message,
                        });

                        $("#form")[0].reset();
                        setInterval('location.reload()', 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                        document.getElementById("add2").disabled = false;
                    }
                }
            });
        }
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
        var latitude_pulang = $("#latitude_x").val();
        var longitude_pulang = $("#longitude_x").val();
        var status = "Pulang";

        if (tgl == "" || tgl_pulang == "" || waktu_pulang == "" || keterangan == "" || status == "" || username == "" || jns_user == "" || latitude_pulang == "" || longitude_pulang == "") {
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
                    latitude_pulang: latitude_pulang,
                    longitude_pulang: longitude_pulang,
                    status: status
                },
                success: function(data) {
                    if (data.responce == "success") {
                        $('#records').DataTable().destroy();
                        fetch();
                        $('#absenpulang').modal('hide');
                        // toastr["success"](data.message);
                        Swal.fire({
                            icon: 'success',
                            title: 'Yeay...',
                            text: data.message,
                        });
                        $("#form")[0].reset();
                        setInterval('location.reload()', 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        });
                        document.getElementById("updatex").disabled = false;
                    }
                }
            });
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
                                    "render": function(data, type, row, meta) {
                                        if (`${row.username}` == 'null' || `${row.nama_pegawai}` == 'null') {
                                            if (`${row.username}` == 'null') {
                                                var a = `${row.nama_pegawai}`;
                                            } else if (`${row.nama_pegawai}` == 'null') {
                                                var a = `${row.username}`;
                                            }
                                        } else {
                                            var a = `(${row.username}) <br>${row.nama_pegawai}`;
                                        }
                                        return a;
                                    }
                                },
                                {
                                    "data": "tgl"
                                },
                                {
                                    "render": function(data, type, row, meta) {
                                        if (`${row.waktu}` == 'null') {
                                            var a = `-`;
                                        } else {
                                            var a = `${row.waktu} <br>(${row.status_masuk})`;
                                        }
                                        return a;
                                    }
                                },
                                {
                                    "render": function(data, type, row, meta) {
                                        if (`${row.latitude_masuk}` == 'null' || `${row.longitude_masuk}` == 'null') {
                                            var a = `Lokasi Belum Tersedia`;
                                        } else {
                                            // var a = `<a href="https://www.google.com/maps?q=${row.latitude_masuk},${row.longitude_masuk}" target="_blank">Cek Lokasi</a>`;
                                            var a = `<div class="mapouter">
                                                <div class="gmap_canvas">
                                                    <iframe width="300" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=${row.latitude_masuk},${row.longitude_masuk}&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                    <a href="https://123movies-a.com"></a><br>
                                                    <a href="https://www.embedgooglemap.net">https://maps.google.com/maps?q=${row.latitude_masuk},${row.longitude_masuk}&t=&z=15&ie=UTF8&iwloc=&output=embed</a>
                                                </div>
                                            </div>`;
                                        }
                                        return a;
                                    }
                                },
                                {
                                    "render": function(data, type, row, meta) {
                                        if (`${row.tgl_pulang}` == 'null') {
                                            var a = `-`;
                                        } else {
                                            var a = `${row.tgl_pulang}`;
                                        }
                                        return a;
                                    }
                                },
                                {
                                    "render": function(data, type, row, meta) {
                                        if (`${row.waktu_pulang}` == 'null') {
                                            var a = `-`;
                                        } else {
                                            var a = `${row.waktu_pulang} <br>(${row.status_pulang})`;
                                        }
                                        return a;
                                    }
                                },
                                {
                                    "render": function(data, type, row, meta) {
                                        if (`${row.latitude_pulang}` == 'null' || `${row.longitude_pulang}` == 'null') {
                                            var a = `Lokasi Belum Tersedia`;
                                        } else {
                                            // var a = `<a href="https://www.google.com/maps?q=${row.latitude_pulang},${row.longitude_pulang}" target="_blank">Cek Lokasi</a>`;
                                            var a = `<div class="mapouter">
                                                <div class="gmap_canvas">
                                                    <iframe width="300" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=${row.latitude_pulang},${row.longitude_pulang}&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                    <a href="https://123movies-a.com"></a><br>
                                                    <a href="https://www.embedgooglemap.net">https://maps.google.com/maps?q=${row.latitude_pulang},${row.longitude_pulang}&t=&z=15&ie=UTF8&iwloc=&output=embed</a>
                                                </div>
                                            </div>`;
                                        }
                                        return a;
                                    }
                                },
                                {
                                    "data": "via"
                                },
                                {
                                    "data": "kondisi"
                                },
                                {
                                    "render": function(data, type, row, meta) {
                                        if (`${row.keterangan}` == 'null') {
                                            var a = `-`;
                                        } else {
                                            var breakTag = (data || typeof data === 'undefined') ? '<br />' : '<br>';
                                            var a = (`${row.keterangan}` + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                                        }
                                        return a;
                                    }
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
                                        "render": function(data, type, row, meta) {
                                            if (`${row.latitude_masuk}` == 'null' || `${row.longitude_masuk}` == 'null') {
                                                var a = `Lokasi Belum Tersedia`;
                                            } else {
                                                // var a = `<a href="https://www.latlong.net/c/?lat=${row.latitude_masuk}&long=${row.longitude_masuk}" target="_blank">Cek Lokasi</a>`;
                                                var a = `<div class="mapouter">
                                                <div class="gmap_canvas">
                                                    <iframe width="300" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=${row.latitude_masuk},${row.longitude_masuk}&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                    <a href="https://123movies-a.com"></a><br>
                                                    <a href="https://www.embedgooglemap.net">https://maps.google.com/maps?q=${row.latitude_masuk},${row.longitude_masuk}&t=&z=15&ie=UTF8&iwloc=&output=embed</a>
                                                </div>
                                            </div>`;
                                            }
                                            return a;
                                        }
                                    },
                                    {
                                        "render": function(data, type, row, meta) {
                                            if (`${row.tgl_pulang}` == 'null') {
                                                var a = `-`;
                                            } else {
                                                var a = `${row.tgl_pulang}`;
                                            }
                                            return a;
                                        }
                                    },
                                    {
                                        "render": function(data, type, row, meta) {
                                            if (`${row.waktu_pulang}` == 'null') {
                                                var a = `-`;
                                            } else {
                                                var a = `${row.waktu_pulang}`;
                                            }
                                            return a;
                                        }
                                    },
                                    {
                                        "render": function(data, type, row, meta) {
                                            if (`${row.latitude_pulang}` == 'null' || `${row.longitude_pulang}` == 'null') {
                                                var a = `Lokasi Belum Tersedia`;
                                            } else {
                                                // var a = ` < a href = "https://www.latlong.net/c/?lat=${row.latitude_pulang}&long=${row.longitude_pulang}" target = "_blank" > Cek Lokasi < /a>`;
                                                var a = `<div class="mapouter">
                                                <div class="gmap_canvas">
                                                    <iframe width="300" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=${row.latitude_pulang},${row.longitude_pulang}&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                    <a href="https://123movies-a.com"></a><br>
                                                    <a href="https://www.embedgooglemap.net">https://maps.google.com/maps?q=${row.latitude_pulang},${row.longitude_pulang}&t=&z=15&ie=UTF8&iwloc=&output=embed</a>
                                                </div>
                                            </div>`;
                                            }
                                            return a;
                                        }
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
                                        "render": function(data, type, row, meta) {
                                            if (`${row.keterangan}` == 'null') {
                                                var a = `-`;
                                            } else {
                                                var breakTag = (data || typeof data === 'undefined') ? '<br />' : '<br>';
                                                var a = (`${row.keterangan}` + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                                            }
                                            return a;
                                        }
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