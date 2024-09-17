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
    <?php   
    include 'database.php';
    $sql="select * from produk order by id_produk desc";
    $hasil=mysqli_query($kon,$sql);
    $jumlah = mysqli_num_rows($hasil);
    if ($jumlah>0){
        while ($data = mysqli_fetch_array($hasil)):
    ?>
        <div class="col-sm-3">
            <div class="thumbnail">
                <a href="#"><img src="gambar/<?php echo $data['gambar'];?>" width="100%" alt="Cinque Terre"></a>
                <div class="caption">
                    <h3><?php echo $data['nama'];?></h3>
                    <h4>Rp. <?php echo number_format($data['harga'],2,',','.'); ?> </h4>
                    <p><a href="index.php?halaman=keranjang-belanja&kode_produk=<?php echo $data['kode_produk'];?>&aksi=tambah_produk&jumlah=1" class="btn btn-primary btn-block" role="button">Masukan Keranjang</a></p>
                </div>
            </div>
        </div>
        <?php 
        endwhile;
    }else {
        echo "<div class='alert alert-warning'> Tidak ada produk pada kategori ini.</div>";
    };
    ?>
</div>