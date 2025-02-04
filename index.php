<?php
include("sess_check.php");

// query database mencari data admin
$sql_e = "SELECT id FROM user WHERE active='Aktif'";
$ress_e = mysqli_query($conn, $sql_e);
$e = mysqli_num_rows($ress_e);

$sql_wait = "SELECT no_cuti FROM cuti WHERE stt_cuti='Menunggu APproval HRD'";
$ress_wait = mysqli_query($conn, $sql_wait);
$wait = mysqli_num_rows($ress_wait);

// deskripsi halaman
$pagedesc = "Beranda";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-head er">Beranda</h1>
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-check-circle fa-3x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge"><?php echo $e; ?></div>
                <div>
                  <h4>Surety Bond</h4>
                </div>
              </div>
            </div>
          </div>
          <a href="karyawan.php">
            <div class="panel-footer">
              <span class="pull-left">Lihat Rincian</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div><!-- /.panel-green -->

      <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-check-circle fa-3x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge"><?php echo $e; ?></div>
                <div>
                  <h4>Bank Garansi</h4>
                </div>
              </div>
            </div>
          </div>
          <a href="karyawan.php">
            <div class="panel-footer">
              <span class="pull-left">Lihat Rincian</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div><!-- /.panel-green -->

      <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-check-circle fa-3x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge"><?php echo $e; ?></div>
                <div>
                  <h4>Kredit mikro</h4>
                </div>
              </div>
            </div>
          </div>
          <a href="karyawan.php">
            <div class="panel-footer">
              <span class="pull-left">Lihat Rincian</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-check-circle fa-3x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge"><?php echo $e; ?></div>
                <div>
                  <h4>Kredit Barang/Jasa</h4>
                </div>
              </div>
            </div>
          </div>
          <a href="karyawan.php">
            <div class="panel-footer">
              <span class="pull-left">Lihat Rincian</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-check-circle fa-3x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge"><?php echo $e; ?></div>
                <div>
                  <h4>Kredit Multiguna</h4>
                </div>
              </div>
            </div>
          </div>
          <a href="karyawan.php">
            <div class="panel-footer">
              <span class="pull-left">Lihat Rincian</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>

      <!-- /.panel-green -->

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
      </div><!-- /.panel-green -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
include("layout_bottom.php");
?>
