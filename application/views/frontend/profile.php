    <!-- Profile -->
    <section id="home" class="w3l-banner py-5">
        <div class="banner-image">
        </div>

        <div id="particles-js"></div>
        <script src="<?php echo base_url('assets/frontend/js/particles.min.js'); ?>"></script>

        <div class="banner-content">
            <div class="container pt-5 pb-md-4 mt-2">
                <div class="card mb-3 mt-3 shadow rounded" style="border-radius: 3rem !important;">
                    <div class="row no-gutters">
                        <div class="col-md-4 my-1">
                            <?php if (count($get_profile) > 0 && !empty($get_profile[0]->image_url)) { ?>
                                <img src="<?php echo base_url('') . $get_profile[0]->image_url ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/frontend/images/image-not-found-scaled-1150x647.png'); ?>'" class="card-img rounded" style="border-radius: 3rem !important;">
                            <?php } else { ?>
                                <img src="<?php echo base_url('assets/frontend/images/image-not-found-scaled-1150x647.png'); ?>" class="card-img rounded" style="border-radius: 3rem !important;">
                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="title-big">Profile</h3>
                                <hr>

                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-right">
                                        <h5>NIK / NIP:</h5>
                                        <p><?= count($get_profile) == 0 ? '-' : $this->session->userdata('username'); ?></p>
                                    </div>
                                </div>
                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-right">
                                        <h5>Nama Pengguna:</h5>
                                        <p>
                                            <?php if (count($get_profile) != 0) {
                                                if ($get_profile[0]->nama == 'Dr. HARI NUR CAHYA MURNI, M.Si') {
                                                    echo $this->session->userdata('username');
                                                } else {
                                                    echo $get_profile[0]->nama;
                                                }
                                            } else {
                                                echo "-";
                                            } ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-right">
                                        <h5>Username:</h5>
                                        <p><?= $this->session->userdata('username'); ?></p>
                                    </div>
                                </div>
                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-right">
                                        <h5>Password:</h5>
                                        <p><?= $this->session->userdata('password'); ?></p>
                                    </div>
                                </div>
                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-right">
                                        <a class="btn button-style my-1 mx-auto text-light" value="<?= $this->session->userdata('username'); ?>" id="edit" role="button">Ubah Password</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Record Modal -->
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit Record Form -->
                        <form action="" method="post" id="edit_form">
                            <input type="hidden" id="edit_record_id" name="edit_record_id" value="">
                            <div class="form-group">
                                <label for="">NIP</label>
                                <input disabled type="text" id="edit_nip" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password Baru</label>
                                <input type="password" id="edit_password" class="form-control">
                            </div>
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
        // Edit Record

        $(document).on("click", "#edit", function(e) {
            e.preventDefault();

            var edit_id = $(this).attr("value");

            $.ajax({
                url: "<?php echo base_url(); ?>Beranda/edit",
                type: "post",
                dataType: "json",
                data: {
                    edit_id: edit_id
                },
                success: function(data) {
                    if (data.responce == "success") {
                        $('#edit_modal').modal('show');
                        $("#edit_record_id").val(data.post.username);
                        $("#edit_nip").val(data.post.username);
                        $("#edit_password").val(data.post.password);
                    } else {
                        toastr["error"](data.message);
                    }
                }
            });

        });

        // Update Record

        $(document).on("click", "#update", function(e) {
            e.preventDefault();

            var edit_record_id = $("#edit_record_id").val();
            var edit_nip = $("#edit_nip").val();
            var edit_password = $("#edit_password").val();

            if (edit_record_id == "" || edit_nip == "" || edit_password == "") {
                alert("Both field is required");
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>Beranda/update",
                    type: "post",
                    dataType: "json",
                    data: {
                        edit_record_id: edit_record_id,
                        edit_nip: edit_nip,
                        edit_password: edit_password
                    },
                    success: function(data) {
                        if (data.responce == "success") {
                            // $('#records').DataTable().destroy();
                            // fetch();
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
    <!-- //Profile -->