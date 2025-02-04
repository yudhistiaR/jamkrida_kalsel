<?php
include("sess_check.php");
include("libs/formatMataUang.php");

// deskripsi halaman
$pagedesc = "Approval Cuti";
$menuparent = "approval";
include("layout_top.php");
$now = date('Y-m-d');
$sql = "SELECT
          pengajuan_jaminan.id AS id_pengajuan,
          user.username AS nama_user,
          user.telp_emp AS telp,
          user.email,
          jaminan.id AS no_pemohon,
          jaminan.nama_agen,
          jaminan.nama_perusahaan,
          jaminan.jenis_jaminan,
          jaminan.nilai_jaminan,
          pengajuan_jaminan.keterangan_ditolak,
          pengajuan_jaminan.create_at,
		  pengajuan_jaminan.update_at,
          pengajuan_jaminan.status,
          pengajuan_jaminan.type_jaminan
        FROM pengajuan_jaminan
        JOIN user ON pengajuan_jaminan.user_id = user.id
        JOIN jaminan ON pengajuan_jaminan.jaminan_id = jaminan.id
        LEFT JOIN admin ON pengajuan_jaminan.admin_id = admin.id_adm
        WHERE pengajuan_jaminan.id = '" . $_GET['id'] . "'
        ORDER BY pengajuan_jaminan.id ASC";

$Qry = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($Qry);

?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#aksi').change(function() {
			if ($(this).val() === '2') {
				$('#reject').attr('disabled', false);
			} else {
				$('#reject').attr('disabled', 'disabled');
			}
		});

	});
</script>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Persetujuan Jaminan</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" name="cuti" action="approval_update.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Review Pengajuan Cuti</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">No. Pemohon</label>
								<div class="col-sm-4">
									<input type="text" name="id" class="form-control" value="<?php echo $data['id_pengajuan']; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Pemohon</label>
								<div class="col-sm-4">
									<input type="text" name="nama_user" class="form-control" value="<?php echo $data['nama_user']; ?> " readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Tanggal Pengajuan</label>
								<div class="col-sm-4">
									<input type="text" name="mulai" class="form-control" value="<?php echo IndonesiaTgl($data['create_at']); ?> " readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Agen</label>
								<div class="col-sm-4">
									<input type="text" name="nama_agen" class="form-control" value="<?php echo $data['nama_agen']; ?> " readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Perusahaan</label>
								<div class="col-sm-4">
									<input type="text" name="nama_perusahaan" class="form-control" value="<?php echo $data['nama_perusahaan']; ?> " readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Telpon</label>
								<div class="col-sm-4">
									<input type="text" name="telpon" class="form-control" value="<?php echo $data['telp']; ?> " readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Jenis Jaminan</label>
								<div class="col-sm-4">
									<input type="text" name="jenis_jaminan" class="form-control" value="<?php echo $data['jenis_jaminan']; ?> " readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nilai Jaminan</label>
								<div class="col-sm-4">
									<input type="text" name="nilai_jaminan" class="form-control" value="<?php echo formatRupiah($data['nilai_jaminan']); ?> " readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Keterangan</label>
								<div class="col-sm-4">
									<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" readonly><?php echo $data['keterangan_ditolak']; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Aksi</label>
								<div class="col-sm-4">
									<select name="status" id="status" class="form-control" required>
										<option value="" selected>---- Pilih Aksi ----</option>
										<option value="Di Setujui">Disetujui</option>
										<option value="Di Tolak">Ditolak</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Keterangan Ditolak</label>
								<div class="col-sm-4">
									<textarea name="keterangan_ditolak" id="reject" class="form-control" placeholder="Keterangan Reject" rows="3"></textarea>
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