<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $judul ?></h1>
    </div>

    <div class="row">
      <div class="col-12 col-md-12 ">
        <div class="card">
          <?= $this->session->flashdata('notif'); ?>
          <div class="card-body">

            <?php echo form_open_multipart('data_gejala/tambah'); ?>
            <form>

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Kode Gejala</h6>
                  <input type="text" name="kode_gejala" class="form-control" placeholder="Masukan Kode Gejala..." required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nama gejala</h6>
                  <input type="text" name="nama_gejala" class="form-control" placeholder="Masukan Nama gejala ..." required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nilai CF</h6>
                  <input type="text" name="nilai_cf" class="form-control" placeholder="Masukan Nilai CF...." required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <a href="<?= base_url('data_gejala'); ?>" class="btn btn-danger ml-3">Batal</a>
                <button type="submit" class="btn btn-success ml-2">Simpan</button>
              </div>
            </form>
            <?php echo form_close(); ?>

          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>