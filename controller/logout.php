<?php
session_start();
session_destroy();

echo "<script>
    alert('Berhasil Logout')
</script>";
header("refresh:0;../index.php");