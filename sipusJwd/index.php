<?php
include 'koneksi.php';
$tgl = date('Y-m-d');
?>
<!doctype html>
<html>

<head>
  <title>Sistem Informasi Perpustakaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
  .sidebar {
    display: flex;
    flex-direction: column;
    gap: .5rem;
  }

  .sidebar a {
    padding: .3rem .5rem;
    text-decoration: none;
    font-weight: 500;
  }
  .sidebar a:hover {
    background-color: #04009A;
    color: #fff;
  }
  </style>
</head>

<body>
  <nav class="navbar navbar-light" style="background-color: #3D56B2;">
    <div class="container-fluid">
      <div>
        <img src="images/logo.png" alt="logo" height="60px">
      </div>
      <div style="color: #fff; text-align: right;">
        <h2 style="font-weight: 600;">PERPUSTAKAAN UMUM</h2>
        <h6>Jl. Lembah Abang No 11, Telp: (021)55555555</h6>
      </div>
    </div>
  </nav>

  <div class="container-flluid" style="background-color: #04009A;">
    <div class="ms-3 pt-2 pb-2" style="color: #fff;">Hai Admin !</div>
  </div>

  <div class="container-fluid">
    <div class="row" style="min-height: calc(100vh - 160.25px);">
      <div class="col" style="max-width: 250px; background-color: #d7e0ff;">
        <div class="sidebar">
          <a class="mt-3" href="index.php?p=beranda">Beranda</a>
          <p class="label-navigasi mb-0">Entry Data Dan Transaksi</p>
          <a href="index.php?p=anggota">Data Anggota</a>
          <a href="index.php?p=buku">Data Buku</a>
          <a href="index.php?p=transaksi-peminjaman">Transaksi Peminjaman</a>
        </div>
      </div>
      <div class="col">
      <?php
      $pages_dir = 'pages';
      if (!empty($_GET['p'])) {
        $pages = scandir($pages_dir, 0);
        unset($pages[0], $pages[1]);
        $p = $_GET['p'];
        if (in_array($p . '.php', $pages)) {
          include $pages_dir . '/' . $p . '.php';
        } else {
          echo 'Halaman Tidak Ditemukan';
        }
      } else {
        include $pages_dir . '/beranda.php';
      }
      ?>
      </div>
    </div>
  </div>

  <footer class="fixed-bottom" style="background-color: #3D56B2; color: #fff;">
    <div class="container-fluid">
      <h6 class="mt-2" style="text-align: center;">Sistem Informasi Perpustakaan (sipus) | Praktikum </h6>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>


</html>