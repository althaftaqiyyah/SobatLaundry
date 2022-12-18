<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

include('config.php');

//ambil id order dari daftar pesanan
$id_order = $_GET['id_order'];

//buat query tergantung dari pesanan
$query = mysqli_query($dblaundry, "SELECT * FROM pesanan WHERE id_order = $id_order");
$row = mysqli_fetch_assoc($query);

// cek status pembayaran
if($row['status'] == 'PAID')
{
    echo "<script>alert('Anda Sudah Membayar!');
                document.location.href ='daftarpesanan.php'</script>";
}

//cek apakah tombol bayar sudah diklik
if ( isset($_POST['bayar']) )
{
    //ambil data dari daftarpesanan
    $id_payment = strval(rand());
    $nominal = $row['jumlah_pakaian'] * 2000;
    $order_id = $id_order;

    //buat query
    $result = mysqli_query($dblaundry, "INSERT INTO payment VALUES ('$id_payment', '$nominal', '$id_order')");

    //cek query berhasil atau tidak
    if($result)
    {
        $status = mysqli_query($dblaundry, "UPDATE pesanan SET status = 'PAID' WHERE id_order = $id_order");
        echo "<script>alert('Pembayaran berhasil!');
                document.location.href ='daftarpesanan.php'</script>";
    } 
    else
    {
        echo "<script>alert('Pembayaran gagal!');
                document.location.href ='bill.php'</script>";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="assets\styles\style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
<div class="bodycont">
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
        <div class="title">Check Out</div>
        <div class="cocont">
        <form action="" method="post">
        <div class="pay">
            <section class="payinfo">
                <p>Tanggal pengiriman: <?= $row['tanggal_pengiriman']?></p>
                <p>Tanggal pengambilan: <?= $row['tanggal_pengambilan']?></p><br>
                <p><b>Total Tagihan</b></p>
            </section>
            <section class="nominal">
                <p>Rp <?= $row["jumlah_pakaian"] * 2000;?></p>
            </section>
            <p>
                    <label for="jenis_pembayaran"><b>Jenis Pembayaran</b>  </label>
                    <select class="form-select" aria-label="Default select example" name="jenis_pembayaran" id="jenis_pembayaran">
                        <option value="" disabled selected>Pilih jenis pembayaran</option>
                        <option value="gopay">Go-Pay</option>
                        <option value="ovo">OVO</option>
                        <option value="dana">DANA</option>
                        <option value="spay">Shopee-Pay</option>
                    </select>
                </p>
            <section class="paycon">
            <input type="button" class="cancel" onclick="window.location.href='daftarpesanan.php';" class="btn btn-warning btn-lg" value="Batal"/></input>
                <button class="conf default" type="submit" name="bayar" onclick="return confirm('Pembayaran berhasil!');">Bayar</button>
            </section>
</form>
        </div>
        <img src="assets/images/co.png" class="coillus">
    </div>
    </div>
</div>
    <script src="script.js"></script>
</body>

<style>
    select {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        border-radius: 10px;
        background: #e4e4e4;
        }

    label {
        font-size: 25px;
        color: black;
    }
</style>

</html>