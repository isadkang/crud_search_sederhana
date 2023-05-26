<?php
    require './db.php';

    $id = $_GET['id'];

    $del = mysqli_query($conn, "DELETE FROM data_siswa WHERE id='$id'");

    if($del){
        echo "<script>
            alert('Data berhasil terhapus')
        </script>";
        header("refresh:0;../view/dashboard.php");
    } else {
        echo "<script>
            alert('Data tidak terhapus')
        </script>";
        header("refresh:0;../view/dashboard.php");
    }