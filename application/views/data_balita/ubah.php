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

            <?php echo form_open_multipart('data_balita/ubah'); ?>

            <form>

              <input hidden type="text" name="id_balita" class="form-control" value="<?php echo $data_balita['id_balita']; ?>">

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">NIK </h6>
                  <input type="text" name="nik" class="form-control" placeholder="" value="<?php echo $data_balita['nik']; ?>" required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nama Balita </h6>
                  <input type="text" name="nama_balita" class="form-control" placeholder="Masukan Nama Balita ..." value="<?php echo $data_balita['nama_balita']; ?>" required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Tanggal Lahir </h6>
                  <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Nama Balita ..." value="<?php echo $data_balita['tgl_lahir']; ?>" required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Jenis Kelamin </h6>
                  <select class="form-control " id="jenis_kelamin" name="jenis_kelamin" placeholder="">
                    <option <?php if ($data_balita['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?> value="Laki-laki">Laki-laki</option>
                    <option <?php if ($data_balita['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?> value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nama Ibu </h6>
                  <input type="text" name="nama_ibu" class="form-control" placeholder="Masukan Nama Balita ..." value="<?php echo $data_balita['nama_ibu']; ?>" required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nama Ayah </h6>
                  <input type="text" name="nama_ayah" class="form-control" placeholder="Masukan Nama Balita ..." value="<?php echo $data_balita['nama_ayah']; ?>" required>
                </div>
              </div>


              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Berat Badan Lahir (Kg) </h6>
                  <input type="text" name="bb_lahir" class="form-control" placeholder="Masukan Nama Balita ..." value="<?php echo $data_balita['bb_lahir']; ?>" required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Tinggi Badan Lahir (Cm) </h6>
                  <input type="text" name="tb_lahir" class="form-control" placeholder="Masukan Nama Balita ..." value="<?php echo $data_balita['tb_lahir']; ?>" required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Alamat </h6>
                  <input type="text" name="alamat" class="form-control" placeholder="Masukan Nama Balita ..." value="<?php echo $data_balita['alamat']; ?>" required>
                </div>
              </div>

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