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

    <!-- Include Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCizv5y-ciYAfoT0R9DdqcnN_3Fr_jvjpQ"></script>
    <style>
        /* Set the height of the map container */
        #map {
            height: 600px;
        }
    </style>
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
                <a href="{{ url('home') }}" class="nav-item nav-link">Home</a>
                <a href="{{ url('about') }}" class="nav-item nav-link active">About Us</a>
            </div>
            <a href="{{ url('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="{{ asset('style/img/about-1.jpg') }}" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="{{ asset('style/img/about-2.jpg') }}" alt="" style="margin-top: -25%;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    {{-- <p class="d-inline-block border rounded-pill py-1 px-4">About Us</p> --}}
                    <h1 class="mb-4">Kenali Tentang Kami! Posyandu Harmoni!</h1>
                    <p>Misi kami adalah meningkatkan kesehatan dan kesejahteraan keluarga melalui upaya pencegahan, pendidikan, dan pengawasan. Melalui
                        kegiatan Posyandu, kami berupaya untuk memberikan pemantauan tumbuh kembang anak, imunisasi, pemeriksaan kesehatan ibu hamil,
                        serta penyuluhan gizi dan kesehatan.</p>
                    <p class="mb-4">Kami memiliki tim yang terdiri dari tenaga medis terlatih dan sukarelawan yang peduli dengan kesehatan anak-anak dan
                        ibu hamil. Dengan pengalaman dan pengetahuan kami, kami siap memberikan perawatan dan informasi yang berkualitas kepada Anda.</p>
                    <p class="mb-4">Jangan ragu untuk menghubungi kami melalui telepon atau melalui fitur chat online kami jika Anda memiliki pertanyaan
                        atau membutuhkan bantuan seputar balita dan ibu hamil.</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Memantau tumbuh kembang anak</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Memberikan imunisasi lengkap</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Memonitor kondisi pemeriksaan ibu hamil</p>
                    {{-- <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Location -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <h1>Lokasi Posyandu Harmoni</h1>
                    {{-- <div class="form-group">
                        <input type="text" id="search-input" class="form-control" placeholder="Enter a location">
                    </div> --}}
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Initialize the map
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -7.986596, lng: 112.672663}, // Default center coordinates (USA)
                zoom: 15 // Zoom level ,
            });

            // Create the search box and link it to the UI element
            var input = document.getElementById('search-input');
            var searchBox = new google.maps.places.SearchBox(input);

            // Bias the search box results towards the current map's viewport
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length === 0) {
                    return;
                }

                // Clear out the old markers
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place
                    var marker = new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    });

                    markers.push(marker);

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });

                map.fitBounds(bounds);
            });
        }
    </script>
    <!-- Call the initMap function when the page finishes loading -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCizv5y-ciYAfoT0R9DdqcnN_3Fr_jvjpQ&callback=initMap"></script>
    <!-- Location -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kepanjen, Malang</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+6289-387-654-883</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>apotek@arema.com</p>
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
                    <a class="btn btn-link" href="{{ url('about') }}">About Us</a>
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
                        &copy; <a class="border-bottom" href="#">Apotek Arema</a>, All Right Reserved.
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
