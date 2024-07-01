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
            <?php echo form_open_multipart('data_balita/tambah'); ?>

            <form>

              <!-- NIK -->
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">NIK</h6>
                  <input type="text" name="nik" class="form-control" placeholder="Masukan NIK..." required>
                </div>
              </div>

              <!-- Nama Balita -->
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nama Balita</h6>
                  <input type="text" name="nama_balita" class="form-control" placeholder="Masukan Nama Balita ..." required>
                </div>
              </div>

              <!-- Tanggal Lahir -->
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Tanggal Lahir</h6>
                  <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Nama Balita ..." required>
                </div>
              </div>

              <!-- Jenis Kelamin -->
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Jenis Kelamin</h6>
                  <select name="jenis_kelamin" class="form-control">
                    <option value="">Silakan Pilih Jenis Kelamin</option>
                    <option value="Laki-laki"> Laki-laki </option>
                    <option value="Perempuan"> Perempuan </option>
                  </select>
                </div>
              </div>

              <!-- Nama Ibu -->
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nama Ibu</h6>
                  <input type="text" name="nama_ibu" class="form-control" placeholder="Masukan Nama Ibu ..." required>
                </div>
              </div>

              <!-- Nama Ayah -->
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nama Ayah</h6>
                  <input type="text" name="nama_ayah" class="form-control" placeholder="Masukan Nama Ayah ..." required>
                </div>
              </div>

              <!-- Berat Badan Lahir -->
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Berat Badan Lahir (Kg)</h6>
                  <input type="number" name="bb_lahir" class="form-control" placeholder="Masukan Berat Badan Lahir ..." required>
                </div>
              </div>

              <!-- Tinggi Badan Lahir -->
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Tinggi Badan Lahir (Cm) </h6>
                  <input type="number" name="tb_lahir" class="form-control" placeholder="Masukan Tinggi Badan Lahir  ..." required>
                </div>
              </div>

              <!-- Alamat -->
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Alamat</h6>
                  <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat ..." required>
                </div>
              </div>

              <!-- Button Simpan dan Batal -->
              <div class="form-group row mb-3 ml-2">
                <a href="<?= base_url('data_balita'); ?>" class="btn btn-danger ml-3">Batal</a>
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