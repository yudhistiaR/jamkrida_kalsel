<?php
	include("sess_check.php");

	$id=$sess_pegawaiid;

	$sql_wait = "SELECT COUNT(*) as total FROM pengajuan_jaminan WHERE status='Pending' AND user_id='$id'";
	$ress_wait = mysqli_query($conn, $sql_wait);
	$wait_row = mysqli_fetch_assoc($ress_wait);
	$wait = $wait_row['total'];

	$sql_wait = "SELECT COUNT(*) as total FROM pengajuan_jaminan WHERE status='Di Tolak' AND user_id='$id'";
	$ress_wait = mysqli_query($conn, $sql_wait);
	$wait_row = mysqli_fetch_assoc($ress_wait);
	$tolak = $wait_row['total'];

	$sql_wait = "SELECT COUNT(*) as total FROM pengajuan_jaminan WHERE status='Di Setujui' AND user_id='$id'";
	$ress_wait = mysqli_query($conn, $sql_wait);
	$wait_row = mysqli_fetch_assoc($ress_wait);
	$acc = $wait_row['total'];


	// deskripsi halaman
	$pagedesc = "Beranda";
	include("layout_top.php");
	include("../dist/function/format_rupiah.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal">
							<div class="panel panel-default">
								<div class="panel-body">
								<h2 align="center">Selamat Datang, <?php echo $res['username'];?>!</h2>
								<hr/>
								<center><img src="https://th.bing.com/th/id/R.1871862d87bb8037d953317fb4497189?rik=MBf1NyuchSQUtQ&riu=http%3a%2f%2fwww.pngall.com%2fwp-content%2fuploads%2f5%2fProfile.png&ehk=Ouu2uMvvMPnkP1bdIY2BTAzbwhRoG9p03NUzbwGLhlg%3d&risl=&pid=ImgRaw&r=0" width="120px"></center>
								<hr/>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->

				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-check-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $acc; ?></div>
										<div><h4>Disetujui</h4></div>
									</div>
								</div>
							</div>
							<a href="cuti_app.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->
					
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $wait; ?></div>
										<div><h4>Menunggu Persetujuan</h4></div>
									</div>
								</div>
							</div>
							<a href="cuti_waitapp.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-4 col-md-4">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-minus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $tolak; ?></div>
										<div><h4>Ditolak</h4></div>
									</div>
								</div>
							</div>
							<a href="cuti_reject.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

				</div><!-- /.row -->
				
			</div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>