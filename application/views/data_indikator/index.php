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

            <a class="btn btn-primary mb-2" href="<?= base_url('data_indikator/form_tambah'); ?>"> <i class="bx bx-plus"></i>Tambah Data</a>

            <br>
            <div class="table-responsive">
              <table class="table table-bordered table-md" id="table-2">
                <thead>
                  <tr>
                    <th class="text-center">No</th>

                    <th class="text-center">Usia</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Tinggi</th>
                    <th class="text-center">Nilai CF</th>
                    <th class="text-center " style="width: 100px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  if ($data_indikator) :
                    foreach ($data_indikator as $a) :
                  ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $a['usia']; ?></td>
                        <td class="text-center"><?= $a['jenis_kelamin']; ?></td>
                        <td class="text-center"><?= $a['tinggi']; ?></td>
                        <td class="text-center"><?= $a['nilai_cf']; ?></td>
                        <td class="text-center  " style="width: 100px;">
                          <a class="btn btn-sm btn-success" href="<?= base_url('data_indikator/detail_ubah/') . $a['id_indikator']; ?>"><i class='fas fa-edit'></i><br></a>
                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $a['id_indikator']; ?>"><i class='fas fa-trash'></i></button>
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
<?php foreach ($data_indikator as $a) { ?>
  <div class="modal fade" id="deleteModal<?php echo $a['id_indikator'];  ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $a['id_indikator'];  ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?php echo form_open_multipart('data_indikator/hapus'); ?>
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel<?php echo $a['id_indikator']; ?>">Hapus Data Gizi indikator</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <input type="hidden" name="id_indikator" value="<?php echo $a['id_indikator'];  ?>">

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