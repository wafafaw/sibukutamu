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

// Mendapatkan tanggal awal dan akhir minggu ini
$start_of_week = date('d-m-Y', strtotime('last Monday'));
$end_of_week = date('d-m-Y', strtotime('next Sunday'));

// Query untuk mengambil data tamu dalam seminggu terakhir
$tampil = $konek->query("SELECT *, DATE_FORMAT(tanggal, '%d-%m-%Y') AS tanggal_formatted FROM tamu WHERE tanggal BETWEEN '$start_of_week' AND '$end_of_week'");
?>

<h3>Data Tamu Minggu Ini</h3>
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
        ?>

        <?php
        echo "</tr>";
    }
    ?>
</table>