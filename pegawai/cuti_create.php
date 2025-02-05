<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Buat Pengajuan";
$menuparent = "cuti";
include("layout_top.php");
$now = date('Y-m-d');
$id = $sess_pegawaiid;
$username = $sess_pegawainame;
?>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pengajuan jaminan</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" name="cuti" action="cuti_insert.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Form Pengajuan Jaminan</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Agen</label>
								<div class="col-sm-4">
									<input type="text" name="nama_agen" class="form-control" value="<?php echo $username; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama perushaan</label>
								<div class="col-sm-4">
									<input type="text" name="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">No Telpon</label>
								<div class="col-sm-4">
									<input type="tel" name="no_telp" placeholder="Telpon" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Jenis Jaminan</label>
								<div class="col-sm-4">
								<input type="text" name="jenis_jaminan" placeholder="Jenis Jaminan" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nilai Jaminan</label>
								<div class="col-sm-4">
								<input type="text" name="nilai_jaminan" placeholder="Nilai Jaminan" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Type Jaminan</label>
								<div class="col-sm-4">
									<select name="type" id="type" class="form-control" required>
										<option value="" selected>======== Pilih Type ========</option>
										<?php
										$type_names = [
											"suretybond" => "Suretybond",
											"bankgaransi" => "Bank Garansi",
											"kreditmikro" => "Kredit Mikro",
											"barangjasa" => "Kredit Barang/Jasa",
											"multiguna" => "Kredit Multiguna"
										];
										
										?>
										<?php foreach ($type_names as $value => $label): ?>
        									<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
    									<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
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