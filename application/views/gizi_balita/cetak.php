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
                    <th class="text-center">Nama Balita</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Usia</th>
                    <th class="text-center">Tanggal Pengukuran</th>
                    <th class="text-center">Berat Badan</th>
                    <th class="text-center">Tinggi Badan</th>
                    <th class="text-center">Status Gizi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  if ($gizi_balita) :
                    foreach ($gizi_balita as $a) :
                  ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $a['nama_balita']; ?></td>
                        <td class="text-center"><?= $a['jenis_kelamin']; ?></td>
                        <td class="text-center"><?= $a['usia']; ?></td>
                        <td class="text-center"><?= $a['tgl_ukur']; ?></td>
                        <td class="text-center"><?= $a['berat_badan']; ?></td>
                        <td class="text-center"><?= $a['tinggi_badan']; ?></td>
                        <td class="text-center"><?= $a['status_gizi']; ?></td>
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

<!-- JavaScript untuk mencetak tabel -->

<script>
  function printTable() {
    var printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Data Gizi Balita</title>');
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