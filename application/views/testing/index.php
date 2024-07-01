<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $judul ?></h1>
    </div>

    <div class="row">
      <div class="col-12 col-md-12 ">
        <div class="card">
          <!-- Toast notification -->
          <?= $this->session->flashdata('notif'); ?>

          <div class="card-body">
            <!-- Php script for handle submit button (redirect into testing/proses) -->
            <?php echo form_open_multipart('testing/proses'); ?>
            <form>
              <!-- Nama Balita -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Nama Balita</h6>
                  <select name="nama_balita[]" id="nama_balita" class="form-control" onchange="handleDropdownChange()">
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
              
              <!-- Jenis Kelamin -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Jenis Kelamin (L/P)</h6>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" readonly style="pointer-events: none;">
                    <option value="">Pilih jenis kelamin</option>
                    <option value="laki-laki"> Laki-laki </option>
                    <option value="perempuan"> Perempuan </option>
                  </select>
                </div>
              </div>

              <!-- Usia -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Usia (Bulan)<h6>
                  <input type="number" name="usia" id="usia" class="form-control" placeholder="Masukan usia" required readonly style="pointer-events: none;">
                </div>
                <!-- <input type="hidden" name="kategori_usia" id="kategori_usia" class="form-control" > -->
              </div>

              <!-- Tinggi Badan -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Tinggi Badan Lahir (Cm) </h6>
                  <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control" placeholder="Masukan tinggi Badan" required readonly style="pointer-events: none;">
                </div>
              </div>

              <h6 class="text-dark ml-4">Gejala yang dialami:</h6>
              <span class="ml-4"><i>Silahkan Pilih Gejala yang di alami!</i></span>
              
              <!-- Table Gejala. Table Nilai CF dan Table Nilai CF Calculation -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <table class="table table-striped">
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
                            <td>
                              <span><?= $a['nama_gejala']; ?></span>
                              <?php
                                if ($no-1 === 10) echo '<span id="additional-info"><i></i></span>';
                              ?>
                            </td>
                            <td>
                              <select name="pilihan[]" id="gejala_<?= $no-1 ?>" class="form-control" onchange="handleCf(this.options[this.selectedIndex].text, '<?= $a['nilai_cf'] ?>', '<?= $no-1 ?>')" required <?php echo $no-1 === 10 ? "readonly style='pointer-events: none;'" : ''; ?>>
                                <option value="">Silakan Pilih </option>
                                <option value="Ya"> Ya</option>
                                <option value="Tidak"> Tidak</option>
                              </select>
                            </td>
                            <div class="row mb-3 mx-2 d-none">
                              <div class="col-sm-12 col-md-6">
                                <input name="kode_gejala[]" class="form-control" value="<?= $a['kode_gejala']; ?>" required>
                              </div>
                            </div>
                            <div class="row mb-3 mx-2 d-none">
                              <div class="col-sm-12 col-md-6">
                                <input name="nilai_cf[]" id="nilai_cf_<?= $no-1 ?>" class="form-control border border-secondary mr-1 mb-1" value="<?= $a['nilai_cf']; ?>" required>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                <input name="nilai_cf_calculation[]" id="nilai_cf_calculation_<?= $no-1 ?>" class="form-control border border-success" value="" required>
                              </div>
                            </div>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <!-- Button Simpan dan Batal -->
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

