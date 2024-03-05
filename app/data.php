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
$tampil = $konek->query("SELECT * FROM tamu");
?>

<h3>Data Tamu</h3>
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
        <th scope="col">Aksi</th>
</tr>

<?php
while ($t = $tampil->fetch_array()){
    @$no++;
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

<td>
<button class='btn btn-danger' onclick="confirmDelete(<?=$t['no']?>)">
    <i class='bi bi-trash-fill'></i>
</button>

<script>
    function confirmDelete(id) {
        // Tampilkan dialog konfirmasi
        if (confirm('Apakah Anda yakin ingin menghapus data tamu ini?')) {
            // Jika pengguna menekan OK, arahkan ke halaman delete.php
            document.location.href = 'delete.php?id=' + id;
        } else {
            // Jika pengguna menekan Cancel, tidak melakukan apa-apa
        }
    }

    // Setelah data dihapus, tampilkan notifikasi
    <?php if(isset($_GET['delete']) && $_GET['delete'] == 'true'): ?>
        alert('Data tamu berhasil dihapus.');
    <?php endif; ?>
</script>

    <button class='btn btn-success'><i class='bi bi-pencil-square'
    onclick="document.location.href='update.php?id=<?=$t['no']?>'"></i></button>
</td>

    <?php
    echo "</tr>";
}
?>
</table>
