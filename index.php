<?php
   session_start();
   
   if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
   }

   include("config.php");
   $nama = $_SESSION['customer']['username'];
   $query = mysqli_query($dblaundry, "SELECT * FROM customer WHERE username = '$nama'");
   $row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style2.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>Homepage</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container nav-wrapper">
                <a href="index.php" class="logo">Sobat Laundry</a>
                <div class="menu-wrapper">
                    <ul class="menu">
                        <li class="menu-item"><a href="index.php" class="menu-link">Home</a></li>
                        <li class="menu-item"><a href="daftarpesanan.php" class="menu-link">Order List</a></li>
                        <li class="menu-item"><a href="buatPesanan.php" class="menu-link">Create Order</a></li>
                    </ul>
                    <a href="logout.php" class="btn-member">Log out</a>
                </div>
                <div class="menu-toggle bx bxs-grid-alt">
                </div>
            </div>
        </nav>

        <section class="home" id="home">
            <div class="container home-wrapper">
                <div class="content-left" data-aos="fade-right">
                    <h1 class="heading">Hi <?= $row['nama']?></a>!</span></h1>
                    <p class="subheading">Selamat datang di dashboard user! Silakan click menu item di kanan atas 
                        untuk melihat dan mengatur pesanan yang telah kamu buat</p>
                    <div class="box-wrapper">
                        <div class="box">
                            <i class='bx bxs-check-square'></i>
                            <p>Aman</p>
                        </div>
                        <div class="box">
                            <i class='bx bxs-check-square'></i>
                            <p>Terpercaya</p>
                        </div>
                    </div>
                </div>
                <div class="content-right" data-aos="fade-left">
                    <div class="img-wrapper">
                        <img src="assets/images/image.png" alt="">
                    </div>

                </div>

            </div>
        </section>
    </header>
    
    <!-- Produk start -->
    <section class="produk">
        <div class="container produk-wrapper">
            <div class="row1">
                <div class="title-produk" data-aos="fade-right">
                    <p class="label-produk">TOP LAUNDRY</p>
                    <h1 class="heading-produk">Explore Top Laundry</h1>
                </div>
                <div class="toggle-slider" data-aos="fade-left">
                    <i class='bx bxs-chevron-left-circle'></i>
                    <i class='bx bxs-chevron-right-circle'></i>
                </div>
            </div>
            <div class="row2">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide card-produk">
                            <img src="assets/images/567 1.png" alt="">
                            <div class="detail-produk">
                                <div class="kategori">
                                    <p class="label-kategori">Clothes</p>

                                    <p class="price">Rp 2.000</p>
                                </div>
                                <div class="title-card">
                                    <h1>567 Express Coin Laundry</h1>
                                </div>
                                <div class="review">
                                    <div class="star">
                                        <i class='bx bxs-star'></i> 5.0
                                    </div>
                                    <p>1.6k reviewer</p>
                                </div>
                                <div class="body-card">
                                    <p>Dengan memanfaatkan teknologi, mempermudah anda sehingga tidak perlu repot datang ke 
                                        laundry kami.</p>
                                </div>
                                <div class="btn-produk">
                                    <a href="567laundry.html">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide card-produk">
                            <img src="assets/images/botani 1.png" alt="">
                            <div class="detail-produk">
                                <div class="kategori">
                                    <p class="label-kategori">Clothes</p>

                                    <p class="price">Rp 2.000</p>
                                </div>
                                <div class="title-card">
                                    <h1>Botani Laundry</h1>
                                </div>
                                <div class="review">
                                    <div class="star">
                                        <i class='bx bxs-star'></i> 5.0
                                    </div>
                                    <p>1.6k reviewer</p>
                                </div>
                                <div class="body-card">
                                    <p>Kami menganut konsep 1 mesin cuci hanya untuk 1 pengguna jasa tidak dicampur dengan 
                                        pengguna jasa yang lain.</p>
                                </div>
                                <div class="btn-produk">
                                    <a href="botanilaundry.html">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide card-produk">
                            <img src="assets/images/aida 1.png" alt="">
                            <div class="detail-produk">
                                <div class="kategori">
                                    <p class="label-kategori">Clothes</p>

                                    <p class="price">Rp 2.000</p>
                                </div>
                                <div class="title-card">
                                    <h1>Aida Laundry</h1>
                                </div>
                                <div class="review">
                                    <div class="star">
                                        <i class='bx bxs-star'></i> 5.0
                                    </div>
                                    <p>1.6k reviewer</p>
                                </div>
                                <div class="body-card">
                                    <p>Mesin laundry yang kami tawarkan merupakan produk import asli dari Amerika, 
                                        sehingga Anda tidak perlu khawatir akan kualitasnya.</p>
                                </div>
                                <div class="btn-produk">
                                    <a href="aidalaundry.html">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide card-produk">
                            <img src="assets/images/arraya 1.png" alt="">
                            <div class="detail-produk">
                                <div class="kategori">
                                    <p class="label-kategori">Clothes</p>

                                    <p class="price">Rp 2.000</p>
                                </div>
                                <div class="title-card">
                                    <h1>Laundry Arraya</h1>
                                </div>
                                <div class="review">
                                    <div class="star">
                                        <i class='bx bxs-star'></i> 5.0
                                    </div>
                                    <p>1.6k reviewer</p>
                                </div>
                                <div class="body-card">
                                    <p>Sekarang, anda tidak perlu mengeluarkan tenaga lebih untuk datang ke outlet 
                                        laundry karena kami telah menerima order melalui website Sobat Laundry.</p>
                                </div>
                                <div class="btn-produk">
                                    <a href="arrayalaundry.html">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide card-produk">
                            <img src="assets/images/dahlia 1.png" alt="">
                            <div class="detail-produk">
                                <div class="kategori">
                                    <p class="label-kategori">Clothes</p>

                                    <p class="price">Rp 2.000</p>
                                </div>
                                <div class="title-card">
                                    <h1>Dahlia Laundry</h1>
                                </div>
                                <div class="review">
                                    <div class="star">
                                        <i class='bx bxs-star'></i> 5.0
                                    </div>
                                    <p>1.6k reviewer</p>
                                </div>
                                <div class="body-card">
                                    <p>Kami memiliki karyawan ahli dan menggunakan peralatan dengan teknologi terbaik, 
                                        serta detergen dan pewangi yang berkualitas.</p>
                                </div>
                                <div class="btn-produk">
                                    <a href="dahlialaundry.html">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Produk end -->

    <!-- Footer -->
    <footer class="footer" id="footer">
        <div class="container footer-wrapper">
            <div class="col-1-footer">
                <h1 class="logo-footer">Sobat Laundry</h1>
                <p class="subheading-footer">The best service to customers is
                    our top priority in building a business</p>
                <div class="sosmed-icon">
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                </div>
            </div>
            <div class="col-2-footer">
                <h3>About</h3>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Menu</a></li>
                </ul>
            </div>
            <div class="col-3-footer">
                <h3>Company</h3>
                <ul>
                    <li><a href="#">Why Sobat Laundry ?</a></li>
                    <li><a href="#">Partners with us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Blogs</a></li>
                </ul>
            </div>
            <div class="col-4-footer">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Support Center</a></li>
                    <li><a href="#">Feedback</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Accessbility</a></li>
                </ul>
            </div>
            <div class="col-5-footer">
                <h3>Get in touch</h3>
                <p>Questions or Feedback</p>
                <div class="form-input">
                    <input type="text" placeholder="Type your email">
                    <a href="#" class="btn-footer">Submit</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 3000
        });
    </script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
</body>

</html>