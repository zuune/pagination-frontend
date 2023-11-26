<?php 
    include_once("config.php");

    if(isset($_POST["register"])){
        $username = htmlspecialchars($_POST["username"]);
        $password = $_POST["password"];
        $email = $_POST["email"];
        $no_hp = $_POST["no_hp"];   

        $passwordEncrypt = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users VALUES ('', '$username', '$passwordEncrypt', '$email', '$no_hp')";

        mysqli_query($conn, $query);

        if(mysqli_affected_rows($conn) > 0){
            header("Location: login.php");
        } 

    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>

    <div class="container mt-5">
        <div class="login-container row mx-auto">
            <div class="col-lg-8 mx-auto col-md-10 col-sm-10">
                <h1 class="text-center">Register</h1>
                <form action="" method="POST">
                    <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            Password
                        </label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                            <label for="No Hp" class="form-label">No Hp</label>
                            <input type="text" class="form-control" id="No Hp" name="no_hp" required>
                    </div>

                    <p>Sudah punya akun?<a href="login.php">Login</a></p>
                    <button class="btn btn-primary" type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>






    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>