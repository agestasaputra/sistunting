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
            <!-- Php script untuk menghandlue submit button (redirect ke halaman testing/proses) -->
            <?php echo form_open_multipart('testing/proses'); ?>
            <form>
              <!-- Nama Balita -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Nama Balita</h6>
                  <select name="nama_balita" id="select_nama_balita" class="form-control" onchange="handle_dropdown_change(this.options[this.selectedIndex].value)">
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
                  <select name="jenis_kelamin" id="select_jenis_kelamin" class="form-control" readonly style="pointer-events: none;">
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Laki-laki"> Laki-laki </option>
                    <option value="Perempuan"> Perempuan </option>
                  </select>
                </div>
              </div>

              <!-- Usia -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Usia (Bulan)<h6>
                  <input type="number" name="usia" id="input_usia" class="form-control" placeholder="Masukan usia" required readonly style="pointer-events: none;">
                </div>
                <!-- <input type="hidden" name="kategori_usia" id="kategori_usia" class="form-control" > -->
              </div>

              <!-- Tinggi Badan -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Tinggi Badan Lahir (Cm) </h6>
                  <input type="number" name="tinggi_badan" id="input_tinggi_badan" class="form-control" placeholder="Masukan tinggi Badan" required readonly style="pointer-events: none;">
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
                                if ($no-1 === 10) echo '<span id="text_info_tambahan"><i></i></span>';
                              ?>
                            </td>
                            <td>
                              <select name="pilihan[]" id="select_gejala_<?= $no-1 ?>" class="form-control" onchange="handle_cf(this.options[this.selectedIndex].value, '<?= $a['nilai_cf'] ?>', '<?= $no-1 ?>')" required <?php echo $no-1 === 10 ? "readonly style='pointer-events: none;'" : ''; ?>>
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
                                <input name="nilai_cf[]" id="input_nilai_cf_<?= $no-1 ?>" class="form-control border border-secondary mr-1 mb-1" value="<?= $a['nilai_cf']; ?>" required>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                <input name="nilai_cf_calculation[]" id="input_nilai_cf_calculation_<?= $no-1 ?>" class="form-control border border-success" value="" required>
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
  // kode ini akan berjalan setiap kali halaman di load
  window.addEventListener("pageshow", () => {
    handle_reset_input()

    // reset select_nama_balita value menjadi value kosong
    const select_nama_balita = document.getElementById('select_nama_balita');
    select_nama_balita.value = '';
  });

  // fungsi ini bertujuan untuk mereset semua input atau select form
  function handle_reset_input() {
    const select_jenis_kelamin = document.getElementById('select_jenis_kelamin');
    const input_usia = document.getElementById('input_usia');
    const input_tinggi_badan = document.getElementById('input_tinggi_badan');
    const select_gejala_1 = document.getElementById('select_gejala_1');
    const select_gejala_2 = document.getElementById('select_gejala_2');
    const select_gejala_3= document.getElementById('select_gejala_3');
    const select_gejala_4 = document.getElementById('select_gejala_4');
    const select_gejala_5 = document.getElementById('select_gejala_5');
    const select_gejala_6 = document.getElementById('select_gejala_6');
    const select_gejala_7 = document.getElementById('select_gejala_7');
    const select_gejala_8 = document.getElementById('select_gejala_8');
    const select_gejala_9 = document.getElementById('select_gejala_9');
    const select_gejala_10 = document.getElementById('select_gejala_10');
    select_jenis_kelamin.value = '';
    input_usia.value = '';
    input_tinggi_badan.value = '';
    select_gejala_1.value = ''
    select_gejala_2.value = ''
    select_gejala_3.value = ''
    select_gejala_4.value = ''
    select_gejala_5.value = ''
    select_gejala_6.value = ''
    select_gejala_7.value = ''
    select_gejala_8.value = ''
    select_gejala_9.value = ''
    select_gejala_10.value = ''
  }

  // fungsi ini bertujuan untuk menghandle ketika terdapat perubahan value pada select_gejala_1 sampai select_gejala_9
  function handle_cf(value_select_gejala, nilai_cf, index) {
    let result = null
    // kode ini bertujuan untuk memberikan value pada variabel result
    if (value_select_gejala === 'Ya') {
      // jika value_select_gejala adalah 'Ya', maka result akan diisi dengan nilai_cf
      result = +nilai_cf
    } else {
      // jika value_select_gejala adalah 'Tidak', maka result akan diisi dengan 0
      result = 0
    }
    // kode ini bertujuan untuk memberikan value pada input_nilai_cf_calculation_1 sampai input_nilai_cf_calculation_2 berdasarkan result
    const input_nilai_cf_calculation = document.getElementById(`input_nilai_cf_calculation_${index}`)
    input_nilai_cf_calculation.value = result
  }

  // fungsi ini bertujuan untuk membuat deskripsi tambahan berdasarkan usia
  function generate_description_age(usia, tb_lahir) {
    let batas_tinggi_badan = 99
    if (usia < 60 ) {
      batas_tinggi_badan = 99
    } if (usia < 48) {
      batas_tinggi_badan = 87
    } if (usia < 36) {
      batas_tinggi_badan = 80
    } if (usia < 24) {
      batas_tinggi_badan = 68
    } if (usia < 12) {
      batas_tinggi_badan = 45
    }

    // memberi value text_info_tambahan berdasarkan usia dan batas_tinggi_badan untuk ditampikan di tabel gejala
    const text_info_tambahan = document.getElementById('text_info_tambahan')
    text_info_tambahan.innerHTML = `<i>(Tinggi badan normal untuk usia <b>${usia} bulan</b> adalah <b>${batas_tinggi_badan} cm</b>)</i>`

    // memberi value select_gejala_10 berdasarkan tb_lahir dan batas_tinggi_badan 
    const select_gejala_10 = document.getElementById('select_gejala_10');
    select_gejala_10.value = tb_lahir >= batas_tinggi_badan ? 'Ya' : 'Tidak';
    
    // memberi value input_nilai_cf_calculation_10 berdasarkan select_gejala_10 dan input_nilai_cf_10 
    const input_nilai_cf_calculation_10 = document.getElementById('input_nilai_cf_calculation_10');
    const input_nilai_cf_10 = document.getElementById('input_nilai_cf_10');
    input_nilai_cf_calculation_10.value = select_gejala_10.value === 'Ya' ? input_nilai_cf_10.value : 0
  }

  // fungsi ini bertujuan untuk mendapatkan usia berdasarkan tgl_lahir (dd/mm/yyyy)
  function get_age(tgl_lahir) {
    // kode ini bertujuan untuk merubah format tgl_lahir menjadi format Date di Javascript
    const birth_date = new Date(tgl_lahir);
    // kode ini bertujuan untuk mendapatkan tanggal hari ini (dalam bentuk format Date di Javascript)
    const today = new Date();
    // kode ini bertujuan untuk menghitung selisih bulan antara birth_date dan today
    const month_diff = (today.getFullYear() - birth_date.getFullYear()) * 12 + (today.getMonth() - birth_date.getMonth());
    // kode ini bertujuan untuk menghitung usia dalam bulan
    const age_in_months = month_diff + (today.getDate() < birth_date.getDate() ? -1 : 0);
    return age_in_months
  }

  // fungsi ini bertujuan untuk menghandle ketika terdapat perubahan value pada select_nama_balita
  function handle_dropdown_change(balita_id) {
    // kode ini bertujuan untuk melakukan proses ajax tujuannya untuk mengambil data_detail_balita berdasarkan balita_id
    const BASE_URL = '<?php echo base_url(); ?>';
    $.ajax({
      type: "GET",
      url: `${BASE_URL}/testing/get_detail_balita/${+balita_id}`,
      dataType: "json",
      success: function(response) {
        console.log('response:', response)
        // jika response null (kosong/tidak ada datanya), maka reset input dan hentikan alur
        if (!response) {
          handle_reset_input()
          return;
        }

        // kode ini bertujuan untuk mengisi value select_jenis_kelamin, input_tinggi_badan, dan input_usia berdasarkan response
        const select_jenis_kelamin = document.getElementById('select_jenis_kelamin');
        select_jenis_kelamin.value = response.jenis_kelamin;
        const input_tinggi_badan = document.getElementById('input_tinggi_badan');
        input_tinggi_badan.value = response.tb_lahir;        
        const input_usia = document.getElementById('input_usia');
        const hasil_usia = get_age(response.tgl_lahir); 
        input_usia.value = hasil_usia;
        generate_description_age(hasil_usia, response.tb_lahir);
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log('error', xhr, ajaxOptions, thrownError)}
    });
  }
</script>