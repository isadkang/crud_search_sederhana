<?php
    require '../controller/db.php';

    if(isset($_POST['submit'])){
        $nama = htmlspecialchars($_POST['nama']);
        $nis = htmlspecialchars($_POST['nis']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $hp = htmlspecialchars($_POST['hp']);

        $save = mysqli_query($conn, "INSERT INTO data_siswa VALUE('', '$nama', '$alamat', '$hp', '$nis', '$gambar' )");

        if($save){
            echo "<script>
                alert('Data Berhasil Ditambah')
            </script>";
            header("refresh:0;./dashboard.php");
        } else {
            echo "<script>
                alert('Data Gagal Ditambah')
            </script>";
            header("refresh:0;./dashboard.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Tambah page - myweb</title>
</head>

<body class="animate__animated animate__bounceInDown animated__delay-1s">
    <div class="container mt-5">
        <p class="text-center fs-5">Tambah Data</p>
        <form action="?" method="POST" >

            <div class="form-floating mb-4">
                <input type="text" id="form1Example1" class="form-control" name="nama" required />
                <label class="form-label" for="form1Example1">Nama</label>
            </div>
            
            <div class="form-floating mb-4">
                <input type="text" id="form1Example1" class="form-control" name="nis" required />
                <label class="form-label" for="form1Example1">Nis</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" id="form1Example2" class="form-control" name="alamat" required />
                <label class="form-label" for="form1Example2">Alamat</label>
            </div>

            <div class="form-floating mb-4">
                <input type="number" id="form1Example2" class="form-control" name="hp" required />
                <label class="form-label" for="form1Example2">No Hp</label>
            </div>

            <div class="form-floating mb-4">
                <input type="file" id="form1Example2" class="form-control" name="gambar" required />
                <label class="form-label" for="form1Example2">Foto</label>
            </div>

            <!-- Submit button -->
            <input type="submit" value="Tambah" name="submit" class="btn btn-primary btn-block" />
            <a class="btn btn-outline-danger btn-block" href="dashboard.php">Batal</a>
        </form>
    </div>
    <hr>
</body>

</html>