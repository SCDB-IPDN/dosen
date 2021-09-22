<style>
  .disabledxxx {
    pointer-events: none;
    cursor: default;
  }
</style>

<section id="home" class="w3l-banner">
  <div id="particles-js"></div>
  <script src="<?php echo base_url('assets/frontend/js/particles.min.js'); ?>"></script>
  <!-- <div class="banner-image">
  </div> -->
  <div class="container pt-4 pb-md-4 mt-1">

    <div class="row mt-5">
      <div class="col-md-12 mt-5">
        <!-- Add Records Modal -->
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModal">
          Add Records
        </button> -->

        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               
                <form action="" method="post" id="form">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" id="email" class="form-control">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add">Add Records</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

        <!-- detail modal -->
        <div class="container mt-4">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <?php if ($this->session->userdata('role') == 1) { ?>
      <div class="row mt-3">
        <div class="col-md-4 mt-2 animated swing">
          <div class="card shadow border-0" style="border-radius: 1rem !important;">
            <div class="card-header border-0" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#demo"><i class="fa fa-expand"></i> Data Per Prodi</a>
            </div>
            <div id="demo" class="card-body collapse show">
              <p>*Chart jumlah jadwal matakuliah pada setiap prodi per hari ini.</p>
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-2 animated swing">
          <div class="card shadow border-0" style="border-radius: 1rem !important;">
            <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
              <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#demo2"><i class="fa fa-expand"></i> Data Per Dosen</a>
            </div>
            <div id="demo2" class="card-body collapse show">
              <strong>
              <a class="bg-warning text-light" style="border-radius: 0.2rem !important;"> Belum Upload : <?php if (count($get_count_belum_upload) > 0) {
                                                                                                            foreach ($get_count_belum_upload as $data) { ?>
                    <?= $data->TotalMonitoring ?>
                <?php }
                                                                                                          } ?> </a>
              <br>
              <a class="bg-success text-light" style="border-radius: 0.2rem !important;"> Sudah Upload : <?php if (count($get_count_sudah_upload) > 0) {
                                                                                                            foreach ($get_count_sudah_upload as $data) { ?>
                    <?= $data->TotalMonitoring ?>
                <?php }
                                                                                                          } ?> </a>
            </strong>
              <p>*Chart jumlah jadwal matakuliah untuk masing-masing dosen per hari ini.</p>
              <canvas id="myChart2"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-2 animated swing">
          <div class="card shadow border-0" style="border-radius: 1rem !important;">
            <div class="card-header" style="background: linear-gradient(180deg, rgba(45,150,253,1) 57%, rgba(15,88,255,1) 88%); border-radius: 1rem !important;">
              <a href="javascript:;" class=" btn btn-xs btn-icon btn-circle btn-outline-light" data-toggle="collapse" data-target="#demo3"><i class="fa fa-expand"></i> Status Monitoring Pembelajaran</a>
            </div>
            <div id="demo3" class="card-body collapse show">
              <p>*Chart jumlah status monitoring pembelajaran daring</p>
              <canvas id="myChart3"></canvas>
              <button type="button" class="btn btn-outline-info btn-sm btn-block mt-2" data-toggle="modal" data-target="#detail_modal">Tampilkan Detail</button>
            </div>
          </div>
        </div>
      </div>


      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: [
              <?php if (count($get_current_prodi) > 0) {
                  foreach ($get_current_prodi as $data) { ?> "<?= $data->id_prodi ?>",
              <?php }
                } ?>
            ],
            datasets: [{
              label: 'Jumlah matakuliah hari ini',
              fill: true,
              data: [
                <?php if (count($get_current_prodi) > 0) {
                  foreach ($get_current_prodi as $data) { ?>
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
            indexAxis: 'x',
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
      <script>
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: [
              <?php if (count($get_current_dosen) > 0) {
                  foreach ($get_current_dosen as $data) { ?> "<?= $data->nama ?>",
              <?php }
                } ?>
            ],
            datasets: [{
              label: 'Jadwal Mengajar',
              fill: true,
              data: [
                <?php if (count($get_current_dosen) > 0) {
                  foreach ($get_current_dosen as $data) { ?>
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
    <?php } ?> -->

        <!-- <div class="row">
      <div class="col-md-3 card shadow">asd</div>
      <div class="col-md-3 card shadow">asd</div>
      <div class="col-md-3 card shadow">asd</div>
      <div class="col-md-3 card shadow">asd</div>
    </div> -->
        <div class="row card shadow my-3 mx-2" style="border-radius: 2rem !important;">
          <div class="col-md-12 my-5">
            <div class="table-responsive-xl mx-2">
              <table class="table table-hover table-xl" id="records">
                <thead>
                  <tr>
                    <th>No</th>
                    <th></th>
                    <th>NIP / Nama Dosen</th>
                    <th>Matakuliah</th>
                    <th>Jam</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Prodi</th>
                    <th>Fakultas</th>
                    <th>Angkatan</th>
                    <th>Semester</th>
                    <th>SKS</th>
                    <th>Gambar</th>
                    <th></th>

                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- end of container -->

      <!-- Mulai Pembelajaran Modal -->
      <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mulai Pembelajaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <div class="row text-center">
            <div class="col-md-12 my-3">
              <div id="show_img"></div>
            </div>
          </div> -->
              <!-- mulai Record Form -->
              <form action="" method="post" id="edit_form">
                <input type="hidden" id="edit_id" name="edit_id" value="">
                <div class="form-group">
                  <label for="">Media Belajar</label>
                  <select name="edit_media" id="edit_media" class="form-control">
                    <option value="">--Pilih Media--</option>
                    <option value="Zoom">Zoom</option>
                    <option value="Google Meet">Google Meet</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Link Media Pembelajaran</label>
                  <input type="text" id="edit_keterangan" class="form-control">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="update">Mulai Pembelajaran</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Akhiri Pembelajaran Modal -->
      <div class="modal fade" id="akhiri_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Akhiri Pembelajaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <div class="row text-center">
            <div class="col-md-12 my-3">
              <div id="show_img"></div>
            </div>
          </div> -->
              <!-- mulai Record Form -->
              <form action="" method="post" id="akhir_form">
                <input type="hidden" id="akhiri_id" name="akhiri_id" value="">

                <div class="form-group">
                  <label for="">Upload Bukti</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="upload_img" id="upload_img">
                    <label class="custom-file-label" for="customFile">Pilih Gambar!</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Jumlah Praja Hadir</label>
                  <input type="number" id="jumlah_praja" class="form-control" onkeypress="return isNumberKey(event)">
                </div>
                <div class="form-group">
                  <label for="">Keterangan Tidak Hadir</label>
                  <textarea type="text" id="keterangan_praja" class="form-control"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="akhiri_pembelajaran">Akhiri Pembelajaran</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Zoom Modal -->
      <div class="modal fade" id="zoom_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <input type="hidden" id="zoom_id" name="zoom_id" value="">
              <div class="row text-center">
                <div class="col-md-12 my-2">
                  <div id="img_show"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</section>

<input type="hidden" value="<?php echo base_url(); ?>" id="base_url">
<?php $this->load->view('page/js_datatable_frontend'); ?>

<script>
  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }

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
  // $(document).on("click", "#add", function(e) {
  //   e.preventDefault();

  //   var name = $("#name").val();
  //   var email = $("#email").val();

  //   if (name == "" || email == "") {
  //     alert("Both field is required");
  //   } else {
  //     $.ajax({
  //       url: "<?php echo base_url(); ?>insert",
  //       type: "post",
  //       dataType: "json",
  //       data: {
  //         name: name,
  //         email: email
  //       },
  //       success: function(data) {
  //         if (data.responce == "success") {
  //           $('#records').DataTable().destroy();
  //           fetch();
  //           $('#exampleModal').modal('hide');
  //           toastr["success"](data.message);
  //         } else {
  //           toastr["error"](data.message);
  //         }

  //       }
  //     });

  //     $("#form")[0].reset();
  //   }
  // });

  /* -------------------------------------------------------------------------- */
  /*                                Fetch Records                               */
  /* -------------------------------------------------------------------------- */
  function fetch() {
    $.ajax({
      url: "<?php echo base_url('fetch/' . base64_encode($this->session->userdata('username'))); ?>",
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
            buttons: [{
                extend: 'copy',
                className: 'btn-info'
              },
              {
                extend: 'excel',
                className: 'btn-info'
              },
              {
                extend: 'pdf',
                className: 'btn-info',
                orientation: 'landscape',
                pageSize: 'A3'
              },
              {
                extend: 'print',
                className: 'btn-info'
              }
            ],
            "columns": [{
                "render": function() {
                  return a = i++;
                }
              },
              {
                "render": function(data, type, row, meta) {

                  <?php if ($this->session->userdata('role') == 1) { ?>

                    if (`${row.keterangan}` == 'null' && `${row.upload}` == 'null') {
                      var ax = `
                                <a href="#" value="${row.id_plot}" id="mulai" class="btn btn-primary"><i class="fas fa-file-upload"></i> Mulai Pembelajaran</a><br>
                                <a href="#" value="${row.id_plot}" id="akhiri" class="btn btn-light btn-disabled disabledxxx mt-1"><i class="fas fa-file-upload"></i> Akhiri Pembelajaran</a>
                      `;

                    } else if (`${row.keterangan}` != 'null' && `${row.upload}` == 'null') {
                      var ax = `
                                <a href="#" value="${row.id_plot}" id="mulai" class="btn btn-light btn-disabled disabledxxx"><i class="fas fa-file-upload"></i> Mulai Pembelajaran</a><br>
                                <a href="#" value="${row.id_plot}" id="akhiri" class="btn btn-primary mt-1"><i class="fas fa-file-upload"></i> Akhiri Pembelajaran</a>
                      `;

                    } else if (`${row.keterangan}` == 'null' && `${row.upload}` != 'null') {
                      var ax = `
                                <a href="#" value="${row.id_plot}" id="mulai" class="btn btn-primary"><i class="fas fa-file-upload"></i> Mulai Pembelajaran</a><br>
                                <a href="#" value="${row.id_plot}" id="akhiri" class="btn btn-light btn-disabled mt-1 disabledxxx"><i class="fas fa-file-upload"></i> Akhiri Pembelajaran</a>
                      `;

                    } else {
                      var ax = `
                                <a href="#" value="${row.id_plot}" id="mulai" class="btn btn-light btn-disabled disabledxxx"><i class="fas fa-file-upload"></i> Mulai Pembelajaran</a><br>
                                <a href="#" value="${row.id_plot}" id="akhiri" class="btn btn-light btn-disabled mt-1 disabledxxx"><i class="fas fa-file-upload"></i> Akhiri Pembelajaran</a>
                      
                               `;
                    }
                  <?php } elseif ($this->session->userdata('role') == 22 || $this->session->userdata('role') == 29 || $this->session->userdata('role') == 30 || $this->session->userdata('role') == 31 || $this->session->userdata('role') == 32 || $this->session->userdata('role') == 33 || $this->session->userdata('role') == 34 || $this->session->userdata('role') == 35 || $this->session->userdata('role') == 36 || $this->session->userdata('role') == 37 || $this->session->userdata('role') == 38) { ?>
                    if (`${row.keterangan}` == 'null' && `${row.upload}` == 'null') {
                      var ax = `
                                <a href="#" value="${row.id_plot}" id="mulai" class="btn btn-primary"><i class="fas fa-file-upload"></i> Mulai Pembelajaran</a><br>
                                <a href="#" value="${row.id_plot}" id="akhiri" class="btn btn-light btn-disabled disabledxxx mt-1"><i class="fas fa-file-upload"></i> Akhiri Pembelajaran</a>
                      `;

                    } else if (`${row.keterangan}` != 'null' && `${row.upload}` == 'null') {
                      var ax = `
                                <a href="#" value="${row.id_plot}" id="mulai" class="btn btn-light btn-disabled disabledxxx"><i class="fas fa-file-upload"></i> Mulai Pembelajaran</a><br>
                                <a href="#" value="${row.id_plot}" id="akhiri" class="btn btn-primary mt-1"><i class="fas fa-file-upload"></i> Akhiri Pembelajaran</a>
                      `;

                    } else if (`${row.keterangan}` == 'null' && `${row.upload}` != 'null') {
                      var ax = `
                                <a href="#" value="${row.id_plot}" id="mulai" class="btn btn-primary"><i class="fas fa-file-upload"></i> Mulai Pembelajaran</a><br>
                                <a href="#" value="${row.id_plot}" id="akhiri" class="btn btn-light btn-disabled mt-1 disabledxxx"><i class="fas fa-file-upload"></i> Akhiri Pembelajaran</a>
                      `;

                    } else {
                      var ax = `
                                <a href="#" value="${row.id_plot}" id="mulai" class="btn btn-light btn-disabled disabledxxx"><i class="fas fa-file-upload"></i> Mulai Pembelajaran</a><br>
                                <a href="#" value="${row.id_plot}" id="akhiri" class="btn btn-light btn-disabled mt-1 disabledxxx"><i class="fas fa-file-upload"></i> Akhiri Pembelajaran</a>
                      
                               `;
                    }
                  <?php } ?>
                  return ax;
                }
              },
              {
                // "data": "nip",
                render: function(data, type, row, meta) {
                  var a = ` (<b>${row.nip}</b>)<br>${row.nama} `;
                  return a;
                }
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
                "data": "tanggal"
              },
              {
                "data": "nama_prodi"
              },
              {
                "data": "nama_fakultas"
              },
              {
                render: function(data, type, row, meta) {
                  var a = ` Angkatan ${row.angkatan} ${row.tingkatan} `;
                  return a;
                }
              },
              {
                "data": "semester"
              },
              {
                "data": "sks"
              },
              {
                "data": "upload",
                render: function(data, type, row, meta) {

                  if (`${row.upload}` != 'null') {
                    var a = `
                                <img src="${base_url}/assets/upload/${row.upload}" width="300" height="200" class="img-thumbnail" id="zoom" value="${row.id_plot}"/>
                            `;

                  } else {
                    var a = ` Segera upload bukti pembelajaran daring!`;
                  }

                  return a;
                },
              }, {
                "data": "keterangan",
                render: function(data, type, row, meta) {
                  if (`${row.keterangan}` != 'null') {
                    if (`${row.media_pembelajaran}` == 'Lainnya') {
                      var a = `
                                <p>${row.keterangan}</p>
                              `;
                    } else {
                      var a = `
                                <a href="${row.keterangan}" target="_blank">Link Mengajar</a>
                              `;
                    }
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
  fetch();

  /* -------------------------------------------------------------------------- */
  /*                       Fetch Status Monitoring Records                      */
  /* -------------------------------------------------------------------------- */
  function fetchStatusMonitoring() {
    $.ajax({
      url: "<?php echo base_url(); ?>fetchstatus",
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
  /*                                Delete Records                               */
  /* -------------------------------------------------------------------------- */
  $(document).on("click", "#del", function(e) {
    e.preventDefault();
    var del_id = $(this).attr("value");

    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-outline-danger mr-2'
      },
      buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        $.ajax({
          url: "<?php echo base_url(); ?>delete",
          type: "post",
          dataType: "json",
          data: {
            del_id: del_id
          },
          success: function(data) {
            if (data.responce == "success") {
              $('#records').DataTable().destroy();
              fetch();
              swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              );
            } else {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              );
            }

          }
        });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your imaginary file is safe :)',
          'error'
        )
      }
    });
  });

  /* ---------------------------- Mulai Pemebelajaran Modal --------------------------- */
  $(document).on("click", "#mulai", function(e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");

    $.ajax({
      url: "<?php echo base_url(); ?>mulai_edit",
      type: "post",
      dataType: "json",
      data: {
        edit_id: edit_id
      },
      success: function(data) {
        if (data.responce == "success") {
          $('#edit_modal').modal('show');
          $("#edit_id").val(data.post.id_plot);
          // $("#edit_nip").val(data.post.nip);
          // $("#edit_nama").val(data.post.nama);
          // $("#edit_matkul").val(data.post.nama_matkul);
          // $("#edit_tanggal").val(data.post.tanggal);
          // $("#edit_jam").val(data.post.jam);
          // $("#edit_kelas").val(data.post.kelas);
          // $("#edit_semester").val(data.post.semester);
          // $("#edit_fakultas").val(data.post.nama_fakultas);
          // $("#edit_prodi").val(data.post.nama_prodi);
          // $("#edit_sks").val(data.post.sks);
          $("#edit_media").val(data.post.media_pembelajaran);
          // $("#show_img").html(`
          //           <img src="${base_url}assets/upload/${data.post.upload}" width="300" height="250" class="rounded img-thumbnail">
          //       `);
          $("#edit_keterangan").val(data.post.keterangan);
          // $("#edit_waktu").val(data.post.waktu_upload);
        } else {
          toastr["error"](data.message);
        }
      }
    });
  });

  /* ---------------------------- Akhiri Pembelajaran Modal --------------------------- */
  $(document).on("click", "#akhiri", function(e) {
    e.preventDefault();
    var akhiri_id = $(this).attr("value");

    $.ajax({
      url: "<?php echo base_url(); ?>akhiri_edit",
      type: "post",
      dataType: "json",
      data: {
        akhiri_id: akhiri_id
      },
      success: function(data) {
        if (data.responce == "success") {
          $('#akhiri_modal').modal('show');
          $("#akhiri_id").val(data.post.id_plot);
          // $("#edit_nip").val(data.post.nip);
          // $("#edit_nama").val(data.post.nama);
          // $("#edit_matkul").val(data.post.nama_matkul);
          // $("#edit_tanggal").val(data.post.tanggal);
          // $("#edit_jam").val(data.post.jam);
          // $("#edit_kelas").val(data.post.kelas);
          // $("#edit_semester").val(data.post.semester);
          // $("#edit_fakultas").val(data.post.nama_fakultas);
          // $("#edit_prodi").val(data.post.nama_prodi);
          // $("#edit_sks").val(data.post.sks);
          // $("#edit_media").val(data.post.media_pembelajaran);
          // $("#show_img").html(`
          //           <img src="${base_url}assets/upload/${data.post.upload}" width="300" height="250" class="rounded img-thumbnail">
          //       `);
          // $("#edit_keterangan").val(data.post.keterangan);
          // $("#edit_waktu").val(data.post.waktu_upload);
        } else {
          toastr["error"](data.message);
        }
      }
    });
  });

  /* ---------------------------- Zoom Image --------------------------- */
  $(document).on("click", "#zoom", function(e) {
    e.preventDefault();
    var zoom_id = $(this).attr("value");

    $.ajax({
      url: "<?php echo base_url(); ?>mulai_edit",
      type: "post",
      dataType: "json",
      data: {
        edit_id: zoom_id
      },
      success: function(data) {
        if (data.responce == "success") {
          $('#zoom_modal').modal('show');
          $("#zoom_id").val(data.post.id_plot);
          $("#img_show").html(`
                    <img src="${base_url}assets/upload/${data.post.upload}" width="100%" height="100%" class="rounded img-thumbnail">
                `);
        } else {
          toastr["error"](data.message);
        }
      }
    });
  });


  function adjust(v) {
    if (v > 9) {
      return v.toString();
    } else {
      return '0' + v.toString();
    }
  }

  /* -------------------------------------------------------------------------- */
  /*                     Update Mulai Pembelajaran Records                      */
  /* -------------------------------------------------------------------------- */

  $(document).on("click", "#update", function(e) {
    e.preventDefault();
    var today = new Date();
    var date = today.getFullYear() + '-' + adjust(today.getMonth() + 1) + '-' + adjust(today.getDate());
    var time = adjust(today.getHours()) + ":" + adjust(today.getMinutes());

    var edit_id = $("#edit_id").val();
    var edit_keterangan = $("#edit_keterangan").val();
    var edit_waktu = `${date}T${time}`;
    var edit_media = $("#edit_media").val();


    if (edit_keterangan == "" || edit_media == "") {
      alert("All field is required");
    } else {
      var fd = new FormData();

      fd.append("edit_id", edit_id);
      fd.append("edit_keterangan", edit_keterangan);
      fd.append("edit_waktu", edit_waktu);
      fd.append("edit_media", edit_media);
      $.ajax({
        url: "<?php echo base_url(); ?>mulai_update",
        type: "post",
        dataType: "json",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
          if (data.responce == "success") {
            $('#records').DataTable().destroy();
            fetch();
            $('#edit_modal').modal('hide');
            toastr["success"](data.message);
          } else {
            toastr["error"](data.message);
          }
        }
      });
    }
  });

  /* -------------------------------------------------------------------------- */
  /*                     Update Akhiri Pembelajaran Records                      */
  /* -------------------------------------------------------------------------- */
  $(document).on("click", "#akhiri_pembelajaran", function(e) {
    e.preventDefault();
    var today = new Date();
    var date = today.getFullYear() + '-' + adjust(today.getMonth() + 1) + '-' + adjust(today.getDate());
    var time = adjust(today.getHours()) + ":" + adjust(today.getMinutes());

    var akhiri_id = $("#akhiri_id").val();
    var jumlah_praja = $("#jumlah_praja").val();
    var keterangan_praja = $("#keterangan_praja").val();

    // var edit_keterangan = $("#edit_keterangan").val();
    var edit_waktu_akhiri = `${date}T${time}`;

    var upload_img = $("#upload_img")[0].files[0];


    if (edit_id == "" || jumlah_praja == "") {
      alert("All field is required");
    } else {
      var fd = new FormData();

      fd.append("akhiri_id", akhiri_id);
      fd.append("jumlah_praja", jumlah_praja);
      fd.append("keterangan_praja", keterangan_praja);

      // fd.append("edit_keterangan", edit_keterangan);
      fd.append("edit_waktu_akhiri", edit_waktu_akhiri);
      if ($("#upload_img")[0].files.length > 0) {
        fd.append("upload_img", upload_img);
      }
      $.ajax({
        url: "<?php echo base_url(); ?>akhiri_update",
        type: "post",
        dataType: "json",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
          if (data.responce == "success") {
            $('#records').DataTable().destroy();
            fetch();
            $('#akhiri_modal').modal('hide');
            toastr["success"](data.message);
          } else {
            toastr["error"](data.message);
          }
        }
      });
    }
  });
</script>