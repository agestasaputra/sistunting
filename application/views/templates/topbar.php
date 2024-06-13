<div class="navbar-bg bg-primary"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="" data-toggle="sidebar" class="nav-link nav-link-lg"><i class='bx bx-menu'></i></a></li>
    </ul>
    <div class="text-white">
      <h5></h5>
    </div>
  </form>
  <ul class="navbar-nav navbar-right">



    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="<?= base_url(); ?>assets/img/man.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block"><?= $nama ?></div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="" class="dropdown-item has-icon text-primary" data-toggle="modal" data-target="#editModal">
          <i class="fas fa-user"></i> Lihat Profil
        </a>
        <a href="<?= base_url(); ?>auth" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>

  </ul>
</nav>