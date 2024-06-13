<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon">
                        <img src="<?= base_url(); ?>assets/img/balita.png" class=" w-75">
                    </div>
                    <div class="card-wrap">

                        <div class="card-header">
                            <h6 style="font-size: 15px;">Data Balita</h6>
                        </div>
                        <div class="card-body">
                            <?= $jumlah_data_balita ?>
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon">
                        <img src="<?= base_url(); ?>assets/img/gizi.png" class=" w-75">
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h6 style="font-size: 15px;">Data Konsultasi</h6>
                        </div>
                        <div class="card-body">
                           <?= $jumlah_data_konsultasi ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon">
                        <img src="<?= base_url(); ?>assets/img/training.png" class=" w-75">
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h6 style="font-size: 15px;">Data Gejala</h6>
                        </div>
                        <div class="card-body">
                        <?= $jumlah_data_gejala ?>
                        </div>
                    </div>
                </div>
            </div>




        </div>

        <!-- <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Status Resiko Stunting</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="penyakitChart" width="300" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $labels = [];
        $data = [];

        foreach ($penyakit_data as $penyakit) {
            $labels[] = $penyakit['status_gizi'];
            $data[] = $penyakit['total'];
        }
        ?>


        <script>
            var ctx = document.getElementById('penyakitChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: [
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56',
                            '#20c997',
                            // Add more colors as needed
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom', // Ubah posisi legend ke bawah
                            labels: {
                                usePointStyle: true, // Menggunakan style titik
                            }
                        },
                        datalabels: {
                            color: 'white',
                            formatter: function(value, context) {
                                var dataset = context.chart.data.datasets[0];
                                var total = dataset.data.reduce(function(previousValue, currentValue) {
                                    return previousValue + currentValue;
                                });
                                var percentage = ((value / total) * 100).toFixed(2);
                                return percentage + '%';
                            },
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    maintainAspectRatio: false,
                    animation: {
                        animateRotate: true,
                        animateScale: true
                    }
                }
            });
        </script> -->






        <!-- <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="myChart" height="332" width="631" style="display: block; width: 631px; height: 332px;" class="chartjs-render-monitor"></canvas>-->
    </section>



</div>