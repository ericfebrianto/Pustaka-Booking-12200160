<?=$this->extend('dasar_tampilan')?>

<?=$this->section('isiweb')?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Pustaka Booking</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link"href="<?=base_url('/beranda')?>">Beranda</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarPengguna" role="button" 
            data-bs-toggle="dropdown" aria-expanded="false">
            Pengguna
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarPengguna">
            <li><a class="dropdown-item" href="<?=base_url('/pengguna')?>">Tambah Pengguna</a></li>
            <li><a class="dropdown-item" href="<?=base_url('/pengguna-list')?>">Daftar Pengguna</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=base_url('/pengguna-report')?>">Laporan</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link"href="<?=base_url('/logout')?>">Logout</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<?=$this->renderSection('konten')?>
<?=$this->endSection()?> 