<script type="text/javascript">
  // this code will run every page is loaded
  window.addEventListener("pageshow", () => {
    resetInput()
    // reset nama balita form value
    const formNamaBalita = document.getElementById('nama_balita');
    formNamaBalita.value = '';
  });
  // this function purpose is to reset all input value
  function resetInput() {
    const formJenisKelamin = document.getElementById('jenis_kelamin');
    const formTinggiBadan = document.getElementById('tinggi_badan');
    const formUsia = document.getElementById('usia');
    const formGelaja1 = document.getElementById('gejala_1');
    const formGelaja2 = document.getElementById('gejala_2');
    const formGelaja3= document.getElementById('gejala_3');
    const formGelaja4 = document.getElementById('gejala_4');
    const formGelaja5 = document.getElementById('gejala_5');
    const formGelaja6 = document.getElementById('gejala_6');
    const formGelaja7 = document.getElementById('gejala_7');
    const formGelaja8 = document.getElementById('gejala_8');
    const formGelaja9 = document.getElementById('gejala_9');
    const formGelaja10 = document.getElementById('gejala_10');
    formJenisKelamin.value = '';
    formTinggiBadan.value = '';
    formUsia.value = '';
    formGelaja1.value = ''
    formGelaja2.value = ''
    formGelaja3.value = ''
    formGelaja4.value = ''
    formGelaja5.value = ''
    formGelaja6.value = ''
    formGelaja7.value = ''
    formGelaja8.value = ''
    formGelaja9.value = ''
    formGelaja10.value = ''
  }
  // this function purpose is to fill the whole form nilai_cf_calculation (exclude nilai_cf_calculation_10) based on gejala value (Ya/Tidak)
  function handleCf(value, nilaiCf, index) {
    let result = null
    if (value === 'Ya') {
      result = +nilaiCf
    } else {
      result = 0
    }
    const domNilaiCf = document.getElementById(`nilai_cf_calculation_${index}`)
    domNilaiCf.value = result
  }
  function generateDescriptionAge(age, currentHeight) {
    let heightLimit = 99
    if (age < 60 ) {
      heightLimit = 99
    } if (age < 48) {
      heightLimit = 87
    } if (age < 36) {
      heightLimit = 80
    } if (age < 24) {
      heightLimit = 68
    } if (age < 12) {
      heightLimit = 45
    }
    // generate additional info (height limit) based on age
    const additionalInfoDOM = document.getElementById('additional-info')
    additionalInfoDOM.innerHTML = `<i>(Tinggi badan normal untuk usia <b>${age} bulan</b> adalah <b>${heightLimit} cm</b>)</i>`

    // assign value form gelaja_10 based on heightLimit
    const formGelaja10 = document.getElementById('gejala_10');
    formGelaja10.value = currentHeight >= heightLimit ? 'Ya' : 'Tidak';
    
    // assign value form nilai_cf_10 based on formGelaja10
    const formNilaiCfCalculation10 = document.getElementById('nilai_cf_calculation_10');
    const formNilaiCf10 = document.getElementById('nilai_cf_10');
    formNilaiCfCalculation10.value = formGelaja10.value === 'Ya' ? formNilaiCf10.value : 0
  }
  // this function purpose is to get age based on tglLahir
  function getAge(tglLahir) {
    const birthDate = new Date(tglLahir);
    const today = new Date();
    const monthDiff = (today.getFullYear() - birthDate.getFullYear()) * 12 + (today.getMonth() - birthDate.getMonth());
    const ageInMonths = monthDiff + (today.getDate() < birthDate.getDate() ? -1 : 0);
    return ageInMonths
  }
  // this function purpose is to handle dropdown change event
  function handleDropdownChange($event) {
    const BASE_URL = '<?php echo base_url(); ?>';
    $.ajax({
      type: "GET",
      url: `${BASE_URL}/testing/get_detail_balita/${+event.target.value}`,
      dataType: "json",
      success: function(response) {
        console.log('response:', response)
        // if response is null, reset input and stop the flow
        if (!response) {
          resetInput()
          return;
        }

        // fill form value based on response
        const formJenisKelamin = document.getElementById('jenis_kelamin');
        formJenisKelamin.value = response.jenis_kelamin;
        const formTinggiBadan = document.getElementById('tinggi_badan');
        formTinggiBadan.value = response.tb_lahir;        
        const formUsia = document.getElementById('usia');
        const resultAge = getAge(response.tgl_lahir); 
        formUsia.value = resultAge;
        generateDescriptionAge(resultAge, response.tb_lahir);
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log('error', xhr, ajaxOptions, thrownError)}
    });
  }
</script>