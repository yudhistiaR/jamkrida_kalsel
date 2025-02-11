<?php
include("sess_check.php");

// Deskripsi halaman
$pagedesc = "Laporan Suretybond";
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
        <h1 class="page-header">Laporan Suretybond</h1>
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
                  <th width="10%">Jenis Jaminan</th>
                  <th width="10%">Nilai Jaminan</th>
                  <th width="10%">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
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
        WHERE pengajuan_jaminan.type_jaminan = 'suretybond'
        ORDER BY pengajuan_jaminan.id ASC";


                $ress = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_assoc($ress)) {
                ?>
                  <tr>
                    <td class="text-center"> <?= $data['id_pengajuan']; ?> </td>
                    <td class="text-center"> <?= $data['nama_user']; ?> </td>
                    <td class="text-center"> <?= $data['nama_perusahaan']; ?> </td>
                    <td class="text-center"> <?= $data['jenis_jaminan']; ?> </td>
                    <td class="text-center"> <?= formatRupiah($data['nilai_jaminan']); ?> </td>
                    <td class="text-center"> <?= $data['status']; ?> </td>
                  </tr>
                <?php
                  $i++;
                }
                ?>
              </tbody>
            </table>
            <div class="form-group">
									<a href="laporan_cetak.php?type=suretybond" target="_blank" class="btn btn-warning">Cetak</a>
							</div>
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
        "targets": [5]
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