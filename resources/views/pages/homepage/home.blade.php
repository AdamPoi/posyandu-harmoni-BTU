<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Posyandu Harmoni - Website Posyandu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('style/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('style/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/lib/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('style/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Lokasi : Kepanjen, Malang</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Waktu : 08.00 AM - Selesai</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+6289-387-654-883</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Posyandu Harmoni</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('home') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ url('about') }}" class="nav-item nav-link active">About Us</a>
            </div>
            <a href="{{ url('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-5">Selamat datang di Posyandu Harmoni!</h1>
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="border-start border-light ps-4">
                            {{-- <h2 class="text-white mb-1" data-toggle="counter-up">12</h2> --}}
                            <p class="text-light mb-0">Posyandu ini merupakan upaya untuk memudahkan masyarakat Indonesia dalam memperoleh
                                pelayanan kesehatan ibu dan anak. Tujuan utamanya adalah mencegah peningkatan angka kematian ibu dan bayi
                                saat kehamilan, persalinan, atau setelahnya melalui pemberdayaan masyarakat. Berbeda dengan puskesmas yang memberikan
                                pelayanan setiap hari, posyandu hanya melayani setidaknya 1 kali dalam sebulan. Lokasi posyandu umumnya mudah dijangkau
                                masyarakat, mulai dari lingkungan desa atau kelurahan hingga RT dan RW.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('style/img/carousel-1.jpg') }}" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Penimbangan</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('style/img/carousel-2.jpg') }}" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Imunisasi</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('style/img/carousel-3.jpg') }}" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Pemeriksaan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                {{-- <p class="d-inline-block border rounded-pill py-1 px-4">Services</p> --}}
                <h1>Solusi Perawatan Kesehatan</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-heartbeat text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Kesehatan Ibu Hamil</h4>
                        <p class="mb-4">Pelayanan yang diberikan posyandu kepada ibu hamil mencakup pemeriksaan kehamilan dan pemantauan gizi.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-x-ray text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Kesehatan Anak</h4>
                        <p class="mb-4">Salah satu program utama posyandu adalah menyelenggarakan pemeriksaan bayi dan balita secara rutin.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-brain text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Keluarga Berencana</h4>
                        <p class="mb-4">Pelayanan KB di posyandu umumnya diberikan oleh kader dalam bentuk pemberian pengaman dan pil KB.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-wheelchair text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Imunisasi</h4>
                        <p class="mb-4">Imunisasi wajib merupakan salah satu program pemerintah yang mengharuskan setiap anak usia di bawah 1 tahun untuk melakukan vaksinasi.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-tooth text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Penimbangan</h4>
                        <p class="mb-4">Penimbangan dilakukan untuk memantau pertumbuhan dan perkembangan anak serta memberikan informasi tentang mereka.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-vials text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Vitamin</h4>
                        <p class="mb-4">Pemberian vitamin pada posyandu biasanya dilakukan dalam bentuk suplemen atau makanan yang kaya akan vitamin.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    {{-- <div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0">
                        <p class="d-inline-block border rounded-pill text-light py-1 px-4">Features</p>
                        <h1 class="text-white mb-4">Kenapa Harus Kami</h1>
                        <p class="text-white mb-4 pb-2">Kami memiliki tim yang terdiri dari tenaga medis dan kesehatan yang berpengalaman dan terlatih dengan baik.
                            Mereka peduli terhadap kesejahteraan Anda dan keluarga, serta siap memberikan perawatan yang komprehensif dan berkualitas. Kami juga
                            berkomitmen untuk memberikan layanan yang mudah diakses dan ramah keluarga. Dengan jadwal yang fleksibel dan fasilitas yang nyaman,
                            kami berusaha menjadikan kunjungan ke Posyandu kami sebagai pengalaman yang positif bagi seluruh anggota keluarga.</p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-user-md text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Bidan</p>
                                        <h5 class="text-white mb-0">Berpengalaman</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-check text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Jasa</p>
                                        <h5 class="text-white mb-0">Berkualitas</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-comment-medical text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Tanggapan</p>
                                        <h5 class="text-white mb-0">Positif</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-headphones text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Pelayanan</p>
                                        <h5 class="text-white mb-0">24 Jam</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('style/img/feature.jpg') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Feature End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1>Testimoni Dari Pelanggan Kami!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('style/img/testimonial-1.jpg') }}" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>"Posyandu adalah tempat yang luar biasa bagi kami, terutama bagi ibu-ibu yang baru memiliki bayi. Di sana, kami bisa berkumpul dengan ibu-ibu
                            lain dalam kelompok diskusi, bertukar pengalaman, dan belajar tentang perawatan bayi yang tepat. Selain itu, tim medis di Posyandu sangat
                            peduli dan siap membantu dengan masalah kesehatan yang kami hadapi. Saya merasa didukung dan diberdayakan dalam peran saya sebagai ibu."</p>
                        <h5 class="mb-1">Sarah Wijaya</h5>
                        <span class="fst-italic">Penulis</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('style/img/testimonial-2.jpg') }}" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>"Saya sangat menghargai keberadaan Posyandu dalam komunitas kami. Selain menyediakan pemeriksaan kesehatan dan imunisasi untuk anak-anak,
                            Posyandu juga memberikan pengetahuan tentang pola makan sehat dan memberikan bimbingan kepada ibu-ibu tentang perawatan bayi dan balita.
                            Saya belajar banyak hal berguna dan merasa lebih percaya diri dalam merawat anak saya setelah mengikuti program-program Posyandu."</p>
                        <h5 class="mb-1">Ahmad Rahman</h5>
                        <span class="fst-italic">Dosen</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('style/img/testimonial-3.jpg') }}" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>"Posyandu adalah tempat yang sangat berharga bagi saya dan keluarga saya. Di sana, kami selalu diterima dengan ramah oleh tim medis yang
                            terlatih dan penuh perhatian. Mereka memberikan layanan kesehatan yang sangat baik, termasuk pemeriksaan kesehatan rutin, imunisasi, dan
                            penyuluhan tentang kesehatan dan gizi. Saya merasa tenang dan yakin bahwa anak-anak saya mendapatkan perawatan kesehatan terbaik di Posyandu ini."</p>
                        <h5 class="mb-1">Budi Setiawan</h5>
                        <span class="fst-italic">Mahasiswa</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kepanjen, Malang</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+6289-387-654-883</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>posyandu@harmoni.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="{{ url('home') }}">Home</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Terima kasih atas minat Anda terhadap Newsletter Kami. Dapatkan berita terbaru, penawaran eksklusif, dan pembaruan terkait melalui Newsletter Kami.</p>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Posyandu Harmoni</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('style/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('style/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('style/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('style/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('style/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('style/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('style/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('style/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('style/js/main.js') }}"></script>
</body>

</html>
