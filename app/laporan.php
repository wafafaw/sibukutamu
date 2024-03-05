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
include "boot.php";
?>
<br>
<h3>Laporan</h3>
<style>
i {
    color: black;
}
</style>
<form action="" method="post">
    <div class="input-group mb-3">
        <div class="row mt-3">
            <div class="col">
                    <input type="date" name="tgl1" class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                    <input type="date" name="tgl2" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn" style="background-color: black;" placeholder="Last name" aria-label="Last name"><strong><i class="bi bi-search text-white"></i></button>
                    </div>
        </div>
    </div>
</form>
    <button class="btn" onclick="printDiv('div1')"><i class="bi bi-printer-fill"></i></button>
    <div id="div1">
 <!-- Bagian yang akan dicetak -->
<?php
include "koneksi.php";
@$tgl1=$_POST['tgl1'];
@$tgl2=$_POST['tgl2'];

if ($tgl1 && $tgl2) {
    // Jika kedua tanggal disediakan, formatnya sesuai untuk kueri SQL
    $tgl1 = date('d-m-Y', strtotime($tgl1));
    $tgl2 = date('d-m-Y', strtotime($tgl2));
    
    // Melakukan kueri dengan filter tanggal
    $tampil = $konek->query("SELECT * FROM tamu WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
} else {
    // Jika tanggal tidak disediakan, ambil semua catatan
    $tampil = $konek->query("SELECT * FROM tamu");
}
?>

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
    // Menginisialisasi $no
    $no = 0;
    
    // Mengambil dan menampilkan catatan
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
<!-- tutup halaman yang dicetak -->
</div>
<script>
    function printDiv(el) {
        var a = document.body.innerHTML;
        var b = document.getElementById(el).innerHTML;
        document.body.innerHTML = b;
        window.print ();
        document.body.innerHTML = a;
    }
</script>