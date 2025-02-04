<!-- Printing -->
<link rel="stylesheet" href="css/printing.css">
		
        <?php
        include("sess_check.php");
        include("dist/function/format_tanggal.php");
        if($_GET) {
            $kode = $_GET['code'];
            $sql = "SELECT * FROM Jaminan WHERE id='". $_GET['code'] ."'";
            $query = mysqli_query($conn,$sql);
            $result = mysqli_fetch_array($query);
        }
        else {
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
	        <h4 class="modal-title" id="myModalLabel">Detail Bank Garansi</h4>
        </div>
        <div><br/>
        <table width="100%">
            <tr>
                <td width="20%"><b>No.Pemohon</b></td>
                <td width="2%"><b>:</b></td>
                <td width="78%"><?php echo $result['id'];?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td width="20%"><b>Nama Agen</b></td>
                <td width="2%"><b>:</b></td>
                <td width="78%"><?php echo $result['nama_agen'];?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td width="20%"><b>Nama Perusahaan</b></td>
                <td width="2%"><b>:</b></td>
                <td width="78%"><?php echo $result['nama_perusahaan'];?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td width="20%"><b>Telepon</b></td>
                <td width="2%"><b>:</b></td>
                <td width="78%"><?php echo $result['no_telp'];?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td width="20%"><b>Janis Jaminan</b></td>
                <td width="2%"><b>:</b></td>
                <td width="78%"><?php echo $result['jenis_jaminan'];?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td width="20%"><b>Nilai Jamian</b></td>
                <td width="2%"><b>:</b></td>
                <td width="78%"><?php echo $result['nilai_jaminan'];?></td>
            </tr>
        </table>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        
        </body>
        </html>