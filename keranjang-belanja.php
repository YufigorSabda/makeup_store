<?php
if (isset($_GET['kode_produk']) && isset($_GET['jumlah'])) {
    $kode_produk = $_GET['kode_produk'];
    $jumlah = $_GET['jumlah'];
    include 'database.php';

    $sql = "SELECT * FROM produk WHERE kode_produk='$kode_produk'";
    $query = mysqli_query($kon, $sql);
    $data = mysqli_fetch_array($query);

    $kode_produk = $data['kode_produk'];
    $nama_produk = $data['nama'];
    $harga = $data['harga'];
    $stok = $data['stok'];
} else {
    $kode_produk = "";
    $jumlah = 0;
}

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
} else {
    $aksi = "";
}

switch ($aksi) {
    case "tambah_produk":
        $itemArray = array($kode_produk => array('kode_produk' => $kode_produk, 'nama_produk' => $nama_produk, 'jumlah' => $jumlah, 'harga' => $harga, 'stok' => $stok));
        if (!empty($_SESSION["keranjang_belanja"])) {
            if (in_array($data['kode_produk'], array_keys($_SESSION["keranjang_belanja"]))) {
                foreach ($_SESSION["keranjang_belanja"] as $k => $v) {
                    if ($data['kode_produk'] == $k) {
                        $_SESSION["keranjang_belanja"][$k]['jumlah'] += $jumlah;
                    }
                }
            } else {
                $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"], $itemArray);
            }
        } else {
            $_SESSION["keranjang_belanja"] = $itemArray;
        }
        break;

    case "hapus":
        if (!empty($_SESSION["keranjang_belanja"])) {
            foreach ($_SESSION["keranjang_belanja"] as $k => $v) {
                if ($_GET["kode_produk"] == $k) {
                    unset($_SESSION["keranjang_belanja"][$k]);
                }
                if (empty($_SESSION["keranjang_belanja"])) {
                    unset($_SESSION["keranjang_belanja"]);
                }
            }
        }
        break;

    case "update":
        $itemArray = array($kode_produk => array('kode_produk' => $kode_produk, 'nama_produk' => $nama_produk, 'jumlah' => $jumlah, 'harga' => $harga));
        if (!empty($_SESSION["keranjang_belanja"])) {
            foreach ($_SESSION["keranjang_belanja"] as $k => $v) {
                if ($_GET["kode_produk"] == $k) {
                    $_SESSION["keranjang_belanja"][$k]['jumlah'] = $jumlah;
                }
            }
        }
        break;

        case "cetak_pdf":
            require_once('tcpdf/tcpdf.php');
            ob_clean(); // tambahkan ini untuk membersihkan output sebelum mencetak PDF
    
            // Buat instance TCPDF
            $pdf = new TCPDF();
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Your Name');
            $pdf->SetTitle('Keranjang Belanja');
            $pdf->SetSubject('Keranjang Belanja PDF');
            $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    
            // Set header dan footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
    
            // Tambah halaman
            $pdf->AddPage();
    
            // Set font
            $pdf->SetFont('helvetica', '', 12);
    
            // Buat HTML untuk konten PDF
            $html = '<h1>Keranjang Belanja</h1>';
            $html .= '<table border="1" cellpadding="4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>';
    
            $no = 0;
            $total = 0;
            if (!empty($_SESSION["keranjang_belanja"])) {
                foreach ($_SESSION["keranjang_belanja"] as $item) {
                    $no++;
                    $sub_total = $item["jumlah"] * $item['harga'];
                    $total += $sub_total;
                    $html .= '<tr>
                                <td>' . $no . '</td>
                                <td>' . $item["kode_produk"] . '</td>
                                <td>' . $item["nama_produk"] . '</td>
                                <td>Rp. ' . number_format($item["harga"], 0, ',', '.') . '</td>
                                <td>' . $item["jumlah"] . '</td>
                                <td>Rp. ' . number_format($sub_total, 0, ',', '.') . '</td>
                              </tr>';
                }
            }
            $html .= '<tr>
                        <td colspan="5" align="right"><strong>Total</strong></td>
                        <td><strong>Rp. ' . number_format($total, 0, ',', '.') . '</strong></td>
                      </tr>';
            $html .= '</tbody></table>';
    
            // Tulis HTML ke PDF
            $pdf->writeHTML($html, true, false, true, false, '');
    
            // Tutup dan keluarkan PDF
            $pdf->Output('keranjang_belanja.pdf', 'I');
            exit;

        break;
}
?>
<html>

