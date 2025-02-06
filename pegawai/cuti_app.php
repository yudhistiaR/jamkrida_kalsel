<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Approved";
	include("layout_top.php");
	include("../dist/function/format_tanggal.php");
	include("../dist/function/format_rupiah.php");
	$id = $sess_pegawaiid;
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Jaminan Approved</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
						<?php
								$Sql = "SELECT
								pengajuan_jaminan.id AS id_pengajuan,
								user.username AS nama_user,
								user.email,
								user.telp_emp,
								jaminan.id AS no_pemohon,
								jaminan.nama_agen,
								jaminan.nama_perusahaan,
								jaminan.jenis_jaminan,
								jaminan.nilai_jaminan,
								admin.nama_adm,
								pengajuan_jaminan.status,
								pengajuan_jaminan.type_jaminan,
								pengajuan_jaminan.create_at,
								pengajuan_jaminan.update_at
							  FROM pengajuan_jaminan
							  JOIN user ON pengajuan_jaminan.user_id = user.id
							  JOIN jaminan ON pengajuan_jaminan.jaminan_id = jaminan.id
							  LEFT JOIN admin ON pengajuan_jaminan.admin_id = admin.id_adm
							  WHERE pengajuan_jaminan.status = 'Di Setujui' AND user_id='$sess_pegawaiid'
							  ORDER BY pengajuan_jaminan.id ASC";
								$Qry = mysqli_query($conn, $Sql);
								
							?>						
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
										<th width="10%">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i=1;
											while ($data = mysqli_fetch_array($Qry)) {
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
												echo '<td class="text-center">' . $data['status'] . '</td>';
												echo '</tr>';
												$i++;													
											}
										?>
									</tbody>
								</table>
							</div>
			<!-- Large modal -->
			<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<p>Sedang memproses…</p>
						</div>
					</div>
				</div>
			</div>    
						</div><!-- /.panel -->
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [
				{ "orderable": false, "targets": [] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
	<script>
		var app = {
			code: '0'
		};
		
		$('[data-load-code]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-code');
					if(code) {
						$($this.data('remote-target')).load('cuti_detail.php?code='+code);
						app.code = code;
						
					}
		});		

    </script>
<?php
	include("layout_bottom.php");
?>