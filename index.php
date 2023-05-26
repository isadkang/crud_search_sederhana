<?php 
    session_start();
    require 'controller/db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
      rel="stylesheet"
    />
    <title>Login Page - myweb</title>
  </head>

  <body>
    <div class="container-sm d-flex justify-content-center align-items-center bg-white" style="height: 700px; width: 500px;">
      <div class="card w-100">
        <div class="card-body">
          <p class="text-center fst-italic fw-bold fs-4">Login Dulu Cuy</p>
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
          
            <!-- Submit button -->
            <input type="submit" name="submit" class="btn btn-primary btn-block mb-4">
          </form>
          <a href="register.php">Tidak punya akun? Daftar</a>
        </div>
      </div>
    </div>
    
  </body>
</html>
<?php 
    if(isset($_POST['submit'])){
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$_POST[username]' AND password='$_POST[password]'");

        $check = mysqli_num_rows($result); 
        if($check > 0){ 
            $_SESSION['username'] = $_POST['username']; 
        echo "<script>
            alert('Login Berhasil');
        </script>"; 
        header("refresh:0;view/dashboard.php"); 
        } else { 
        echo "<script>
            alert('Username atau Password yang anda masukan salah!');
        </script>"; 
        header("refresh:0;index.php"); 
    } 
  } 
?>