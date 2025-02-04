<?php
	include("sess_check.php");
	
	if(isset($_GET['id'])) {
		$sql = "SELECT * FROM Jaminan WHERE id='". $_GET['id'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	// deskripsi halaman
	$pagedesc = "Data Suretybond";
	$menuparent = "master";
	include("layout_top.php");
?>
<!-- <script type="text/javascript">
	function checkNppAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_nppavailability.php",   
		data:'id='+$("#id").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
	});
	} -->
</script>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Bank Garansi</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="bank_garansi_update.php" method="POST" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">No.Pemohon</label>
										<div class="col-sm-4">
											<input type="text" name="id" class="form-control" placeholder="No.Pemohon" value="<?php echo $data['id'] ?>" readonly>
										</div>
									</div>      
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Agen</label>
										<div class="col-sm-4">
											<input type="text" name="nama_agen" class="form-control" placeholder="Nama Agen" value="<?php echo $data['nama_agen'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Perusahaan</label>
										<div class="col-sm-4">
											<input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $data['nama_perusahaan'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Telepon</label>
										<div class="col-sm-4">
											<input type="number" name="no_telp" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['no_telp'] ?>"required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jenis Jaminan</label>
										<div class="col-sm-4">
											<input type="text" name="jenis_jaminan" class="form-control" placeholder="Jenis Jaminan" value="<?php echo $data['jenis_jaminan'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nilai Jaminan</label>
										<div class="col-sm-3">
											<input type="text" name="nilai_jaminan" class="form-control" placeholder="Nilai Jaminan" value="<?php echo $data['nilai_jaminan'] ?>" required>
										</div>
									</div>
								<div class="panel-footer">
									<button type="submit" name="perbarui" class="btn btn-success">Update</button>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>