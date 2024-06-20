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

            <?php echo form_open_multipart('testing/proses'); ?>
            <form>
              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Nama Balita</h6>
                  <select name="nama_balita" class="form-control">
                    <option value="">Silakan Pilih Nama Balita</option>
                    <?php
                    $no = 1;
                    if ($data_balita) :
                      foreach ($data_balita as $balita) :
                    ?>
                        <option value="<?= $balita['nama_balita']; ?>"><?= $balita['nama_balita']; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

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

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Usia </h6>
                  <input type="number" name="usia" id="usia" class="form-control" placeholder="Masukan usia  ..." required>
                </div>
                <input type="hidden" name="kategori_usia" id="kategori_usia" class="form-control" >
              </div>

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Tinggi Badan Lahir (Cm) </h6>
                  <input type="number" name="tinggi_badan" class="form-control" placeholder="Masukan Tinggi Badan ..." required>
                </div>
              </div>

              <h6 class="text-dark ml-4">Gejala yang dialami:</h6>
              <span class="ml-4"><i>Silahkan Pilih Gejala yang di alami!</i></span>
              <table class="table table-striped ml-4 col-md-11">

                <tbody>
                  <?php
                  $no = 1;
                  if ($data_gejala) :
                    foreach ($data_gejala as $a) :
                  ?>
                      <tr>
                        <td>
                          <?= $no++ ?>
                        </td>
                        <td><?= $a['nama_gejala']; ?></td>
                        <td>
                          <select name="pilihan[]" class="form-control" required>
                            <option value="">Silakan Pilih </option>
                            <option value="Ya"> Ya</option>
                            <option value="Tidak"> Tidak</option>
                          </select>
                        </td>
                        <input type="hidden" name="kode_gejala[]" class="form-control" value="<?= $a['kode_gejala']; ?>" required>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
              <br>
              <div class="form-group row mb-3 ml-2 mt-4">
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