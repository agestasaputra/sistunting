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

            <a class="btn btn-primary mb-2" href="<?= base_url('data_gejala/form_tambah'); ?>"> <i class="bx bx-plus"></i>Tambah Data</a>

            <!-- <a class="btn btn-warning mb-2" href="<?= base_url('data_indikator'); ?>"> <i class="bx bx-plus"></i>Kelola Indikator Tinggi</a> -->

            <br>
            <div class="table-responsive">
              <table class="table table-bordered table-md" id="table-2">
                <thead>
                  <tr>
                    <th class="text-center">No</th>

                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama Gejala</th>
                    <th class="text-center">Nilai CF</th>
                    <th class="text-center " style="width: 100px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  if ($data_gejala) :
                    foreach ($data_gejala as $a) :
                  ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>


                        <td class="text-center"><?= $a['kode_gejala']; ?></td>
                        <td class="text-center"><?= $a['nama_gejala']; ?></td>
                        <td class="text-center"><?= $a['nilai_cf']; ?></td>
                        <td class="text-center  " style="width: 100px;">
                          
                          <a class="btn btn-sm btn-success" href="<?= base_url('data_gejala/detail_ubah/') . $a['id_gejala']; ?>"><i class='fas fa-edit'></i><br></a>
                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $a['id_gejala']; ?>"><i class='fas fa-trash'></i></button>
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
<?php foreach ($data_gejala as $a) { ?>
  <div class="modal fade" id="deleteModal<?php echo $a['id_gejala'];  ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $a['id_gejala'];  ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?php echo form_open_multipart('data_gejala/hapus'); ?>
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel<?php echo $a['id_gejala']; ?>">Hapus Data Gizi gejala</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <input type="hidden" name="id_gejala" value="<?php echo $a['id_gejala'];  ?>">

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