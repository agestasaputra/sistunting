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
              <table class="table table-bordered table-md" id="table-2">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Username</th>

                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">Status</th>

                    <th class="text-center " style="width: 90px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  if ($user) :
                    foreach ($user as $a) :
                  ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $a['username']; ?></td>
                        <td class="text-center"><?= $a['nama']; ?></td>
                        <td class="text-center"><?= $a['nohp']; ?></td>
                        <td class="text-center"><?= $a['status']; ?></td>
                        <td class="text-center  " style="width: 90px;">
                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $a['id_user']; ?>">Hapus</button>
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
<?php foreach ($user as $a) { ?>
  <div class="modal fade" id="deleteModal<?php echo $a['id_user'];  ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $a['id_user'];  ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?php echo form_open_multipart('user/hapus'); ?>
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel<?php echo $a['id_user']; ?>">Hapus Data Penyakit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <input type="hidden" name="id_user" value="<?php echo $a['id_user'];  ?>">
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