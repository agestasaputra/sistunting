
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/template/assets/css/components.css">

  <style>
        body {
            background-color: white;
        }
    </style>

<style>
        .col-lg-8 {
            display: flex;
            justify-content: right;
            align-items: right;
        }
        .icon-center {
            max-width: 100%;
            height: auto;
        }
    </style>

<style>
        .btn.btn-success.btn-lg.btn-icon.btn-block {

            font-size: 17px;
            /* Anda dapat menambahkan properti CSS lainnya jika diperlukan */
        }
    </style>
</head>

<body>
  <div id="app">
    <div class="container mt-5">
      <div class="row ">
        <div class="col-lg-4   ">
          <h3 class=" mt-5 text-dark font-weight-normal text-center mb-5"> <span class="font-weight-bold">REGISTER</span></h3>
            <?php echo form_open_multipart('auth/proses_register'); ?>
            <form class="needs-validation" >
              <?= $this->session->flashdata('notif'); ?>
              <div class="form-group">
                <input id="nama" type="text" class="form-control" name="nama"  placeholder="NAMA LENGKAP" required autofocus>
              </div>

              <div class="form-group">
                <input id="username" type="text" class="form-control" name="username"  placeholder="USERNAME" required >
              </div>

              <div class="form-group">
                <input id="nohp" type="text" class="form-control" name="nohp"  placeholder="NO HP" required >
              </div>
             
              <div class="form-group">
                <input id="password" type="password" class="form-control" name="password"  placeholder="PASSWORD">
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-success btn-lg btn-icon btn-block" >
                  Daftar
                </button>
              </div>

              <div class="mt-5 text-center">
                Sudah punya akun? <a href="<?= base_url('auth') ?>">Silahkan Login</a>
              </div>

            </form>
            <?php echo form_close(); ?>     
        </div>
        <div class="col-lg-2 ">
        </div>
        <div class="col-lg-6 ">
          <div>
            <img src="<?= base_url(); ?>assets/img/login.jpg"  class="  w-100 content-center">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/template/assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/template/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/template/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
