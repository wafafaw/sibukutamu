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

// Mendapatkan tanggal hari ini
$today = date('d-m-Y');

// Query untuk mengambil data tamu hanya untuk hari ini
$tampil = $konek->query("SELECT * FROM tamu WHERE tanggal = '$today'");
?>

<h3>Data Tamu Hari Ini</h3>
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