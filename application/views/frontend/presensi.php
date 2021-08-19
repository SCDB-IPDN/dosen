<section id="home" class="w3l-banner py-5">
  <div class="banner-image">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="text-center title-big">
          Monitoring Pembelajaran
        </h1>
        <hr style="background-color: black; color: black; height: 1px;">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt-2">
        <!-- Add Records Modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModal">
          Add Records
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Add Records Form -->
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
    </div>
    <div class="row card shadow mt-3">
      <div class="col-md-12 mt-4">
        <div class="table-responsive-xl">
          <table class="table table-hover" id="records">
            <thead>
              <tr>
                <th>ID</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Matakuliah</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Fakultas</th>
                <th>Prodi</th>
                <th>SKS</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Record Modal -->
  <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Record Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Edit Record Form -->
          <form action="" method="post" id="edit_form">
            <input type="hidden" id="edit_id" name="edit_id" value="">
            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" id="edit_nama" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label for="">Fakultas</label>
              <input type="text" id="edit_fakultas" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label for="">Prodi</label>
              <input type="text" id="edit_prodi" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label for="">Kelas</label>
              <input type="text" id="edit_kelas" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label for="">Matakuliah</label>
              <input type="text" id="edit_matkul" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label for="">Tanggal</label>
              <input type="date" id="edit_tanggal" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label for="">Jam</label>
              <input type="time" id="edit_jam" class="form-control" disabled>
            </div>
            <!-- <div class="form-group">
                <label for="">Media Pembelajaran</label>
                <input type="text" id="edit_media" class="form-control">
              </div> -->
            <div class="form-group">
              <label for="">Media Belajar</label>
              <select name="edit_media" id="edit_media" class="form-control">
                <option value="">--Pilih Media--</option>
                <option value="Zoom">Zoom</option>
                <option value="Google">Google Meet</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Upload Bukti</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="edit_img">
                <label class="custom-file-label" for="customFile">Pilih Gambar!</label>
              </div>
            </div>
            <div class="form-group">
              <label for="">Keterangan</label>
              <input type="text" id="edit_keterangan" class="form-control">
            </div>
            <!-- <div class="form-group">
                <label for="">Waktu Upload</label>
                <input type="time" id="edit_waktu" class="form-control">
              </div> -->
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update">Update</button>
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

    var name = $("#name").val();
    var email = $("#email").val();

    if (name == "" || email == "") {
      alert("Both field is required");
    } else {
      $.ajax({
        url: "<?php echo base_url(); ?>insert",
        type: "post",
        dataType: "json",
        data: {
          name: name,
          email: email
        },
        success: function(data) {
          if (data.responce == "success") {
            $('#records').DataTable().destroy();
            fetch();
            $('#exampleModal').modal('hide');
            toastr["success"](data.message);
          } else {
            toastr["error"](data.message);
          }

        }
      });

      $("#form")[0].reset();
    }
  });

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
            buttons: [
              'copy', 'excel', 'pdf'
            ],
            "columns": [{
                "render": function() {
                  return a = i++;
                }
              },
              {
                "data": "nip"
              },
              {
                "data": "nama"
              },
              {
                "data": "nama_matkul"
              },
              {
                "data": "tanggal"
              },
              {
                "data": "jam"
              },
              {
                "data": "kelas"
              },
              {
                "data": "semester"
              },
              {
                "data": "nama_fakultas"
              },
              {
                "data": "nama_prodi"
              },
              {
                "data": "sks"
              },
              {
                "render": function(data, type, row, meta) {
                  <?php if ($this->session->userdata('role') == 1) { ?>
                    var a = `
                                <a href="#" value="${row.id_plot}" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                <a href="#" value="${row.id_plot}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                              `;
                  <?php } elseif ($this->session->userdata('role') == 22 || $this->session->userdata('role') == 29) { ?>
                    var a = `
                                <a href="#" value="${row.id_plot}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                              `;
                  <?php } ?>
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
  /*                                Delete Records                               */
  /* -------------------------------------------------------------------------- */
  $(document).on("click", "#del", function(e) {
    e.preventDefault();
    var del_id = $(this).attr("value");

    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
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

  /* ---------------------------- Edit Record Modal --------------------------- */
  $(document).on("click", "#edit", function(e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");

    $.ajax({
      url: "<?php echo base_url(); ?>edit",
      type: "post",
      dataType: "json",
      data: {
        edit_id: edit_id
      },
      success: function(data) {
        if (data.responce == "success") {
          $('#edit_modal').modal('show');
          $("#edit_id").val(data.post.id_plot);
          $("#edit_nip").val(data.post.nip);
          $("#edit_nama").val(data.post.nama);
          $("#edit_matkul").val(data.post.nama_matkul);
          $("#edit_tanggal").val(data.post.tanggal);
          $("#edit_jam").val(data.post.jam);
          $("#edit_kelas").val(data.post.kelas);
          $("#edit_semester").val(data.post.semester);
          $("#edit_fakultas").val(data.post.nama_fakultas);
          $("#edit_prodi").val(data.post.nama_prodi);
          $("#edit_sks").val(data.post.sks);
          $("#edit_media").val(data.post.media_pembelajaran);
          $("#show_img").html(`
                    <img src="${base_url}assets/uploads/${data.post.upload}" width="150" height="150" class="rounded img-thumbnail">
                `);
          $("#edit_keterangan").val(data.post.keterangan);
          // $("#edit_waktu").val(data.post.waktu_upload);
        } else {
          toastr["error"](data.message);
        }
      }
    });
  });

  /* -------------------------------------------------------------------------- */
  /*                               Update Records                               */
  /* -------------------------------------------------------------------------- */
  function adjust(v) {
    if (v > 9) {
      return v.toString();
    } else {
      return '0' + v.toString();
    }
  }

  $(document).on("click", "#update", function(e) {
    e.preventDefault();
    var today = new Date();
    var date = today.getFullYear() + '-' + adjust(today.getMonth() + 1) + '-' + adjust(today.getDate());
    var time = adjust(today.getHours()) + ":" + adjust(today.getMinutes());

    var edit_id = $("#edit_id").val();
    var edit_media = $("#edit_media").val();
    var edit_keterangan = $("#edit_keterangan").val();
    var edit_waktu = `${date}T${time}`;

    var edit_img = $("#edit_img")[0].files[0];

    if (edit_id == "" || edit_media == "" || edit_keterangan == "") {
      alert("All field is required");
    } else {
      var fd = new FormData();

      fd.append("edit_id", edit_id);
      fd.append("edit_media", edit_media);
      fd.append("edit_keterangan", edit_keterangan);
      fd.append("edit_waktu", edit_waktu);
      if ($("#edit_img")[0].files.length > 0) {
        fd.append("edit_img", edit_img);
      }
      $.ajax({
        url: "<?php echo base_url(); ?>update",
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
</script>