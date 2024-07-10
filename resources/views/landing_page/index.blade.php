<!doctype html>
<html lang="en">

<head>
    @include('landing_page.css')
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            <a href="index.html" class="logo m-0 float-start">TV Comp<span class="text-primary">.</span></a>
                        </div>
                        <div class="col-8 text-center ">
                            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                <li class="active"><a href="#home">beranda</a></li>
                                <li><a href="#about">tentang</a></li>
                                <li><a href="#guide">panduan</a></li>
                                <li><a href="#recomendation">rekomendasi smart tv</a></li>
                            </ul>
                        </div>
                        <div class="col-2 text-end">
                            <div class="d-flex">
                                <a href="{{route('login')}}" class="btn btn-outline-white-reverse me-4">Login</a>
                                <a href="{{route('register')}}" class="btn btn-outline-white me-4">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="hero overlay" id="home">
        <img src="/landing_page/images/blob.svg" alt="" class="img-fluid blob" loading="lazy">
        <div class="container">
            <div class="row align-items-center justify-content-between pt-5">
                <div class="col-lg-6 text-center text-lg-start pe-lg-5">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Saatnya menemukan smart tv impian anda tanpa perlu bingung</h1>
                    <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">Dengan implementasi sistem pendukung keputusan dengan metode ahp membantu anda membandingkan smart tv yang anda mau dan dapatkan smart tv terbaik</p>
                    <div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{route('login')}}" class="btn btn-outline-white-reverse me-4">Mulai Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="img-wrap">
                        <img src="/landing_page/images/home.jpg" alt="Image" class="img-fluid rounded" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section" id="about">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <img src="/landing_page/images/about.jpeg" alt="Image" class="img-fluid rounded" loading="lazy">
                </div>
                <div class="col-lg-4 ps-lg-2">
                    <div class="mb-5">
                        <h2 class="heading text-black h4">Tentang</h2>
                        <p>Selamat datang di platform kami, di mana kami menggunakan metode Analytic Hierarchy Process (AHP) untuk membantu Anda memilih smart TV terbaik yang sesuai dengan kebutuhan dan preferensi Anda.</p>
                    </div>
                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi-clock me-4"></span>
                        </div>
                        <div>
                            <h3>Hemat Waktu dan Tenaga</h3>
                            <p>Cepat menyaring pilihan Anda dan temukan Smart TV terbaik tanpa menghabiskan berjam-jam untuk meneliti dan membandingkan.</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi-bullseye me-4"></span>
                        </div>
                        <div>
                            <h3>Akurasi dan Kehandalan</h3>
                            <p>Metode AHP yang sudah terbukti untuk pengambilan keputusan.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi-lightning me-4"></span>
                        </div>
                        <div>
                            <h3>Antarmuka yang Mudah Digunakan</h3>
                            <p>Mudah menavigasi proses pengambilan keputusan dengan desain yang intuitif dan sederhana.</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>



    <div class="section sec-services" id="guide">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
                    <h2 class="heading text-primary">Panduan</h2>
                    <p>Berikut adalah langkah - langkah menggunakan sistem pendukung keputusan</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up">

                    <div class="service text-center">
                        <span class="bi-clipboard-plus"></span>
                        <div>
                            <h3>Menentukan Kriteria</h3>
                            <p class="mb-4">Mulailah dengan mengidentifikasi faktor-faktor kunci yang paling penting bagi Anda saat memilih Smart TV. Ini bisa termasuk ukuran layar, resolusi, reputasi merek, harga, fitur pintar, dan ulasan pelanggan.</p>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service text-center">
                        <span class="bi-display"></span>
                        <div>
                            <h3>Masukkan Alternatif</h3>
                            <p class="mb-4">Pilih beberapa model Smart TV yang ingin Anda bandingkan. Alternatif ini akan menjadi pilihan yang akan dievaluasi berdasarkan kriteria yang telah Anda tentukan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="service text-center">
                        <span class="bi-collection"></span>
                        <div>
                            <h3>Nilai Alternatif</h3>
                            <p class="mb-4">Memasukkan nilai kriteria terhadap alternatif yang sudah ditentukan</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service text-center">
                        <span class="bi-filter-square"></span>
                        <div>
                            <h3>Perbandingan Kriteria</h3>
                            <p class="mb-4">Bandingkan setiap kriteria berdasarkan tingkat kepentingannya. Platform kami akan membantu Anda memberi bobot pada setiap kriteria melalui matriks perbandingan berpasangan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">

                    <div class="service text-center">
                        <span class="bi-layout-text-sidebar-reverse"></span>
                        <div>
                            <h3>Perbandingan Alternatif Terhadap Setiap Kriteria</h3>
                            <p class="mb-4">telah kriteria diberi bobot, langkah berikutnya adalah membandingkan setiap alternatif berdasarkan masing-masing kriteria. </p>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service text-center">
                        <span class="bi-trophy"></span>
                        <div>
                            <h3>Dapatkan Rekomendasi</h3>
                            <p class="mb-4">Algoritma AHP kami akan memproses semua data yang telah dimasukkan, menghitung bobot setiap alternatif berdasarkan perbandingan kriteria dan alternatif. Hasil akhirnya adalah peringkat Smart TV yang paling cocok dengan preferensi Anda.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="section sec-portfolio bg-light pb-5	" id="recomendation">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center ">
                    <h2 class="heading text-primary mb-3" data-aos="fade-up" data-aos-delay="0">Rekomendasi Smart TV Terbaik</h2>
                    <p class="mb-4" data-aos="fade-up" data-aos-delay="100">Ditinjau oleh Trainer Specialist Audio Video & Home Appliance</p>

                    <div id="post-slider-nav" data-aos="fade-up" data-aos-delay="200">
                        <button class="btn btn-primary py-2" class="prev" data-controls="prev">Prev</button>
                        <button class="btn btn-primary py-2" class="next" data-controls="next">Next</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="post-slider-wrap" data-aos="fade-up" data-aos-delay="300">



            <div id="post-slider" class="post-slider">
                <div class="item">
                    <a href="case-study.html" class="card d-fle">
                        <img src="/landing_page/images/tv-1.png" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">Xiaomi TV A2 32"</h5>
                            <p>Rp2.399.000</p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="case-study.html" class="card">
                        <img src="/landing_page/images/tv-2.jpeg" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">Android 11 32″ ｜ L32G7N</h5>
                            <p>Rp3.599.000</p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="case-study.html" class="card">
                        <img src="/landing_page/images/tv-3.png" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">HD VIDAA Smart TV 32″ ｜ 32E4H</h5>
                            <p>Rp2.699.000
                            </p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="case-study.html" class="card">
                        <img src="/landing_page/images/tv-4.png" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">TCL
                                FHD HDR10 Google TV ｜ 32G9</h5>
                            <p>Rp4.899.000
                            </p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="case-study.html" class="card">
                        <img src="/landing_page/images/tv-5.jpeg" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">COOCAA Smart TV 50 inch ｜ 50S6G PRO</h5>
                            <p>Rp6.099.000</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>


    </div>

    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>About</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Company</h3>
                        <ul class="list-unstyled float-start links">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Vision</a></li>
                            <li><a href="#">Mission</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                        <ul class="list-unstyled float-start links">
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Creative</a></li>
                        </ul>
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Navigation</h3>
                        <ul class="list-unstyled links mb-4">
                            <li><a href="#">Our Vision</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>

                        <h3>Social</h3>
                        <ul class="list-unstyled social">
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-pinterest"></span></a></li>
                            <li><a href="#"><span class="icon-dribbble"></span></a></li>
                        </ul>
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-4 -->
            </div> <!-- /.row -->

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

                    <p>Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
                    </p>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    @include('landing_page.js')
</body>

</html>