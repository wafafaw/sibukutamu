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
$id = $_GET['id'];
include "koneksi.php";
$delete = $konek->query("DELETE FROM tamu WHERE no='$id'");
?>

<script>
    document.location = 'data.php';
</script>