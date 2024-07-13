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
                    $no = 0;
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
              <!-- <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Jenis Kelamin (L/P)</h6>
                  <select name="jenis_kelamin" id="select_jenis_kelamin" class="form-control" readonly style="pointer-events: none;">
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Laki-laki"> Laki-laki </option>
                    <option value="Perempuan"> Perempuan </option>
                  </select>
                </div>
              </div> -->

              <!-- Usia -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Jenis Kelamin (Bulan)<h6>
                  <input type="text" name="jenis_kelamin" id="select_jenis_kelamin" class="form-control" placeholder="Masukkan jenis kelamin" required readonly style="pointer-events: none;">
                </div>
                <!-- <input type="hidden" name="kategori_usia" id="kategori_usia" class="form-control" > -->
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
                      if ($data_gejala) :
                        foreach ($data_gejala as $key=>$value) :
                      ?>
                          <tr>
                            <td>
                              <?= $key+1 ?>
                            </td>
                            <td>
                              <span><?= $value['nama_gejala']; ?></span>
                              <?php
                                if ($key === 9) echo '<span id="text_info_tambahan"><i></i></span>';
                              ?>
                            </td>
                            <td>
                              <select name="pilihan[]" id="select_gejala_<?= $key+1 ?>" class="form-control" required <?php echo $key === 9 ? "readonly style='pointer-events: none;'" : ''; ?>>
                                <?php if ($key === 9) : ?>
                                  <option value="">Silakan Pilih </option>
                                  <option value="0">Tidak</option>
                                  <option value="1">Sangat yakin</option>
                                <?php else : ?>
                                  <option value="">Silakan Pilih </option>
                                  <option value="0">Tidak</option>
                                  <option value="0.4">Kurang yakin</option>
                                  <option value="0.6">Mungkin</option>
                                  <option value="0.8">Cukup yakin</option>
                                  <option value="1">Sangat yakin</option>
                                </select>
                              <?php endif; ?>
                            </td>
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

  // fungsi ini bertujuan untuk membuat deskripsi tambahan berdasarkan usia
  function generate_description_age(usia, tb_lahir) {
    const data_gejala = <?= json_encode($data_gejala) ?>;
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
    select_gejala_10.value = tb_lahir < batas_tinggi_badan ? 1 : 0;
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
    const select_jenis_kelamin = document.getElementById('select_jenis_kelamin');
    const input_tinggi_badan = document.getElementById('input_tinggi_badan');
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
        select_jenis_kelamin.value = response.jenis_kelamin;
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