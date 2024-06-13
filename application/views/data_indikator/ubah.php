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

            <?php echo form_open_multipart('data_indikator/ubah'); ?>

            <form>

              <input hidden type="text" name="id_indikator" class="form-control" value="<?php echo $data_indikator['id_indikator']; ?>">

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Rentang Usia</h6>
           
                  <input type="text" name="usia" class="form-control " placeholder="Masukan Rentang Usia(0-12)" value="<?php echo $data_indikator['usia']; ?>" required >
               
    
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Jenis Kelamin</h6>

                  <select name="jenis_kelamin" class="form-control">
                    <option value="">Silakan Pilih Jenis Kelamin</option>
                    <option <?php if ($data_indikator['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?> value="Laki-laki">Laki-laki</option>
                    <option <?php if ($data_indikator['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?> value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Tinggi Badan</h6>
                  <input type="text" name="tinggi" class="form-control" placeholder="Masukan Tinggi Badan Maksimal..." value="<?php echo $data_indikator['tinggi']; ?>" required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nilai CF</h6>
                  <input type="text" name="nilai_cf" class="form-control" placeholder="Masukan Nilai CF ..." value="<?php echo $data_indikator['nilai_cf']; ?>" required>
                </div>
              </div>
              
              <div class="form-group row mb-3 ml-2">
                <a href="<?= base_url('data_indikator'); ?>" class="btn btn-danger ml-3">Batal</a>
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