<head>
	<!-- INI BAGIAN JUDUL DAN ICON WEB -->
	<title>YUNANDA.MAKEUP</title>
	<link rel="icon" type="image/png" href="logo.jpg" />
	<style>
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			padding: 20px;
		}

		.box {
			width: 30%;
			margin-bottom: 5px;
			border: 1px solid;
			padding: 15px;
			box-sizing: border-box;
		}
	</style>
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
						<li><img src="img/seller.png" alt="Image" height="15" width="15" /> <a href="bukutamu.php">Seller </a><br /><br />
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
				<font size="+10">Halaman Beranda</font> <br>

<div class="row">
    <h2 style="margin-bottom:30px;">Keranjang Belanja</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th width="40%">Nama</th>
                <th>Harga</th>
                <th width="10%">QTY</th>
                <th>Sub Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sub_total = 0;
            $total = 0;
            if (!empty($_SESSION["keranjang_belanja"])) :
                foreach ($_SESSION["keranjang_belanja"] as $item) :
                    $no++;
                    $sub_total = $item["jumlah"] * $item['harga'];
                    $total += $sub_total;
            ?>
                    <input type="hidden" name="kode_produk[]" class="kode_produk" value="<?php echo $item["kode_produk"]; ?>" />
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $item["kode_produk"]; ?></td>
                        <td><?php echo $item["nama_produk"]; ?></td>
                        <td>Rp. <?php echo number_format($item["harga"], 0, ',', '.'); ?> </td>
                        <td>
                            <input type="number" min="1" value="<?php echo $item["jumlah"]; ?>" class="form-control" id="jumlah<?php echo $no; ?>" name="jumlah[]">
                            <script>
                                $("#jumlah<?php echo $no; ?>").on('change', function() {
                                    var jumlah = $("#jumlah<?php echo $no; ?>").val();
                                    $("#jumlaha<?php echo $no; ?>").val(jumlah);
                                });
                                $("#jumlah<?php echo $no; ?>").keydown(function(event) {
                                    return false;
                                });
                            </script>
                        </td>
                        <td>Rp. <?php echo number_format($sub_total, 0, ',', '.'); ?> </td>
                        <td>
                            <form method="get">
                                <input type="hidden" name="kode_produk" value="<?php echo $item['kode_produk']; ?>" class="form-control">
                                <input type="hidden" name="aksi" value="update" class="form-control">
                                <input type="hidden" name="halaman" value="keranjang-belanja" class="form-control">
                                <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>" id="jumlaha<?php echo $no; ?>" class="form-control">
                                <input type="submit" class="btn btn-warning btn-xs" value="Update">
                            </form>
                            <a href="index.php?halaman=keranjang-belanja&kode_produk=<?php echo $item['kode_produk']; ?>&aksi=hapus" class="btn btn-danger btn-xs" role="button">Delete</a>
                        </td>
                    </tr>
            <?php endforeach; endif; ?>
        </tbody>
	 <tr>
            <td colspan="5" align="right">Total</td>
            <td>Rp. <?php echo number_format($total, 0, ',', '.'); ?></td>
            <td></td>
        </tr>
    </table>
    <?php if (!empty($_SESSION["keranjang_belanja"])) { ?>
                <a href="index.php?halaman=keranjang-belanja&aksi=cetak_pdf" class="btn btn-primary">Cetak PDF</a>

            <?php } ?>

</div>


            </td>
</table>
</body>
</html>