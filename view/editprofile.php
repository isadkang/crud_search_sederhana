<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <title>Edit page - myweb</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 550px; width: 500px;" >
        <div class="card">
            <div class="card-body mx-auto">
                <form action="" method="POST" enctype="multipart/form-data" class="">
                    <label for="file" class="form-label">Edit Photo Profile</label>
                    <input class="form-control" name="gambar" type="file" id="file"/>
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan">
                    <input type="submit" name="submit" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-content-center">
        <a href="dashboard.php" class="btn btn-success">Back</a>
    </div>
    

    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
    ></script>
</body>
</html>
<?php
    require '../controller/db.php';

    $limit = 10 * 1024 * 1024;
    if(isset($_POST['submit'])){
        if(!isset($_FILES['gambar']['tmp_name'])){
            echo "<script>alert('upload foto dulu')</script>";
        } else {
            $name = $_FILES['gambar']['name'];
            $size = $_FILES['gambar']['size'];
            $type = $_FILES['gambar']['type'];

            if($size < $limit && ($type == 'image/png' || $type == 'image/jpg')){
                $gambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
                $keterangan = $_POST['keterangan'];
                mysqli_query($conn, "INSERT INTO user VALUE('', '$gambar')");

                if($gambar){
                    echo "<script>
                        alert('gambar tersimpan')
                    </script>";
                    header("refresh:0;./dashboard.php");
                } else {
                    echo "<script>
                        alert('GAGAL')
                    </script>";
                    header("refresh:0;editprofile.php");
                }

            }
        }
    }
?>