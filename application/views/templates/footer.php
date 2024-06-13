<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> Template By <a href="https://nauval.in/">STISLA</a>
    </div>
    <div class="footer-right">
        2.3.0
    </div>
</footer>
</div>
</div>

<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open_multipart('auth'); ?>
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModal">Pesan Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin Keluar?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Keluar</button>
                </div>
            </form>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- Modal Ubah Data -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open_multipart('user/ubah'); ?>
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Detail Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input hidden type="text" name="id" class="form-control" value="<?php echo $data_user['id_user']; ?>">
                    <div class="form-group row mb-3 ml-2">
                        <div class="col-sm-12 col-md-11">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required value="<?php echo $data_user['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3 ml-2">
                        <div class="col-sm-12 col-md-11">
                            <label>NoHP</label>
                            <input type="text" name="nohp" class="form-control" value="<?php echo $data_user['nohp']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3 ml-2">
                        <div class="col-sm-12 col-md-11">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $data_user['username']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3 ml-2">
                        <div class="col-sm-12 col-md-11">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $data_user['password']; ?>" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ubah Data</button>
                </div>
            </form>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/template/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url(); ?>assets/template/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="<?= base_url(); ?>assets/template/node_modules/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/template/node_modules/chart.js/dist/Chart.js"></script>
<script src="<?= base_url(); ?>assets/template/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/template/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url(); ?>assets/template/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="<?= base_url(); ?>assets/template/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url(); ?>assets/template/assets/js/scripts.js"></script>
<script src="<?= base_url(); ?>assets/template/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url(); ?>assets/template/assets/js/page/index-0.js"></script>

<script src="<?= base_url(); ?>assets/template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

<script src="<?= base_url(); ?>assets/template/assets/js/page/modules-datatables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<!-- skrip tampil data -->
<script type="text/javascript">
    //let nik = $('#nik');
    //let nama = $('#nama');
    //let jenis_kelamin = $('#jk');
    let usia = $('#usia');
    let k_usia = $('#kategori_usia');
    let berat = $('#berat_badan');
    let k_berat = $('#kategori_berat');
    let tinggi = $('#tinggi_badan');
    let k_tinggi = $('#kategori_tinggi');

    //menampilkan data nama, jenis kelamin dan nik
    //    $(document).on('change', '#nm', function() {
    //      let url = '<?= base_url('dataukur/get/'); ?>' + this.value;
    //      $.getJSON(url, function(data) {
    //        nama.val(data.nama);
    //        nik.val(data.nik);
    //        jenis_kelamin.val(data.jenis_kelamin);
    //        umur.focus();
    //      });
    //    });

    //menampilkan data umur
    $(document).on('keyup', '#usia', function() {
        if ((parseInt(this.value) >= 0) && (parseInt(this.value) <= 12)) {
            k_usia.val('0-12');
        } else if ((parseInt(this.value) >= 13) && (parseInt(this.value) <= 24)) {
            k_usia.val('13-24');
        } else if ((parseInt(this.value) >= 25) && (parseInt(this.value) <= 36)) {
            k_usia.val('25-36');
        } else if ((parseInt(this.value) >= 37) && (parseInt(this.value) <= 48)) {
            k_usia.val('37-48');
        } else {
            k_usia.val('49-60');
        };
    });
    $(document).on('keyup', '#berat_badan', function() {
        if ((parseInt(this.value) >= 1) && (parseInt(this.value) <= 5)) {
            k_berat.val('1-5');
        } else if ((parseInt(this.value) >= 6) && (parseInt(this.value) <= 10)) {
            k_berat.val('6-10');
        } else if ((parseInt(this.value) >= 11) && (parseInt(this.value) <= 15)) {
            k_berat.val('11-15');
        } else if ((parseInt(this.value) >= 16) && (parseInt(this.value) <= 20)) {
            k_berat.val('16-20');
        } else {
            k_berat.val('>20');
        };
    });
    $(document).on('keyup', '#tinggi_badan', function() {
        if ((parseInt(this.value) >= 1) && (parseInt(this.value) <= 25)) {
            k_tinggi.val('1-25');
        } else if ((parseInt(this.value) >= 26) && (parseInt(this.value) <= 50)) {
            k_tinggi.val('26-50');
        } else if ((parseInt(this.value) >= 51) && (parseInt(this.value) <= 75)) {
            k_tinggi.val('51-75');
        } else if ((parseInt(this.value) >= 76) && (parseInt(this.value) <= 100)) {
            k_tinggi.val('76-100');
        } else {
            k_tinggi.val('>100');
        };
    });
</script>

</body>

</html>