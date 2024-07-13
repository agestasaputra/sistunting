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

            <div class="table-responsive">
              <table class="table table-bordered table-md" id="table-2">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Balita</th>
                    <th class="text-center">Jenis Kelamin (L/P)</th>
                    <th class="text-center">Usia (Bulan)</th>
                    <th class="text-center">Tinggi Badan (Cm)</th>
                    <th class="text-center">Diagnosa</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center " style="width: 100px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  if ($data_konsultasi) :
                    foreach ($data_konsultasi as $a) :
                  ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $a['nama_balita']; ?></td>
                        <td class="text-center"><?= $a['jenis_kelamin']; ?></td>
                        <td class="text-center"><?= $a['usia']; ?></td>
                        <td class="text-center"><?= $a['tinggi']; ?></td>
                        <td class="text-center"><?= $a['diagnosa']; ?>% </td>
                        <td class="text-center"><?= $a['keterangan']; ?></td>
                        <td class="text-center  " style="width: 100px;">
                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $a['id_konsultasi']; ?>"><i class='fas fa-trash'></i></button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
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


<!-- Modal Hapus Data -->
<?php foreach ($data_konsultasi as $a) { ?>
  <div class="modal fade" id="deleteModal<?php echo $a['id_konsultasi'];  ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $a['id_konsultasi'];  ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?php echo form_open_multipart('data_konsultasi/hapus'); ?>
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel<?php echo $a['id_konsultasi']; ?>">Hapus Data Gizi konsultasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <input type="hidden" name="id_konsultasi" value="<?php echo $a['id_konsultasi'];  ?>">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<?php } ?>