<?php
session_start();

if( !isset($_SESSION["login"]) )
{
    header("Location: login.php");
    exit;
}

include('config.php');

//ambil id order dari daftar pesanan
$id_order = $_GET['id_order'];
$nama = $_SESSION['customer']['username'];
$name = mysqli_query($dblaundry, "SELECT * FROM customer WHERE username = '$nama';");
$result =mysqli_fetch_assoc($name);

//buat query tergantung dari pesanan
$query = mysqli_query($dblaundry, "SELECT * FROM pesanan WHERE id_order = $id_order");
$row = mysqli_fetch_assoc($query);

if($row['status'] == 'PAID'){
    echo "<script>alert('Anda Sudah Membayar! Tidak Bisa Mengubah Pesanan!');
                document.location.href ='daftarpesanan.php'</script>";
}

//cek apakah tombol update sudah diklik
if ( isset($_POST['update']) ){
    
    //ambil data dari daftar pesanan
    // $user = $_SESSION['customer']['username'];
    $jumlah_pakaian = $_POST['jumlah_pakaian'];
    $tanggal_pengiriman = $_POST['tanggal_pengiriman'];
    $tanggal_pengambilan = $_POST['tanggal_pengambilan'];

    //buat query update
    $result = mysqli_query($dblaundry, "UPDATE pesanan SET jumlah_pakaian = '$jumlah_pakaian', tanggal_pengiriman = '$tanggal_pengiriman', tanggal_pengambilan = '$tanggal_pengambilan' WHERE id_order = $id_order");

    //cek apakah query berhasil
    if( $result == TRUE )
    {
        echo "<script>alert('Update pesanan berhasil!');
                document.location.href ='daftarpesanan.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Order</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="sidebar">
        <div class="logo-content">
            <div class="logo"></div>
            <i class='bx bx-menu' id='btn'></i>
        </div>

        <ul class="nav">
            <li>
                <a href="index.php">
                    <i class='bx bxs-home'></i>
                </a>
                <span class="tooltip">Home Page</span>
            </li>
            <li>
                <a href="buatPesanan.php">
                    <i class='bx bx-cart-alt'></i>
                </a>
                <span class="tooltip">Create Order</span>
            </li>
            <li>
                <a href="daftarpesanan.php">
                    <i class='bx bx-list-ul'></i>
                </a>
                <span class="tooltip">Order List</span>
            </li>
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                </a>
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="title">Edit Order</div>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Poppins&display=swap');

            body {
                font-family: 'M PLUS Rounded 1c', Arial, Helvetica, sans-serif;
            }

            form {
                width: 100%;
            }

            .container {
                padding: 50px;
                background-color: #f3f3f3;
                margin-left: 50px;
                border-radius: 15px;
            }

            h1 {
                color: #1678F3;
            }

            input[type=text], input[type=number], input[type=date], select {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                border-radius: 10px;
                background: #e4e4e4;
            }

            input[type=text]:focus,
            input[type=password]:focus {
                background-color: orange;
                outline: none;
            }

            div {
                padding: 10px 0;
            }

            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            label {
                color: black;
                font-size: 15px;
            }

            .registerbtn {
                background-color: #1678f3;
                color: white;
                padding: 16px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 20px;
                cursor: pointer;
                width: 30%;
                opacity: 0.9;
            }

            .registerbtn:hover {
                opacity: 1;
            }
        </style>
        </head>

        <body>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="container">
                    <h1>Edit Order</h1><br>

                    <label for="cust_name"> Customer Name</label>
                    <input type="text" name="customer" size="15" id="cust_name" value="<?= $result['nama']; ?>" required >
                    <label for="tanggal_kirim"> Tanggal Kirim </label>
                    <input type="date" name="tanggal_pengiriman" id="tanggal_kirim" size="15" value="<?= $row['tanggal_pengiriman'] ?>" required />
                    <label for="tanggal_ambil"> Tanggal Ambil </label>
                    <input type="date" name="tanggal_pengambilan" id="tanggal_ambil" size="15" value="<?= $row['tanggal_pengambilan'] ?>" required />
                    <div>
                        <label for="jumlah_pakaian"> Jumlah Pakaian </label>
                        <input type="number" name="jumlah_pakaian" id="jumlah_pakaian" size="10" value="<?= $row['jumlah_pakaian'] ?>" required />
                        
                        <br>
                        <button type="submit" name="update" class="registerbtn">Update Pesanan</button>
            </form>


    </div>
    </div>
    </div>

</body>

<script src="script.js"></script>

</html>