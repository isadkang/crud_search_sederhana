<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Update page - myweb</title>
</head>

<body class="animate__animated animate__fadeInDown ">

    <div class="container mt-5">
        <?php
            require '../controller/db.php';

            $id = $_GET["id"]; //ambil id dari URL

            $res = mysqli_query($conn, "SELECT * FROM data_siswa WHERE id = '$id'");
            $show = mysqli_fetch_assoc($res);
        ?>
        <p class="text-center fs-5">Update Data</p>
        <form action="?" method="POST">

            <div class="form-floating mb-4">
                <input type="text" id="form1Example1" value="<?= $show['nama']; ?>" class="form-control" name="nama" />
                <label class="form-label" for="form1Example1">Update Nama</label>
            </div>
            
            <div class="form-floating mb-4">
                <input type="hidden" name="id" value="<?= $show['id'] ?>">
                <input type="number" id="form1Example1" value="<?= $show['nis'] ?>" class="form-control" name="nis" />
                <label class="form-label" for="form1Example1">Update Nis</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" id="form1Example2" value="<?= $show['alamat'] ?>" class="form-control" name="alamat" />
                <label class="form-label" for="form1Example2">Update Alamat</label>
            </div>

            <div class="form-floating mb-4">
                <input type="number" id="form1Example2" value="<?= $show['hp'] ?>" class="form-control" name="hp" />
                <label class="form-label" for="form1Example2">Update No Hp</label>
            </div>

            <!-- Submit button -->
            <input type="submit" value="Update" name="submit" class="btn btn-primary btn-block" />
            <a class="btn btn-outline-danger btn-block" href="dashboard.php">Batal</a>
        </form>

        <?php 
            if($_POST){
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $nis = $_POST['nis'];
                $alamat = $_POST['alamat'];
                $hp = $_POST['hp'];

                $update = mysqli_query($conn, "UPDATE data_siswa SET nama='$nama', nis='$nis', alamat='$alamat', hp='$hp' WHERE id = '$id'");
                
                if($update){
                    echo "<script>
                        alert('Data Update')
                        window.location.href = './dashboard.php'
                    </script>";
                } else {
                    echo "<script>
                        alert('Data Unupdate')
                        window.location.href = './dashboard.php'
                    </script>";
                }
            }
            
        ?>
    </div>
    <hr>
</body>

</html>