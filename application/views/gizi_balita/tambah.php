<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $judul ?></h1>
    </div>

    <div class="row">
      <div class="col-12 col-md-12">
        <div class="card">
          <?= $this->session->flashdata('notif'); ?>
          <div class="card-body">

            <?php echo form_open_multipart('gizi_balita/tambah'); ?>
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
                  <select name="jenis_kelamin" id="select_jenis_kelamin" class="form-control" required>
                    <option value="">Silakan Pilih Jenis Kelamin</option>
                    <option value="Laki-laki"> Laki-laki </option>
                    <option value="Perempuan"> Perempuan </option>
                  </select>
                </div>
              </div>

              <!-- Usia -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Usia (Bulan)</h6>
                  <input type="text" name="usia" id="input_usia" class="form-control" placeholder="Masukan Usia Balita" required>
                </div>
              </div>
              
              <!-- Tanggal Pengukuran -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Tanggal Pengukuran</h6>
                  <input type="date" name="tgl_ukur" class="form-control" required> </input>
                </div>
              </div>

              <!-- Berat Badan -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Berat Badan (Kg)</h6>
                  <input type="text" name="berat_badan" id="berat_badan" class="form-control" placeholder="Masukan Berat Badan" required>
                </div>
              </div>

              <!-- Tinggi Badan -->
              <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Tinggi Badan (Cm)</h6>
                  <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control" placeholder="Masukan Tinggi Badan" required>
                </div>
              </div>

              <!-- Status Gizi -->
              <!-- <div class="form-group row mb-3 mx-2">
                <div class="col-sm-12 col-md-12">
                  <h6 class="text-dark">Status Gizi</h6>
                  <input type="text" name="status_gizi" class="form-control" placeholder="Masukan Status Gizi ..." required>
                </div>
              </div> -->

              <!-- Button Batal dan Simpan -->
              <div class="form-group row mb-3 mx-2">
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

<script type="text/javascript">
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
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log('error', xhr, ajaxOptions, thrownError)}
    });
  }
</script>