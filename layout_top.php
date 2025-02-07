<?php
// Setting tanggal
$haries = array(
  "Sunday" => "Minggu",
  "Monday" => "Senin",
  "Tuesday" => "Selasa",
  "Wednesday" => "Rabu",
  "Thursday" => "Kamis",
  "Friday" => "Jum'at",
  "Saturday" => "Sabtu"
);
$bulans = array(
  "",
  "Januari",
  "Februari",
  "Maret",
  "April",
  "Mei",
  "Juni",
  "Juli",
  "Agustus",
  "September",
  "Oktober",
  "November",
  "Desember"
);

// Tanggal, bulan, dan tahun hari ini
$hari_ini = $haries[date("l")];
$bulan_ini = $bulans[date("n")];
$tanggal = date("d");
$tahun = date("Y");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi Pengajuan Jaminan PT. Jamkrida Kalsel - <?php echo $pagedesc; ?></title>

  <link href="foto/logo.png" rel="icon" type="images/x-icon">

  <!-- Bootstrap Core CSS -->
  <link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="libs/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="libs/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="libs/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">
  <link href="dist/css/offline-font.css" rel="stylesheet">
  <link href="dist/css/custom.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- jQuery -->
  <script src="libs/jquery/dist/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <img src="libs/images/logo.png" alt="brand" width="32" class="float-left image-brand">
          <div class="float-right">&nbsp;<strong>PT. Jamkrida Kalsel</strong></div>
          <div class="clear-both"></div>
        </a>
      </div>

      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>&nbsp;<?php echo ($sess_admname); ?>&nbsp;<i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="pengaturan.php"><i class="fa fa-gear fa-fw"></i>&nbsp;Pengaturan Akun</a></li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
          </ul>
        </li>
      </ul>

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li class="sidebar-search">
              <h4>Pengajuan Jaminan PT.JAMKRIDA KALSEL<br> <b></b></h4>
              <h5 class="text-muted"><i class="fa fa-calendar fa-fw"></i>&nbsp;<?php echo $hari_ini . ", " . $tanggal . " " . $bulan_ini . " " . $tahun; ?></h5>
            </li>
            <li <?php echo ($pagedesc == "Beranda") ? 'class="active"' : ''; ?>>
              <a href="index.php"><i class="fa fa-home fa-fw"></i>&nbsp;Beranda</a>
            </li>
            <li <?php echo (isset($menuparent) && $menuparent == "master") ? 'class="active"' : ''; ?>>
              <a href="#"><i class="fa fa-group fa-fw"></i>&nbsp;DATA MASTER<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li <?php echo ($pagedesc == "Suretybond") ? 'class="active"' : ''; ?>>
                  <a href="./suretybond.php">Suretybond</a>
                </li>
                <li <?php echo ($pagedesc == "Bank Garansi") ? 'class="active"' : ''; ?>>
                  <a href="./bank_garansi.php">Bank Garansi</a>
                </li>
                <li <?php echo ($pagedesc == "Kredit Mikro") ? 'class="active"' : ''; ?>>
                  <a href="./kredit_mikro.php">Kredit Mikro</a>
                </li>
                <li <?php echo ($pagedesc == "Kredit Barang/Jasa") ? 'class="active"' : ''; ?>>
                  <a href="./barang_jasa.php">Kredit Barang/Jasa</a>
                </li>
                <li <?php echo ($pagedesc == "Kredit Multiguna") ? 'class="active"' : ''; ?>>
                  <a href="./multiguna.php">Kredit Multiguna</a>
                </li>
              </ul>
            </li>
            <li <?php echo (isset($menuparent) && $menuparent == "approval") ? 'class="active"' : ''; ?>>
              <a href="#"><i class="fa fa-download fa-fw"></i>&nbsp;Persetujuan<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li <?php echo ($pagedesc == "Approved") ? 'class="active"' : ''; ?>>
                  <a href="app.php">Disetujui</a>
                </li>
                <li <?php echo ($pagedesc == "Semua Data") ? 'class="active"' : ''; ?>>
                  <a href="app_all.php">Semua Data</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</body>

</html>