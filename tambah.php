<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Tambah data</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center">
      <h1 class="text-center mt-4">Form Tambah Data</h1>
      <form method="POST">
        <div class="mb-3">
          <label for="inputpricelist" class="form-label">pricelist</label>
          <input type="number" class="form-control" id="inputpricelist" name="pricelist" placeholder="Masukan pricelist">
        </div>
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukan Nama pelanggan">
        </div>
        <div class="mb-3">
          <label for="inputkategorimakeup" class="form-label">kategorimakeup</label>
          <input type="text" class="form-control" id="inputkategorimakeup" name="kategorimakeup" placeholder="Masukan kategorimakeup">
        </div>
        <div class="mb-3">
          <label for="inputmakeuplook" class="form-label">makeuplook</label>
          <input type="text" class="form-control" id="inputmakeuplook" name="makeuplook" placeholder="Masukan makeuplook">
        </div>
        <div class="mb-3">
          <label for="inputcontact" class="form-label">contact</label>
          <input type="text" class="form-control" id="inputcontact" name="contact" placeholder="Masukan contact">
        </div>
        <div class="mb-3">
          <label for="inputreserved" class="form-label">reserved</label>
          <input type="text" class="form-control" id="inputreserved" name="reserved" placeholder="Masukan reserved">
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Tambah">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php

  // Buat kondisi jika tombol data di klik
  if (isset($_POST['daftar'])) {
    // Membuat variable setiap field inputan agar kodingan lebih rapi.
    $pricelist = $_POST['pricelist'];
    $nama = $_POST['nama'];
    $kategorimakeup = $_POST['kategorimakeup'];
    $makeuplook = $_POST['makeuplook'];
    $contact = $_POST['contact'];
    $reserved = $_POST['reserved'];

    // Membuat Query
    $query = "INSERT INTO tb_siswa (pricelist, nama, kategorimakeup, makeuplook, contact, reserved ) VALUES('" . $pricelist . "', '" . $nama . "', '" . $kategorimakeup . "', '" . $makeuplook . "', '" . $contact . "', '" . $reserved . "')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
      header("location: pricelist.php");
    } else {
      echo "<script>alert('Data Gagal di tambahkan!')</script>";
    }
  }

  ?>

</body>

</html>