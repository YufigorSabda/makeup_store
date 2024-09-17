<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = "DELETE FROM buku_tamu WHERE id = '$id'";
$res = mysqli_query($koneksi, $sql);
if ($res) {
    header("location: buku_tamu.php");
}
