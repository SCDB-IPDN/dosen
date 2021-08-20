 <section id="home" class="w3l-banner py-5">
     <div class="banner-image">
     </div>
     <div class="container">
         <div class="row">
             <div class="col-md-12 mt-5">
                 <h1 class="text-center title-big">
                     Presensi Kehadiran
                 </h1>
                 <hr style="background-color: black; color: black; height: 1px;">
             </div>
         </div>

         <div class="row card">
             <div class="card mb-3">
                 <div class="row no-gutters">
                     <div class="col-md-4">
                         <?php if (count($get_profile) > 0 && !empty($get_profile[0]->image_url)) { ?>
                             <img src="<?php echo base_url('') . $get_profile[0]->image_url ?>" class="card-img">
                         <?php } else { ?>
                             <img src="<?php echo base_url('assets/frontend/images/image-not-found-scaled-1150x647.png'); ?>" class="card-img">
                         <?php } ?>
                     </div>
                     <div class="col-md-8">
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
                                             <a href="<?php echo base_url('absen_pulang/' . base64_encode($this->session->userdata('username'))); ?>" type="button" class="btn btn-danger">
                                                 Absen Pulang <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                             </a>
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

         <div class="row card shadow mt-3">
             <div class="col-md-12 mt-4">
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
                                 <th>Keterangan</th>
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
                                     <option value="Kurang Sehat/Fit">Kurang Sehat/Fit</option>
                                     <option value="Sakit">Sakit</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="">Keterangan</label>
                                 <textarea type="text" name="keterangan" id="keterangan" class="form-control"></textarea>
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
     </div>
 </section>

 <input type="hidden" value="<?php echo base_url(); ?>" id="base_url">
 <?php $this->load->view('page/js_datatable_frontend'); ?>

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
         var tgl = $("#tgl").val();
         var waktu = $("#waktu").val();
         var via = $("#via").val();
         var kondisi = $("#kondisi").val();
         var keterangan = $("#keterangan").val();
         var status = "Masuk";

         if (tgl == "" || via == "" || kondisi == "" || waktu == "" || username == "") {
             alert("Harap Untuk Mengisi Data Dengan Lengkap");
         } else {
             $.ajax({
                 url: "<?php echo base_url(); ?>insert_absen",
                 type: "post",
                 dataType: "json",
                 data: {
                     username: username,
                     tgl: tgl,
                     waktu: waktu,
                     via: via,
                     kondisi: kondisi,
                     keterangan: keterangan,
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
     /*                                Fetch Records                               */
     /* -------------------------------------------------------------------------- */
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
                                 "data": "status"
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
 </script>