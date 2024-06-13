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

           
            <a class="btn  btn-primary mb-2" href="#" onclick="printTable();"><i class="bx bx-printer"></i> &nbsp; Cetak Laporan</a>
            <br>
            <div class="table-responsive">
              <table class="table table-bordered table-md" id="table-2">
                <thead>
                  <tr>
                    <th class="text-center">No</th>

                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama Balita</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Nama Ibu</th>
                    <th class="text-center">Nama Ayah</th>
                    <th class="text-center">BB Lahir</th>
                    <th class="text-center">TB Lahir</th>
                    <th class="text-center">Alamat</th>


                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  if ($data_balita) :
                    foreach ($data_balita as $a) :
                  ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>


                        <td class="text-center"><?= $a['nik']; ?></td>
                        <td class="text-center"><?= $a['nama_balita']; ?></td>
                        <td class="text-center"><?= $a['tgl_lahir']; ?></td>
                        <td class="text-center"><?= $a['jenis_kelamin']; ?></td>
                        <td class="text-center"><?= $a['nama_ibu']; ?></td>
                        <td class="text-center"><?= $a['nama_ayah']; ?></td>
                        <td class="text-center"><?= $a['bb_lahir']; ?></td>
                        <td class="text-center"><?= $a['tb_lahir']; ?></td>
                        <td class="text-center"><?= $a['alamat']; ?></td>



                       
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
<?php foreach ($data_balita as $a) ?>
  <div class="modal fade" id="deleteModal<?php echo $a['id_balita'];  ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $a['id_balita'];  ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?php echo form_open_multipart('data_balita/hapus'); ?>
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel<?php echo $a['id_balita']; ?>">Hapus Data Gizi Balita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <input type="hidden" name="id_balita" value="<?php echo $a['id_balita'];  ?>">

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


<!-- JavaScript untuk mencetak tabel -->

<script>
  function printTable() {
    var printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Data Balita</title>');
    // Tambahkan CSS inline untuk gaya cetakan
    printWindow.document.write('<style>');
    printWindow.document.write('h1 { text-align: center; font-size: 18px; }');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('th, td { border: 1px solid #000; padding: 8px; text-align: center; }');
    printWindow.document.write('</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h1><?= $judul ?></h1>');
    printWindow.document.write(document.getElementById('table-2').outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
  }
</script>
