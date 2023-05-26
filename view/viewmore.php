<?php
require '../controller/db.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require '../controller/link.php' ?>
    <title>View More - myweb</title>
</head>
<body>
    <div class="card">
        <?php 
            $id = $_GET['id'];

            $res = mysqli_query($conn, "SELECT * FROM data_siswa WHERE id = '$id'");
            $show = mysqli_fetch_assoc($res);
        ?>
        <div class="card-body">
            <table>
                <tr>
                    <td><?= $show['nama'] ?></td>
                    <td><?= $show['nis'] ?></td>
                    <td><?= $show['alamat'] ?></td>
                    <td><?= $show['hp'] ?></td>
                    <td><img src="../gambar/<?= $show['gambar'] ?>" alt="gambar" height="100" width="100"></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>