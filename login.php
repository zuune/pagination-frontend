<?php 
    include_once("config.php");

    // if(isset($_SESSION["user"])){
    //     header("Location: index.php");
    // }

    if(!isset($_COOKIE["user"])){
        session_unset();
        session_destroy();
    }

    if(isset($_COOKIE["user"]) && isset($_SESSION["user"])){
        header("Location: index.php");
    }

    if(isset($_POST["login"])){
        $username = htmlspecialchars($_POST["username"]);
        $password = $_POST["password"];

        $query = "SELECT * FROM users WHERE username = '$username'";

        $aksiQuery = mysqli_query($conn, $query);

        $user = mysqli_fetch_assoc($aksiQuery);

        if(mysqli_num_rows($aksiQuery) == 1){
            if($username == $user["username"] && password_verify($password, $user["password"])){
                echo "
                    <script>
                        alert('Berhasil login!')
                    </script>
                ";
                $_SESSION["user"] = true;

                $cookie_name = "user";
                $cookie_value = $username;
                setcookie($cookie_name, $cookie_value, time() + 3600, "/"); 

                header("Location: index.php");
            } else {
                echo "
                    <script>
                        alert('Gagal login!')
                    </script>
                ";
            }
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
                <h1 class="text-center">Login</h1>
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

                    <p>Tidak punya akun?<a href="register.php">Register</a></p>
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>






    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>