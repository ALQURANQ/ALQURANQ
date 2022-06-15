<?php
    require 'function.php';
    $daftarsurah = query("select * from daftarsurah");
    

if(isset($_POST["cari"])) {
    $daftarsurah = cari($_POST["keyword"]);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Al-Quran Digital |Al-Quran-Q</title>
    <style>
      @font-face {
        font-family: Uthmani;
        src: url('assets/font/UthmanicHafs1Ver09.otf') format('truetype');
      }

      .arabic{

        font-family: 'Uthmani', serif;
        font-size: 20px;
        font-weight: bold;
        direction: rtl;
        padding: 0 5px;
        margin: 0;
      }
    </style>
  </head>

  <body>
      <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AL-QURAN Q</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?="contoh.php"?>">BERANDA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">JADWAL SHOLAT</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Urut Berdasarkan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Surah</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Juz</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" action="" method="POST">
        <input class="form-control me-2" name="keyword" placeholder="Cari Surah" autocomplete="off">
        <button class="btn btn-outline-success" type="submit" name="cari">CARI</button>
      </form>
    </div>
  </div>
</nav>

<hr>
        <table class="table table-striped table-bordered">
          <tr>
            <th>No.</th>
            <th>Surah</th>
            <th>Arti</th>
            <th>Jumlah Ayat</th>
            <th>Tempat Turun</th>
            <th>Urutan Pewahyuan</th>
          </tr>
          <?php
            //panggil Koneksi
            include "koneksi.php";
            $tampil = mysqli_query($koneksi, "Select * from daftarsurah");
            while($data = mysqli_fetch_array($tampil)) :
          ?>
              <tr>
                  <td><?=$data['index']?></td>
                  <td>
                   <a href="detail.php?surah=<?=$data['index']?>&nama_surah=<?=$data['surah_indonesia']?>" style="text-decoration: none;"> <?=$data['surah_indonesia']?></a> <span class="arabic">(<?= $data['surah_arab']?>)</span></td>
                  <td><?=$data['arti']?></td>
                  <td><?=$data['jumlah_ayat']?></td>
                  <td><?=$data['tempat_turun']?></td>
                  <td><?=$data['urutan_pewahyuan']?></td>

              </tr>

          <?php
            endwhile;
          ?>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            


  </body>
</html>