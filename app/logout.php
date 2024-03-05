<?php
session_start();
session_destroy();
?>

<script>
  function logout() {
    var confirmLogout = confirm('Yakin ingin keluar dari aplikasi?');
    if (confirmLogout) {
        alert('Anda telah keluar dari Aplikasi');
        window.location.href = '../index.php';
    } else {
        window.location.href = 'index.php'; // Ubah ini ke halaman utama aplikasi
    }
  }
  logout();
</script>
