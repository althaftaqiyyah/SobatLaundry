<?php 
session_start();

if(!isset($_SESSION["login"]))
{
    header("Location: login.php");
    exit;
}

include("config.php");

//ambil id order dari daftar pesanan
$id_order = $_GET['id_order'];

$rowbill = mysqli_query($dblaundry, "SELECT * FROM pesanan WHERE id_order = $id_order");


//cek apakah pesanan sudah dibayar
if (mysqli_num_rows($rowbill) === 1)
{
    //query hapus
    $result1 = mysqli_query($dblaundry, "DELETE FROM payment WHERE id_order = $id_order");
    $result2 = mysqli_query($dblaundry, "DELETE FROM pesanan WHERE id_order = $id_order");

    if($result1 && $result2)
    {
        echo "<script>alert('Pemesanan berhasil dibatalkan!');
                    document.location.href ='daftarpesanan.php'</script>";
    }
} 
else 
{
    //query hapus
    $result2 = mysqli_query($dblaundry, "DELETE FROM pesanan WHERE id_order = $id_order");
    
    //cek query
    if($result2)
    {
        echo "<script>alert('Pemesanan berhasil dibatalkan!');
                    document.location.href ='daftarpesanan.php'</script>";
    }
}