<?php
session_start();

if( isset($_SESSION["login"]) ){
    header("Location: index.php");
    exit;
}
include("config.php");

if(isset($_POST['register'])){

	// ambil data dari formulir
	$username = $_POST['username'];
    $nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nomor_telepon = $_POST['no_telepon'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);



	// buat query masukin ke database
    $query = mysqli_query($dblaundry, "INSERT INTO customer VALUES ('$username', '$nama', '$nomor_telepon', '$alamat', '$password')");

	// apakah query simpan berhasil?
	if( $query==TRUE ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		echo "<script> 
            alert ('registrasi sukses yeay!'); document.location.href = 'login.php'
        </script>";
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: index.php?status=gagal');
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="assets\styles\style.css">
</head>
<body>
    <div class="flexcontainer">
        <div class="signupcontainer" class="verticalcenter">
            <h2 class="signhf">Get Started</h2>
            <h3 class="signhf">Already have Account? <a href="login.php">Log In</a></h3><br>

            <form action="" method="post">
                <div>
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Insert Username" name="username" id="username" required>

                    <label for="namacust"><b>Name</b></label>
                    <input type="text" placeholder="Insert Name" name="nama" id="namacust" required>

                    <label for="alamatcust"><b>Address</b></label>
                    <input type="text" placeholder="Insert Address" name="alamat" id="alamatcust" required>

                    <label for="teleponcust"><b>Phone Number</b></label>
                    <input type="text" placeholder="Insert Phone Number" name="no_telepon" id="teleponcust" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Insert Password" name="password" id="password" required>

                    <label for="password2"><b>Confirm Password</b></label>
                    <input type="password" placeholder="Insert Password" name="password2" id="password2"required><br><br>

                    <div  class="buttoncenter">
                    <button type="submit" class="signbutt default" name="register">Sign up</button>
                    </div>
                </div>
            </form>
        </div>

        <aside></aside>
    </div>
    
</body>
</html>