<?php
session_start();
@$user = $_SESSION['user'];
if (!isset($user)) {
  ?>
<script>
  document.location.href= '../index.php';
</script>
<?php
} else {
include "boot.php";
?>

<body background="img/bg.jpg" style="background-size:cover;">

  <!-- ini navbar -->
  <div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid bg-success">
    <img src="../img/bsip.png" alt="logo" class="navbar-logo" style="max-width: 80px; max-height: 80px;">
    <a class="navbar-brand text-light" ><b>BUKU TAMU JASA PENELITIAN BPSITS</b></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search" method="POST" action="search.php" target="konten">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" 
        name="search">
        <button class="btn btn-outline me-2 text-light" type="submit" name="" value="cari"><i class="bi bi-search"></i></button>
        
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Akun
  </button>
  </form>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#"><?= $user?></a></li>
    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
  </ul>
</div>

    </div>
  </div>
</nav>
<!-- penutup navbar -->

<!-- ini halaman -->

<div class="row">
    <div class="col col-3 mt-3">
    <ul class="list-group bg-secondary">
  <li class="list-group-item bg-success text-light" aria-current="true"><b>Menu</b></li>
        <a href="dashboard.php" target="konten">
  <li class="list-group-item"><i class="bi bi-speedometer2"></i> <b>Dashboard</b></li>
        </a>
        <a href="input.php" target="konten">
  <li class="list-group-item">
        <i class="bi bi-pencil-square"></i> 
        <b>Input Data Tamu</b>
  </li>
        </a>
        <a href="data.php" target="konten">
  <li class="list-group-item">
        <i class="bi bi-table"></i> 
        <b>Data Tamu</b>
  </li>
        </a>
        <a href="laporan.php" target="konten">
  <li class="list-group-item">
        <i class="bi bi-file-earmark-text"></i> <!-- Icon Laporan Bootstrap -->
        <b>Laporan</b>
  </li>
    </a>
        <a href="logout.php" target="">
  <li class="list-group-item">
  <i class="bi bi-box-arrow-right"></i>
        <b>Log Out</b>
  </li>
    </a>
</ul>
</div>

<div class="col">
    <iframe src="dashboard.php" name="konten" frameborder="0" width="100%" height="800"></iframe>
</div>

<!-- tutup halaman -->
</body>
</div>
  </body>
</html>
<?php
}
?>