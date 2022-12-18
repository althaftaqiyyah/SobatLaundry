<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
include("config.php");

//ambil data dari database bg!!
$user = $_SESSION['customer']['username'];
$result = mysqli_query($dblaundry, "SELECT * FROM pesanan JOIN customer ON pesanan.uname_cust = customer.username JOIN outlet_laundry ON pesanan.id_outlet = outlet_laundry.id_outlet JOIN kurir ON outlet_laundry.id_kurir = kurir.id_kurir WHERE pesanan.uname_cust = '$user';");


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order</title>
    <link rel="stylesheet" href="assets\styles\style.css">
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
            <div class="title">Order</div>
            <div class="obuttons">
                <a href="buatPesanan.php"><button class="orderbutt default"> Create New Order</button></a>
            </div>
            <div class="orderdata">
                <table>
                    <thead>
                        <th>No.</th>
                        <th>Order ID</th>
                        <th>Tanggal Kirim</th>
                        <th>Tanggal Ambil</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Kurir</th>
                        <th>Aksi</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                    <?php $n =1;?>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
        <tr>
            <td><?= $n ?></td>
            <td><?= $row["id_order"];?></td>
            <td><?= $row["tanggal_pengiriman"];?></td>
            <td><?= $row["tanggal_pengambilan"];?></td>
            <td><?= $row["jumlah_pakaian"];?></td>
            <td>Rp <?= $row["jumlah_pakaian"] * 2000;?></td>
            <td><?= $row['nama_kurir'] ?></td>
            <td>
                <a href='bill.php?id_order=<?= $row["id_order"]; ?>'><i class='bx bxs-credit-card'></i></a>
                <a href="update.php?id_order=<?= $row["id_order"]; ?>"><i class='bx bxs-edit'></i></a>
                <a href="delete.php?id_order=<?= $row["id_order"]; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus pesanan?');" name="batal"><i class='bx bxs-trash-alt'></i></a>
            </td>
            <td><?= $row["status"];?></td> 
            
        </tr>
        <?php $n++; ?>
        <?php endwhile; ?>
                    </tbody>
            </div>
        </div>
    </div>

</body>

<script src="script.js"></script>

</html>