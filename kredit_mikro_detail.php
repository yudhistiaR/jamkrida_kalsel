<!-- Printing -->
<link rel="stylesheet" href="css/printing.css">

<?php
include("sess_check.php");
include("dist/function/format_tanggal.php");
include("libs/formatMataUang.php");

if ($_GET) {
    $kode = $_GET['code'];
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
          pengajuan_jaminan.status,
          pengajuan_jaminan.create_at,
          pengajuan_jaminan.update_at
        FROM pengajuan_jaminan
        JOIN user ON pengajuan_jaminan.user_id = user.id
        JOIN jaminan ON pengajuan_jaminan.jaminan_id = jaminan.id
        LEFT JOIN admin ON pengajuan_jaminan.admin_id = admin.id_adm
        WHERE pengajuan_jaminan.id = '$kode'
        ORDER BY pengajuan_jaminan.id ASC";

    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
} else {
    echo "Nomor Transaksi Tidak Terbaca";
    exit;
}
?>
<html>

<head>
</head>

<body>
    <div id="section-to-print">
        <div id="only-on-print">
        </div>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Detail Kredit Mikro</h4>
        </div>
        <div><br />
            <table width="100%">
                <tr>
                    <td width="20%"><b>No.Pemohon</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo $result['id']; ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Nama Agen</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo $result['nama_agen']; ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Nama Perusahaan</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo $result['nama_perusahaan']; ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Telepon</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo $result['telp_emp']; ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Email</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo $result['email']; ?></td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Janis Jaminan</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo $result['jenis_jaminan']; ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Nilai Jamian</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo formatRupiah($result['nilai_jaminan']); ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Tanggal Pengajuan</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo format_tanggal($result['create_at']); ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Tanggal Perubahan</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo format_tanggal($result['update_at']); ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Status</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo $result['status']; ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%"><b>Di ubah oleh</b></td>
                    <td width="2%"><b>:</b></td>
                    <td width="78%"><?php echo $result['nama_adm'] ?? "-"; ?></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

</body>

</html>