<?php
require 'controller/db.php';

if (isset($_POST['submit'])) {
    $username = strtolower(stripslashes($_POST['username']));
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $namaFoto = $_FILES['gambar']['name'];

    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    if(mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah tersedia')</script>";
        header("refresh:0;register.php");
        
        return false;
    }
    if($password !== $confirm){
        echo "<script>alert('Password tidak sesuai')</script>";
        header("refresh:0;register.php");
        
        return false;
    } else {
        $sql = "INSERT INTO users VALUE('', '$username', '$password', '$namaFoto')";
        $save = $conn->query($sql);
        move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
        if ($save) {
            echo "<script>alert('Selamat, Anda Berhasil Register')</script>";
            header("refresh:0;index.php");
        } else {
            echo "<script>alert('Gagal Register')</script>";
            header("refresh:0;index.php");
        }
    }
}   

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Myweb</title>
    <?php require 'controller/link.php' ?>
</head>

<body>
    <div class="container-sm d-flex justify-content-center align-items-center bg-white" style="height: 700px; width: 500px;">
        <div class="card w-100">
            <div class="card-body">
                <p class="text-center fst-italic fw-bold fs-4">Daftar</p>
                <form action="" method="POST">
                    <!-- Name input -->
                    <div class="form-floating mb-4">
                        <input type="text" id="user" name="username" class="form-control" />
                        <label class="form-label" for="user">Username</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-floating mb-4">
                        <input type="password" id="pass" name="password" class="form-control" />
                        <label class="form-label" for="pass">Password</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" id="pass" name="confirm" class="form-control" />
                        <label class="form-label" for="pass">Confirm Password</label>
                    </div>
                    
                    <div class="form-floating mb-4">
                        <input type="file" id="pass" name="confirm" class="form-control" />
                        <label class="form-label" for="pass">gambar</label>
                    </div>
                    
                    <!-- Submit button -->
                    <input type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                </form>
                <a href="index.php">Punya Akun? Login</a>
            </div>
        </div>
    </div>
</body>

</html>