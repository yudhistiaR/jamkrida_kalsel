<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Laporan Data Cuti";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Laporan Data Jaminan</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
					        <form method="get" name="laporan" onSubmit="return valid();"> 
								<div class="form-group">
									<div class="col-sm-4">
										<label>Type Jaminan</label>
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
									<div class="col-sm-4">
										<label>&nbsp;</label><br/>
										<input type="submit" name="submit" value="Lihat Laporan" class="btn btn-primary">
									</div>
								</div>
							</form>
							</div>
						</div>
						<?php
							if(isset($_GET['submit'])){
								$no=0;
								$type 	 = $_GET['type'];
								$sql = "SELECT
											pengajuan_jaminan.id AS id_pengajuan,
											user.username AS nama_user,
											user.email,
											jaminan.id AS no_pemohon,
											jaminan.nama_agen,
											jaminan.nama_perusahaan,
											jaminan.jenis_jaminan,
											jaminan.nilai_jaminan,
											pengajuan_jaminan.status,
											pengajuan_jaminan.type_jaminan
										FROM pengajuan_jaminan
										JOIN user ON pengajuan_jaminan.user_id = user.id
										JOIN jaminan ON pengajuan_jaminan.jaminan_id = jaminan.id
										LEFT JOIN admin ON pengajuan_jaminan.admin_id = admin.id_adm
										WHERE pengajuan_jaminan.type_jaminan = '$type'
										ORDER BY pengajuan_jaminan.id ASC";
								$query = mysqli_query($conn,$sql);
							?>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
									<tr>
										<th width="1%">No</th>
										<th width="10%">No Pemohon</th>
										<th width="10%">Nama Agen</th>
										<th width="10%">Nama Perusahaan</th>
										<th width="10%">Jenis Jaminan</th>
										<th width="10%">Nilai Jaminan</th>
										<th width="10%">Status</th>
										<th width="10%">Opsi</th>
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
											echo '<td class="text-center">' . $data['status'] . '</td>';
											echo '<td class="text-center">
															<a href="#myModal" data-toggle="modal" data-load-code="' . $data['id_pengajuan'] . '" data-remote-target="#myModal .modal-body" class="btn btn-primary btn-xs">Detail</a>'; ?>
											<a href="cuti_hapus.php?no=<?php echo $data['no_pemohon']; ?>" onclick="return confirm('Apakah anda yakin akan membatalkan pengajuan cuti No. <?php echo $data['no_pemohon']; ?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
										<?php
											echo '</td>';
											echo '</tr>';
											$i++;
										}
									?>
									</tbody>
								</table>
							<div class="form-group">
									<a href="laporan_cetak.php?type=<?php echo $type;?>" target="_blank" class="btn btn-warning">Cetak</a>
							</div>
							</div>
			<!-- Large modal -->
			<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<p>One fine body…</p>
						</div>
					</div>
				</div>
			</div>    
						</div><!-- /.panel -->
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
			<?php }?>
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [
				{ "orderable": false, "targets": [4] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
<script>
		var app = {
			code: '0'
		};
</script>
<?php
	include("layout_bottom.php");
?>