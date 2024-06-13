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

            <?php echo form_open_multipart('gizi_balita/ubah'); ?>
            <input hidden type="text" name="id_timbang" class="form-control" value="<?= $data_gizi['id_timbang'] ?>">
            <form>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nama Balita</h6>
                  <input type="text" name="nama_balita" class="form-control" placeholder="Masukan Nama Balita" value="<?= $data_gizi['nama_balita'] ?>" required>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Jenis Kelamin</h6>
                  <select name="jenis_kelamin" class="form-control" required>
                    <option value="">Silakan Pilih Jenis Kelamin</option>
                    <option value="Laki-laki"> Laki-laki </option>
                    <option value="Perempuan"> Perempuan </option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Usia (Bulan)</h6>
                  <input type="text" name="usia" id="usia" class="form-control" placeholder="Masukan Usia Balita" required value="<?= $data_gizi['usia'] ?>">
                
                </div>

              </div>
          
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Berat Badan (Kg)</h6>
                  <input type="text" name="berat_badan" id="berat_badan" class="form-control" placeholder="Masukan Berat Badan" required value="<?= $data_gizi['berat_badan'] ?>">
                
                </div>
              </div>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Tinggi Badan (Cm)</h6>
                  <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control" placeholder="Masukan Tinggi Badan" required value="<?= $data_gizi['tinggi_badan'] ?>">
                 
                </div>
              </div>
              <!-- <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Status Gizi</h6>
                  <input type="text" name="status_gizi" class="form-control" placeholder="Masukan Status Gizi ..." required value="<?= $data_gizi['status_gizi'] ?>">
                </div>
              </div> -->
              <div class="form-group row mb-3 ml-2">
                <a href="<?= base_url('gizi_balita'); ?>" class="btn btn-danger ml-3">Batal</a>
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