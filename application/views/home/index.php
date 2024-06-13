<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: white;
        }
    </style>

    <style>
        .btn.btn-lg.btn-round.btn-success {

            font-size: 20px;
            /* Anda dapat menambahkan properti CSS lainnya jika diperlukan */
        }
    </style>
</head>

<body>
    <!-- Content-->
    <div class="container mt-5">
        <div class="row ">
            <div class="col-lg-6 text-left align-self-center">
                <h1 class="mb-3 text-success">SELAMAT DATANG</h1>
                <p class="lead mb-4 text-dark">
                    SISTEM PAKAR DIAGNOSA PENYAKIT TANAMAN KAPULAGA <i> (AMMOMUM CARDAMOMUM L) </i> MENGGUNAKAN ALGORITMA <i>K-NEAREST NEIGHBOR</i> (KNN)
                </p>
                <a href="<?= base_url('diagnosa') ?>" class="btn btn-lg btn-round btn-success">Mulai Diagnosa</a>

            </div>
            <div class="col-lg-6">
                <div>
                    <img src="assets/img/login.jpg" class="px-4 py-4 w-100">
                </div>
            </div>
        </div>
    </div>
</body>

</html>