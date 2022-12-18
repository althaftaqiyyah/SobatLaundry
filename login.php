<?php
session_start();

if( isset($_SESSION["login"]) ){
    header("Location: index.php");
}

include("config.php");

if(isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($dblaundry, "SELECT * FROM customer WHERE username = '$username'");


    

    //cek username
    if(mysqli_num_rows($result) === 1){
        //cek password
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password'])){
            //jalankan session
            $_SESSION["customer"] = $row;
            $_SESSION["login"] = true;
            
            echo "<script>alert('Login Berhasil'); document.location.href = 'index.php'</script>";
        

            exit;
        }
        else header('Location: index.php?status=gagal');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets\styles\style.css">
</head>
<body>
    <div class="flexcontainer">
        <div class="logincontainer" class="verticalcenter">
            <h2>Get Started</h2>
            <h3>Don't have Account? <a href="registrasi.php" id="sign-up-btn">Sign up</a></h3><br>

            <form action="" method="post">
                <div>
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Insert Username" name="username" id="username" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Insert Password" name="password" id="password" required><br></br>

                    <div class="buttoncenter">
                    <button type="submit" class="logbutton default" name="login">Login</button>
                    </div>
                </div>
            </form>
        </div>

        <aside></aside>
    </div>
</body>
</html>