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
                  <select name="nama_balita" class="form-control" onchange="handleDropdownChange()">
                    <option value=""> Pilih nama balita</option>
                    <?php
                    $no = 1;
                    if ($data_balita) :
                      foreach ($data_balita as $balita) :
                    ?>
                      <option value="<?= $balita['id_balita']; ?>"><?= $balita['nama_balita']; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Jenis Kelamin</h6>
                  <select name="jenis_kelamin" id="form-jenis-kelamin" class="form-control" disabled>
                    <option value="">Pilih jenis kelamin</option>
                    <option value="laki-laki"> Laki-laki </option>
                    <option value="perempuan"> Perempuan </option>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Usia </h6>
                  <input type="number" name="usia" id="form-usia" class="form-control" placeholder="Masukan usia" required disabled>
                </div>
              </div>

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Tinggi Badan Lahir (Cm) </h6>
                  <input type="number" name="tinggi_badan" id="form-tinggi-badan" class="form-control" placeholder="Masukan tinggi Badan" required disabled>
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

<script type="text/javascript">
  function getAge(tglLahir) {
    const birthDate = new Date(tglLahir);
    const today = new Date();
    const monthDiff = (today.getFullYear() - birthDate.getFullYear()) * 12 + (today.getMonth() - birthDate.getMonth());
    const ageInMonths = monthDiff + (today.getDate() < birthDate.getDate() ? -1 : 0);
    return ageInMonths
  }
  function handleDropdownChange($event) {
    const BASE_URL = '<?php echo base_url(); ?>';
    $.ajax({
      type: "GET",
      url: `${BASE_URL}/testing/get_detail_balita/${+event.target.value}`,
      dataType: "json",
      success: function(response) {
        // mapping data to form
        const formJenisKelamin = document.getElementById('form-jenis-kelamin');
        formJenisKelamin.value = response.jenis_kelamin;
        const formTinggiBadan = document.getElementById('form-tinggi-badan');
        formTinggiBadan.value = response.tb_lahir;        
        const formUsia = document.getElementById('form-usia');
        const resultAge = getAge(response.tgl_lahir); 
        formUsia.value = resultAge;
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log('error', xhr, ajaxOptions, thrownError)}
    });
  }
</script>