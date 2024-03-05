<?php
session_start();
@$user=$_SESSION['user'];
if ($user==""){
  ?>
<script>
  document.location='../index.php';
</script>
  <?php
}else{
  
}
?>
<?php
include "koneksi.php";
include "boot.php";

// Ambil bulan dan tahun saat ini
$bulan_tahun_saat_ini = date('Y-m');

// Query untuk mengambil data tamu hanya untuk bulan ini
list($bulan, $tahun) = explode('-', $bulan_tahun_saat_ini);
$tampil = $konek->query("SELECT * FROM tamu WHERE MONTH(Tanggal) = $bulan AND YEAR(Tanggal) = $tahun");
?>

<h3>Data Tamu Bulan Ini</h3>
<table class="table table-success table-striped">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Nama</th>
        <th scope="col">Instansi</th>
        <th scope="col">Alamat</th>
        <th scope="col">No. HP</th>
        <th scope="col">Kepentingan</th>
        <th scope="col">Tujuan</th>
    </tr>

    <?php
    $no = 0;
    while ($t = $tampil->fetch_array()) {
        $no++;
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>$t[tanggal]</td>";
        echo "<td>$t[nama]</td>";
        echo "<td>$t[instansi]</td>";
        echo "<td>$t[alamat]</td>";
        echo "<td>$t[nohp]</td>";
        echo "<td>$t[kepentingan]</td>";
        echo "<td>$t[tujuan]</td>";
        echo "</tr>";
    }
    ?>
</table>
