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
         
            <br>
            <div class="table-responsive">
              <table class="table table-borderless table-striped" id="table-2">
                <thead>
                  <tr>

                    <th class="text-center">Jenis Laporan</th>
                    <th class="text-center col-3">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                
                 
                      <tr>
                        <td class="text-center">Data Balita</td>
                 
                        <td class="text-center col-3">
                          <a class="btn  btn-success" href="<?= base_url('data_balita/cetak'); ?>"><i class='fas fa-print'></i><br></a>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">Data Imunisasi</td>
                 
                        <td class="text-center col-3">
                          <a class="btn  btn-success" href="<?= base_url('data_imunisasi/cetak'); ?>"><i class='fas fa-print'></i><br></a>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">Data Gizi Balita</td>
                 
                        <td class="text-center col-3">
                          <a class="btn btn-success" href="<?= base_url('gizi_balita/cetak'); ?>"><i class='fas fa-print'></i><br></a>
                        </td>
                      </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>
