<?php
    require '../controller/db.php';
    require '../controller/session.php';
    require '../property/modal.php';

    if (isset($_POST['cari'])) {
        $cari = trim($_POST['cari']);
        $query = "SELECT * FROM data_siswa WHERE nama like '%".$cari."%' || nis like '%".$cari."%' || alamat like '%".$cari."%' || hp like '%".$cari."%' ORDER BY nis ASC";
    }else {
        $query = "SELECT * FROM data_siswa";
    }
    $res = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require '../controller/link.php' ?>
    <title>Dashboard - myweb</title>
</head>

<body>
    <nav class="navbar navbar-light mb-2 shadow-lg py-1" style="background-color: #4d4d4d;">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mx-5">
                <button type="button" class="btn bg-transparent" data-mdb-toggle="modal" data-mdb-target="#profile">
                    <img src="../gambar/photo-2.png" class="rounded-circle" height="50" alt="Portrait" loading="lazy" />
                </button>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="javascript:logout()" class="btn btn-outline-danger" data-mdb-ripple-color="dark">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <h2 align="center">Selamat datang, <i><?= $_SESSION['username'] ?></i> </h2><br>
    <div class="d-flex justify-content-center align-items-center animate__animated animate__zoomInDown" style="height: 50px;">
        <a href="tambah.php" class="btn btn-warning btn-rounded">Tambah</a>
    </div>

    <form action="" method="post" class="container">
        <div class="form-group">
            <label for="sel1">Cari :</label>
            <?php
            $cari = "";
            if (isset($_POST['cari'])) {
                $cari = $_POST['cari'];
            }
            ?>
            <input type="text" name="cari" value="<?= $cari ?>" class="form-control" placeholder="..." />
            <input type="submit" class="btn btn-info" value="Cari...">
        </div>
    </form>
    <table id="data" class="container table align-middle mb-0 mt-2 bg-white center animate__animated animate__fadeIn animate__delay-1s">
        <thead class="bg-secondary text-black">
            <tr class="table-bordered">
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Nis</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Hp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php while ($s = mysqli_fetch_assoc($res)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $s['nama'] ?></td>
                    <td><?= $s['nis'] ?></td>
                    <td><?= $s['alamat'] ?></td>
                    <td><?= $s['hp'] ?></td>
                    <td>
                        <a href="javascript:hapus(<?= $s['id'] ?>)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="./update.php?id=<?= $s['id'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <a href="./viewmore.php?id=<?= $s['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


    <footer class="bg-transparent text-center text-white sticky-bottom">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="https://web.facebook.com/profile.php?id=100021994388760" role="button"><i class="fab fa-facebook-f"></i></a>
                <!-- Instagram -->
                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="https://www.instagram.com/isadsnata_/" role="button"><i class="fab fa-instagram"></i></a>
                <!-- Github -->
                <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="https://github.com/isadkang" role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
    </footer>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>