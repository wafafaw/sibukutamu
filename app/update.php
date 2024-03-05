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
$id = $_GET['id'];
$ubah=$konek->query("SELECT * FROM tamu where no='$id'");
$a = $ubah->fetch_array();
?>

<?php
include "boot.php";
?>

<div class="container col-5">
<form class="form form-control bg-light " action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    name="tanggal" value="<?= $a['tanggal']?>">

    <label for="exampleInputEmail1" class="form-label">Nama :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    name="nama"  value="<?= $a['nama']?>">

    <label for="exampleInputEmail1" class="form-label">Instansi :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    name="instansi"  value="<?= $a['instansi']?>">

    <label for="exampleInputEmail1" class="form-label">Alamat :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    name="alamat"  value="<?= $a['alamat']?>">

    <label for="exampleInputEmail1" class="form-label">No. HP :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    name="nohp"  value="<?= $a['nohp']?>">

    <label for="exampleInputEmail1" class="form-label">Kepentingan :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    name="kepentingan"  value="<?= $a['kepentingan']?>">

    <label for="exampleInputEmail1" class="form-label">Tujuan :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    name="tujuan"  value="<?= $a['tujuan']?>">


    <div class="text-end">
  <button type="submit" class="btn btn-primary mt-3" name="ganti">Simpan</button>
  </div>

</form>

</div>

<?php
if (isset($_POST['ganti'])) {

    $edit=$konek-> query("UPDATE tamu set tanggal='$_POST[tanggal]',nama='$_POST[nama]', instansi='$_POST[instansi]', alamat='$_POST[alamat]', nohp='$_POST[nohp]', kepentingan='$_POST[kepentingan]',tujuan='$_POST[tujuan]' WHERE no='$id'");
    echo "<div class='alert alert-success' role='alert'>Data berhasil diubah <a href = data.php> Kembali </a></div>";
}
?>