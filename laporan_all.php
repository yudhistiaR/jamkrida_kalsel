<?php
	include("sess_check.php");

	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");

	$sql = "SELECT
									user.username AS nama_user,
									jaminan.id AS no_pemohon,
									jaminan.nama_agen,
									jaminan.nama_perusahaan,
									jaminan.jenis_jaminan,
									jaminan.nilai_jaminan,
									pengajuan_jaminan.create_at,
									pengajuan_jaminan.update_at,
									pengajuan_jaminan.type_jaminan
								FROM pengajuan_jaminan
								JOIN user ON pengajuan_jaminan.user_id = user.id
								JOIN jaminan ON pengajuan_jaminan.jaminan_id = jaminan.id
								LEFT JOIN admin ON pengajuan_jaminan.admin_id = admin.id_adm
								ORDER BY pengajuan_jaminan.id ASC";

	$query = mysqli_query($conn,$sql);
	// deskripsi halaman
	$pagedesc = "Laporan Data Pengajuan Jamina";
	$pagetitle = str_replace(" ", "_", $pagedesc);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Universitas Sangga Buana YPKP">

	<title><?php echo $pagetitle ?></title>

	<link href="libs/images/logo_perusahaan.png" rel="icon" type="images/x-icon">


	<!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td class="text-left" width="20%">
							<img src="libs/images/logo_perusahaan.png" alt="logo-dkm" width="70" />
						</td>
						<td class="text-center" width="60%">
						<b>CV. Indosari</b> <br>
						Jl.Sapan Rancakaso, Desa Tegalluar, Kec.Bojongsoang, Kab.Bandung, Jawa Barat 30522 <br>
						Telp: (021) 89115030<br>
						<td class="text-right" width="20%">
							<img src="libs/images/logo_perusahaan.png" alt="logo-dkm" width="70"/>
						</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">LAPORAN DATA CUTI</h4>
			<h5 class="text-center">Periode</h5>
			<br />
			<table class="table table-bordered table-keuangan">
			<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
									<tr>
                                        <th width="1%">No</th>
                                        <th width="10%">No Permohonan</th>
                                        <th width="15%">Nama Agen</th>
                                        <th width="15%">Nama perusahaan</th>
                                        <th width="10%">Jenis Jaminan</th>
                                        <th width="10%">Nilai Jaminan</th>
                                        <th width="10%">Tipe Jaminan</th>
                                        <th width="10%">Tanggal Pengajuan</th>
                                        <th width="10%">Tanggal Persetujuan</th>
								    </tr>
									</thead>
									<tbody>
									<?php
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo '<tr>';
                                            echo '<td class="text-center">' . $i . '</td>';
                                            echo '<td class="text-center">' . $data['no_pemohon'] . '</td>';
                                            echo '<td class="text-center">' . $data['nama_agen'] . '</td>';
                                            echo '<td class="text-center">' . $data['nama_perusahaan'] . '</td>';
                                            echo '<td class="text-center">' . $data['jenis_jaminan'] . '</td>';
                                            echo '<td class="text-center">' . format_rupiah($data['nilai_jaminan']) . '</td>';
                                            $type_display = isset($type_names[$data['type_jaminan']]) ? $type_names[$data['type_jaminan']] : $data['type_jaminan'];
                                            echo '<td class="text-center">' . $type_display . '</td>';
                                            echo '<td class="text-center">' . format_tanggal($data['create_at']) . '</td>';
                                            echo '<td class="text-center">' . format_tanggal($data['update_at']) . '</td>';
                                            echo '</tr>';
                                            $i++;
                                        }
								    ?>
									</tbody>
								</table>
			<br />
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>
</html>