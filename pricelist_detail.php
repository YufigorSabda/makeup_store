<!-- Panggil file koneksi, karena kita membutuhkan nya -->
<?php
include "koneksi.php"
?>
<html>

<head>
    <!-- INI BAGIAN JUDUL DAN ICON WEB -->
    <title>YUNANDA.MAKEUP</title>
    <link rel="icon" type="image/png" href="logo.jpg" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<!-- INI BAGIAN BACKGROUND WEB -->

<body body background="background.png"><br>

    <!-- MULAI MEMBUAT FRAME / LAYOUT DESAIN WEB -->
    <table width="1024" border="0" align="center" bgcolor="#8B0000">

        <!-- INI BAGIAN HEADER -->
        <tr>
            <td colspan="2"> <img src="img/benner.png" alt="Image" height="250" width="1200" /></td>
        </tr>

        <!-- INI BAGIAN MENU -->

        <tr>
            <td align="left" colspan="2" height="50" width="1200" bgcolor="#FFFAF0">
                <nav>
                    <font color="red">
                        ||&nbsp;
                        <a href="home.html">HOME</a> &nbsp;&nbsp;||&nbsp;&nbsp;
                        <a href="makeuplook.html">MAKEUP LOOK</a> &nbsp;&nbsp;||&nbsp;&nbsp;
                        <a href="pricelist.php">PRICELIST</a> &nbsp;&nbsp;||&nbsp;&nbsp;
                        <a href="about.html">TENTANG KAMI</a> &nbsp;&nbsp;||&nbsp;&nbsp;
                        <a href="registrasi.php">REGISTRASI</a> &nbsp;&nbsp;||&nbsp;&nbsp;
                        <a href="ulasan.php">ULASAN</a> &nbsp;&nbsp;||&nbsp;&nbsp;
                    </font>
                </nav>
            </td>
        </tr>


        <!-- INI BAGIAN SIDEBAR MENU -->

        <tr valign="top">
            <td align="left" width="125" bgcolor="#FFE4E1">
                <hr>
                <input type="search" id="site-search" name="q" aria-label="Search through site content">
                <button>Cari Barang</button>
                <br>
                <hr>
                <hr>
                <a href="belajarphp.php">
                    <img src="img/b.jpg" alt="Image" height="70" width="150" />
                    </ul>
                    <br>
                    <hr>
                    <hr>
                    <img src="img/mua.jpg
	" alt="Image" height="70" width="150" />
                    <ul TYPE="SQUARE">
                        <li><img src="img/profile.png" alt="Image" height="15" width="15" /> <a href="biodata.php">Penjual </a><br /><br />
                        <li><img src="img/maps.png" alt="Image" height="15" width="15" /> <a href="lokasi.php">Lokasi </a><br /><br />
                        <li><img src="img/buku.png" alt="Image" height="15" width="15" /> <a href="buku_tamu.php">Buku Tamu </a><br /><br />
                        <li><img src="img/seller.png" alt="Image" height="15" width="15" /> <a href="form_input.php">Seller </a><br /><br />
                        <li><img src="img/logo.jpg" alt="Image" height="15" width="15" /> <a href="form_inputdatadiri.php">Input Profile </a><br /><br />
                    </ul>
                    <br>
                    <hr>
                    <hr>
                    <img src="img/kontak.jpg" alt="Image" height="70" width="150" />
                    <ol type="1">
                        <li><img src="img/nikahan12.jpg" alt="Image" height="15" width="15" /> <a href="kamera.php">wedding</a><br /><br />
                        <li><img src="img/nabila.jpg" alt="Image" height="15" width="15" /> <a href="lensa.php">photoshoot</a><br /><br />
                        <li><img src="img/atta.jpg" alt="Image" height="15" width="15" /> <a href="lenshood.php">graduation</a><br />
                    </ol>
                    <br>
                    <hr>
                    <hr>
                    <a href="testimoni/testimoni.php">
                        <img src="img/testi.png" alt="Image" height="70" width="150" />
                        <br>
                        <hr>
                        <hr>
                        <a href="payment.php">
                            <img src="img/dana.webp" alt="Image" height="70" width="150" /></a><br>
                        <img src="img/mb.jpg" alt="Image" height="40" width="150" /><br>
                        <img src="img/shopeepay.png" alt="Image" height="80" width="150" /><br>
                        <br>
                        <hr>
                        <hr>
                        <a><b>Social Media :</b></a><br>
                        <a href="https://www.facebook.com"> <!-- berikan url profil FB anda-->
                            <img src="img/fb.png" alt="Image" height="25" width="25" /></a> &nbsp;
                        <a href="https://www.instagram.com"> <!-- berikan url profil IG anda-->
                            <img src="img/ig.png" alt="Image" height="25" width="25" /></a> &nbsp;
                        <a href="https://www.twitter.com"> <!-- berikan url profil twitter anda-->
                            <img src="img/x.png" alt="Image" height="25" width="25" /></a> &nbsp;
                        <a href="https://wa.me/628xxxxxxxxxx"> <!-- 628xxxxxxxxxx ganti dengan nomor hp anda-->
                            <img src="img/wa.png" alt="Image" height="25" width="25" /></a> &nbsp;
            </td>



            <!-- INI BAGIAN HALAMAN KONTEN -->
            <td align="center" width="900" bgcolor="#FFF0F5">
                <font size="+10">Detail Product</font> <br>
                <section class="row mt-5">
                    <div class="col-md-6 offset-md-3 align-self-center">

                        <?php
                        // variable no digunakan untuk meng-increments field no pada table. Karena nanti kita akan melooping data hasil query select kita. 
                        $no = 1;
                        $id = $_GET['id'];
                        // Simpan query kita kedalam variable agar lebih rapi, dan bisa reusable.
                        // Arti dari query di bawah adalah pilih semua data dari table tb_siswa.
                        $query = "SELECT * FROM tb_siswa WHERE id = $id";
                        // Eksekusi Query
                        // Simpan hasil eksekusi query kita ke dalam variable. Di sini variable nya saya kasih nama result.
                        $result = mysqli_query($koneksi, $query);
                        // Done. Waktunya Looping
                        ?>
                        <?php
                        foreach ($result as $data) {
                            echo "
                                    <table class='table'>
                                        <tr>
                                            <th>Price List</th>
                                            <td>" . $data["pricelist"] . "</td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td>" . $data["nama"] . "</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>" . $data["kategorimakeup"] . "</td>
                                        </tr>
                                        <tr>
                                            <th>Makeup Look</th>
                                            <td><img src='img/" . $data['makeuplook'] . "' width='300' height='300' style='object-fit: cover'></td>
                                        </tr>
                                        <tr>
                                            <th>Contact</th>
                                            <td>" . $data["contact"] . "</td>
                                        </tr>
                                        <tr>
                                            <th>Reserved</th>
                                            <td>" . $data["reserved"] . "</td>
                                        </tr>
                                    </table>
                                ";
                        }
                        ?>
                        <a href="pricelist.php" class="btn btn-primary">Kembali</a>
                    </div>
                </section>



            </td>

            <!-- INI BAGIAN FOOTER -->
        <tr>
            <td colspan="2" bgcolor="#FFFAF0">
                <center>
                    <img src="img/logo.jpg" alt="Image" height="30" width="30" />
                    <font color="brown">Copyright &copy; 2021 &nbsp; ||&nbsp; NIM : B12.2022.04717&nbsp; ||&nbsp;NAMA : Yunanda Ayu&nbsp; ||&nbsp;YUNANDA.MAKEUP</font>
                    <img src="img/logo.jpg" alt="Image" height="30" width="30" />
                </center>
            </td>
        </tr>

        </tr>
    </table>
</body>

</html>