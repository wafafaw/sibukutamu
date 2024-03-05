<?php
session_start();
@$user = $_SESSION['user'];
if ($user == "") {
  ?>
  <script>
    document.location = '../index.php';
  </script>
  <?php
} else {

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DATA TAMU</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    #dashboard-container {
      display: flex;
      justify-content: space-around;
      align-items: center;
      margin: 20px;
    }

    .widget {
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 10px;
      flex: 1;
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>

<body>
  <header>
    <h2>Dashboard</h2>
  </header>

  <div id="dashboard-container">
    <!-- Tamu Kemarin -->
    <div class="widget">
      <h4>Tamu Kemarin</h4>
      <?php
      include "koneksi.php";
      

      // Mendapatkan tanggal kemarin
      $yesterday = date("d-m-Y", strtotime("-1 day"));

      // Query untuk menghitung jumlah total tamu kemarin
      $query = $konek->query("SELECT COUNT(*) as total_tamu FROM tamu WHERE tanggal = '$yesterday'");
      $row = $query->fetch_assoc();
      $total_tamu = $row['total_tamu'];
      ?>
      <section>
        <p>Jumlah tamu :
          <?php echo $total_tamu; ?>
        </p>
      </section>
      <a href="tamu_kemarin.php" class="info-button" onclick="toggleMoreInfo()">Lihat data</a>
    </div>
    <!-- Akhir Tamu Kemarin -->

    <!-- Tamu Hari Ini -->
    <div class="widget">
      <h4>Tamu Hari Ini</h4>
      <?php
      include "koneksi.php";

      // Mendapatkan tanggal hari ini
      $today = date("d-m-Y");

      // Query untuk menghitung jumlah total tamu hari ini
      $query = $konek->query("SELECT COUNT(*) as total_tamu FROM tamu WHERE tanggal = '$today'");
      $row = $query->fetch_assoc();
      $total_tamu = $row['total_tamu'];
      ?>
      <section>
        <p>Jumlah tamu:
          <?php echo $total_tamu; ?>
        </p>
      </section>
      <a href="tamu_hariini.php" class="info-button" onclick="toggleMoreInfo()">Lihat data</a>
    </div>
    <!-- Akhir Tamu Hari Ini -->

    <!-- Tamu Per Minggu -->
    <div class="widget">
      <h4>Tamu Minggu ini</h4>
      <?php
      // Mendapatkan tanggal awal dan akhir minggu ini
      $start_of_week = date('d-m-Y', strtotime('last Monday'));
      $end_of_week = date('d-m-Y', strtotime('next Sunday'));

      // Kueri untuk menghitung jumlah tamu dalam seminggu terakhir
      $query = $konek->query("SELECT COUNT(*) as total_tamu FROM tamu WHERE tanggal BETWEEN '$start_of_week' AND '$end_of_week'");
      $row = $query->fetch_assoc();
      $total_tamu = $row['total_tamu'];
      ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
      </head>

      <body>
        <section>
          <p>Jumlah tamu:
            <?= $total_tamu; ?>
          </p>
        </section>
      </body>

      </html>
      <a href="tamu_perminggu.php" class="info-button" onclick="toggleMoreInfo()">Lihat data</a>
    </div>
    <!-- Akhir Tamu Per Minggu -->
  </div>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA TAMU</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
      }

      header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
      }

      #dashboard-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 20px;
      }

      .widget {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 10px;
        flex: 1;
      }

      footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
      }
    </style>
  </head>

  <body>

    <div id="dashboard-container">
      <!-- Tamu Perbulan -->
      <div class="widget">
        <h4>Tamu Bulan Ini</h4>
        <?php
        include "koneksi.php";
        $bulan=date('m-Y');
        // echo $bulan;

        // Ambil bulan dan tahun saat ini
        $bulan_tahun_saat_ini = date('m-Y');

        // Query untuk menghitung jumlah total tamu bulan ini
        $query2 = $konek->query("SELECT  tanggal FROM tamu WHERE tanggal like '%$bulan%'");
        $row2 = $query2->num_rows;
    
        ?>
        <section>
          <p>Jumlah tamu :
            <?= $row2; ?>
          </p>
        </section>
        <a href="tamu_perbulan.php" class="info-button" onclick="toggleMoreInfo()">Lihat data</a>
      </div>
      <!-- Akhir Tamu Perbulan -->


      <!-- Tamu keseluruhan -->
      <div class="widget">
        <h4>Tamu Keseluruhan</h4>
        <?php
        $query = $konek->query("SELECT COUNT(*) as total_tamu FROM tamu");
        $row = $query->fetch_assoc();
        $total_tamu = $row['total_tamu'];
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>

        <body>
          <section>
            <p> Jumlah tamu:
              <?= $total_tamu; ?>
            </p>
          </section>
        </body>

        </html>
        <a href="data.php" class="info-button" onclick="toggleMoreInfo()">Lihat data</a>
      </div>
    </div>
    <!-- Akhir tamu keseluruhan -->



    <footer>
      <p>&copy; bpsipertanian</p>
    </footer>

    <script>
      // Tambahkan skrip JavaScript untuk interaksi lebih lanjut jika diperlukan
    </script>
  </body>

  </html>