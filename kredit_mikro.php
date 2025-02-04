<?php
include("sess_check.php");

// Deskripsi halaman
$pagedesc = "Kredit Mikro";
include("layout_top.php");
include("dist/function/format_tanggal.php");
include("dist/function/format_rupiah.php");
include("libs/formatMataUang.php");
?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Kredit Mikro</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <?php include("layout_alert.php"); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="tabel-data">
              <thead>
                <tr>
                  <th width="1%">No. Pemohon</th>
                  <th width="10%">Nama Agen</th>
                  <th width="10%">Nama Perusahaan</th>
                  <th width="5%">Telepon</th>
                  <th width="10%">Jenis Jaminan</th>
                  <th width="10%">Nilai Jaminan</th>
                  <th width="10%">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                $sql = "SELECT * FROM jaminan WHERE type='kreditmikro' ORDER BY nama_agen ASC";
                $ress = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($ress)) {
                ?>
                  <tr>
                    <td class="text-center"> <?= $data['id']; ?> </td>
                    <td class="text-center"> <?= $data['nama_agen']; ?> </td>
                    <td class="text-center"> <?= $data['nama_perusahaan']; ?> </td>
                    <td class="text-center"> <?= $data['no_telp']; ?> </td>
                    <td class="text-center"> <?= $data['jenis_jaminan']; ?> </td>
                    <td class="text-center"> <?= formatRupiah($data['nilai_jaminan']); ?> </td>
                    <td class="text-center">
                      <a href="#myModal" data-toggle="modal" data-load-code="<?= $data['id']; ?>" data-remote-target="#myModal .modal-body" class="btn btn-primary btn-xs">Detail</a>
                      <a href="suretybond_edit.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-xs">Edit</a>
                      <a href="action/suretybond_hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?= $data['nama_agen']; ?>?');" class="btn btn-danger btn-xs">Hapus</a>
                    </td>
                  </tr>
                <?php
                  $i++;
                }
                ?>
              </tbody>
            </table>
          </div>

          <!-- Modal Detail -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-body">
                  <p>One fine body…</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#tabel-data').DataTable({
      "responsive": true,
      "processing": true,
      "columnDefs": [{
        "orderable": false,
        "targets": [6]
      }]
    });

    $('#tabel-data').parent().addClass("table-responsive");
  });
</script>

<script>
  var app = {
    code: '0'
  };

  $('[data-load-code]').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var code = $this.data('load-code');
    if (code) {
      $($this.data('remote-target')).load('suretybond_detail.php?code=' + code);
      app.code = code;
    }
  });
</script>

<?php
include("layout_bottom.php");
?>
?>
?>
?>
?>
