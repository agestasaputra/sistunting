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
                  <select name="nama_balita[]" class="form-control" onchange="handleDropdownChange()">
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
                  <h6 class="text-dark">Jenis Kelamin (L/P)</h6>
                  <select name="jenis_kelamin[]" id="jenis-kelamin" class="form-control" readonly style="pointer-events: none;">
                    <option value="">Pilih jenis kelamin</option>
                    <option value="laki-laki"> Laki-laki </option>
                    <option value="perempuan"> Perempuan </option>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Usia (Bulan)<h6>
                  <input type="number" name="usia" id="usia" class="form-control" placeholder="Masukan usia" required readonly style="pointer-events: none;">
                </div>
                <!-- <input type="hidden" name="kategori_usia" id="kategori_usia" class="form-co`ntrol" > -->
              </div>

              <div class="form-group row mb-3 ml-2">
                <div class="col-sm-12 col-md-11">
                  <h6 class="text-dark">Tinggi Badan Lahir (Cm) </h6>
                  <input type="number" name="tinggi_badan" id="tinggi-badan" class="form-control" placeholder="Masukan tinggi Badan" required readonly style="pointer-events: none;">
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
                        <td>
                          <span><?= $a['nama_gejala']; ?></span>
                          <?php
                            if ($no-1 === 10) echo '<span id="additional-info"><i></i></span>';
                          ?>
                        </td>
                        <td>
                          <select name="pilihan[]" id="gejala-<?= $no-1 ?>" class="form-control" required <?php echo $no-1 === 10 ? "readonly style='pointer-events: none;'" : ''; ?>>
                            <option value="">Silakan Pilih </option>
                            <option value="Ya"> Ya</option>
                            <option value="Tidak"> Tidak</option>
                          </select>
                        </td>
                        <input type="hidden" name="kode_gejala[]" class="form-control" value="<?= $a['kode_gejala']; ?>" required>
                        <input type="hidden" name="nilai_cf[]" class="form-control" value="<?= $a['nilai_cf']; ?>" required>
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
  function cfFormula1(cf1, cf2) {
    const result = cf1 + cf2 * (1 - cf1)
    return +result.toFixed(3)
  }
  function cfFormulaBukan1(cfOld, cfNext) {
    const result = cfOld + cfNext * (1 - cfOld)
    return +result.toFixed(3)
  }
  function handleSubmit() {
    const cfGejala = [0.6, 0.6, 0.5, 0.8, 0.6, 0.5];
    const cfOld = []
    let cfPercentage = null

    if (cfGejala.length === 0) {
      cfPercentage = 0
      console.log('cfPercentage:', cfPercentage)
      return
    }

    cfOld.push(cfFormula1(cfGejala[0], cfGejala[1]))

    if (cfGejala.length > 2) {
      console.log('masuk looping!!')
      cfGejala.forEach((cf, index) => {
        if (index > 1) {
          cfOld.push(cfFormulaBukan1(cfOld[cfOld.length-1], cf))
        }
      })
    }

    console.log('cfOld:', cfOld)
    cfPercentage = cfOld[cfOld.length-1] * 100
    console.log('cfPercentage:', cfPercentage)
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
    const additionalInfoDOM = document.getElementById('additional-info')
    additionalInfoDOM.innerHTML = `<i>(Tinggi badan normal untuk usia <b>${age} bulan</b> adalah <b>${heightLimit} cm</b>)</i>`
    const formGelaja10 = document.getElementById('gejala-10');
    formGelaja10.value = currentHeight >= heightLimit ? 'Ya' : 'Tidak';
  }
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
        console.log('response:', response)
        if (!response) {
          const formJenisKelamin = document.getElementById('jenis-kelamin');
          const formTinggiBadan = document.getElementById('tinggi-badan');
          const formUsia = document.getElementById('usia');
          const formGelaja1 = document.getElementById('gejala-1');
          const formGelaja2 = document.getElementById('gejala-2');
          const formGelaja3= document.getElementById('gejala-3');
          const formGelaja4 = document.getElementById('gejala-4');
          const formGelaja5 = document.getElementById('gejala-5');
          const formGelaja6 = document.getElementById('gejala-6');
          const formGelaja7 = document.getElementById('gejala-7');
          const formGelaja8 = document.getElementById('gejala-8');
          const formGelaja9 = document.getElementById('gejala-9');
          const formGelaja10 = document.getElementById('gejala-10');
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
          return;
        }
        // mapping data to form
        const formJenisKelamin = document.getElementById('jenis-kelamin');
        formJenisKelamin.value = response.jenis_kelamin;
        const formTinggiBadan = document.getElementById('tinggi-badan');
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