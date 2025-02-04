<?php
include("sess_check.php");
include("libs/formatMataUang.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT
                          pengajuan_jaminan.id AS id_pengajuan,
                          user.username AS nama_user,
                          user.email,
                          user.telp_emp,
                          jaminan.id,
                          jaminan.nama_agen,
                          jaminan.nama_perusahaan,
                          jaminan.jenis_jaminan,
                          jaminan.nilai_jaminan,
                          admin.nama_adm,
                          pengajuan_jaminan.status
                        FROM pengajuan_jaminan
                        JOIN user ON pengajuan_jaminan.user_id = user.id
                        JOIN jaminan ON pengajuan_jaminan.jaminan_id = jaminan.id
                        JOIN admin ON pengajuan_jaminan.admin_id = admin.id_adm
                        WHERE pengajuan_jaminan.id = '$id'
                        ORDER BY pengajuan_jaminan.id ASC";
  $ress = mysqli_query($conn, $sql);
  $data = mysqli_fetch_array($ress);
}
// deskripsi halaman
$pagedesc = "Data Suretybond";
$menuparent = "master";
include("layout_top.php");
?>


<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Data suretybond</h1>
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <form class="form-horizontal" action="suretybond_update.php" method="POST" enctype="multipart/form-data">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3>Edit Data</h3>
            </div>
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
                  <input type="number" name="telp_emp" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['telp_emp'] ?>" required>
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
                <div class="col-sm-4">
                  <input type="text" name="nilai_jaminan" class="form-control" placeholder="Nilai Jaminan" value="<?php echo formatRupiah($data['nilai_jaminan']) ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Status pengajuan</label>
                <div class="col-sm-4">
                  <input type="text" name="status" class="form-control" placeholder="Status" value="<?php echo $data['status'] ?>" required>
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
