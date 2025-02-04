<?php
include("sess_check.php");


$types = ['suretybond', 'bankgaransi', 'kreditmikro', 'barangjasa', 'multiguna'];
$data_counts = [];

foreach ($types as $type) {
  $sql = "SELECT COUNT(*) as total FROM pengajuan_jaminan WHERE type_jaminan = '$type'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $data_counts[$type] = $row['total'];
}

// Query menghitung jumlah pengajuan yang menunggu approval
$sql_wait = "SELECT COUNT(*) as total FROM pengajuan_jaminan WHERE status='Pending'";
$ress_wait = mysqli_query($conn, $sql_wait);
$wait_row = mysqli_fetch_assoc($ress_wait);
$wait = $wait_row['total'];

// deskripsi halaman
$pagedesc = "Beranda";
include("layout_top.php");
?>

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Beranda</h1>
      </div>
    </div>

    <div class="row">
      <?php
      $type_names = [
        "suretybond" => "Suretybond",
        "bankgaransi" => "Bank Garansi",
        "kreditmikro" => "Kredit Mikro",
        "barangjasa" => "Kredit Barang/Jasa",
        "multiguna" => "Kredit Multiguna"
      ];

      $type_files = [
        "suretybond" => "suretybond.php",
        "bankgaransi" => "bank_garansi.php",
        "kreditmikro" => "kredit_mikro.php",
        "barangjasa" => "barang_jasa.php",
        "multiguna" => "multiguna.php"
      ];

      foreach ($type_files as $type => $file) {
      ?>
        <div class="col-lg-6 col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-check-circle fa-3x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <div class="huge"><?php echo $data_counts[$type]; ?></div>
                  <div>
                    <h4><?php echo $type_names[$type]; ?></h4>
                  </div>
                </div>
              </div>
            </div>
            <a href="<?php echo $file; ?>">
              <div class="panel-footer">
                <span class="pull-left">Lihat Rincian</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
      <?php } ?>

      <!-- Panel untuk Menunggu Persetujuan -->
      <div class="col-lg-6 col-md-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-plus-circle fa-3x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge"><?php echo $wait; ?></div>
                <div>
                  <h4>Menunggu Persetujuan</h4>
                </div>
              </div>
            </div>
          </div>
          <a href="app_wait.php">
            <div class="panel-footer">
              <span class="pull-left">Lihat Rincian</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php include("layout_bottom.php"); ?>