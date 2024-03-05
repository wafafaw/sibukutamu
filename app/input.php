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
$date=date('d-m-Y');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Tamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <h1>Form Input Tamu</h1>
        <label for="exampleInputEmail1" class="form-label">Tanggal :</label>
    <input type="text" value="<?=$date?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggal" required readonly>

    <label for="exampleInputEmail1" class="form-label">Nama :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" required>

    <label for="exampleInputEmail1" class="form-label">Instansi :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="instansi">

    <label for="exampleInputEmail1" class="form-label">Alamat :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat">

    <label for="exampleInputEmail1" class="form-label">No. HP :</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nohp">

    <label for="exampleInputEmail1" class="form-label">Kepentingan :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kepentingan">

    <label for="exampleInputEmail1" class="form-label">Tujuan :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tujuan">
            <input type="submit" class="btn btn-primary mt-3" value="Simpan">
        </form>
        <div class="text-center">
            <a class="small" href="#">BPSITS | 2024 - <?= date('Y')?></a>
        </div>        
    </div>
</body>
</html>

<?php
include "koneksi.php";
@$tanggal =$_POST['tanggal'];
@$nama =$_POST['nama'];
@$instansi =$_POST['instansi'];
@$alamat =$_POST['alamat'];
@$nohp =$_POST['nohp'];
@$kepentingan =$_POST['kepentingan'];
@$tujuan =$_POST['tujuan'];
if ($nama == "") {
} else {
  $simpan =$konek->query("INSERT into tamu (tanggal,nama,instansi,alamat,nohp,kepentingan,tujuan) VALUES ('$tanggal','$nama','$instansi','$alamat','$nohp','$kepentingan','$tujuan')");
  echo" <script>
  alert('Data sudah tersimpan, Terimakasih');
  document.location='input.php';
</script>";
}
?>
