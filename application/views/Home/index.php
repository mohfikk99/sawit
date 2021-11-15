<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');
    </style>
        
    <style>
    .jumbotron {
        background-image: url(assets/img/9.png);
        background-size: cover;
        margin-top: 39px;
        height: 600px;
    }

    /* Dekstop Version */
    @media (min-width: 992px) {
      .jumbotron {
          background-image: url(assets/img/9.png);
          background-size: cover;
          margin-top: 39px;
          height: 700px;
      }
    }
    </style>

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/utama.css');?>">

    <title>PT KURNIA LUWUK SEJATI</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">PT Kurnia Luwuk Sejati</a>
            <button class="navbar-toggler  tombol" type="button" data-toggle="collapse"
                data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="<?= base_url('home');?>"> Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?= base_url('home/login');?>">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- jumbotron -->

    <div class="jumbotron jumbotron-fluid text-center" >
        <div class="container">
            <h1 class="display-4">SELAMAT DATANG</h1>
            <h2 class="lead">DI PT KURNIA LUWUK SEJATI</h2>
            <p class="lead">KELOLA KELOMPOK TANI ANDA DENGAN LEBIH MUDAH DI SINI</p>
        </div>
    </div>

    <!-- akhir jumbotron -->

    <!-- info -->

    <div class="container mx-auto">
        <div class="row text-center">
            <div class="col-lg-3">
                <div class="card my-card2">
                    <div class="card-body">
                        <img src="<?= base_url('assets/');?>img/7.jpg" alt="" width="40px" height="40" class="rounded-circle">
                        <p class="card-text">Anggota <br> Mengelola data anggota kelompok tani mmm.</p>
                        <button class="btn btn-light">Kelola Disini</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card my-card2">
                    <div class="card-body">
                        <img src="<?= base_url('assets/');?>img/6.png" alt="" width="40px" height="40" class="rounded-circle">
                        <p class="card-text">Timbangan <br> Mengelola pencatatan timbangan hasil panen.</p>
                        <button class="btn btn-light">Kelola Disini</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card my-card3">
                    <div class="card-body">
                        <img src="<?= base_url('assets/');?>img/5.png" alt="" width="40px" height="40" class="rounded-circle">
                        <p class="card-text">Pembagian <br> Mengelola hasil penjualan sawit tiap anggota.</p>
                        <button class="btn btn-light">Kelola Disini</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card my-card3">
                    <div class="card-body">
                        <img src="<?= base_url('assets/');?>img/5.png" alt="" width="40px" height="40" class="rounded-circle">
                        <p class="card-text">Pembagian <br> Mengelola hasil penjualan sawit tiap anggota.</p>
                        <button class="btn btn-light">Kelola Disini</button>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <!-- akhir info -->


    <!-- Profil PT -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?= base_url('assets/');?>img/4.jpg" alt="" class="profil">
            </div>
            <div class="col-lg-6 sejarah">
                <h3 class="mb-3">Profil PT Kurnia Luwuk Sejati</h3>
                <p>PT kurnia luwuk sejati merupakan pabrik pengolah sawit yang ber alamatkan di Jl.
                    Samratulangi No. 24
                    Luwuk, Sulawesi Tengah. Pabrik ini telah beroperasi sejak tanggal 10 Januari 2008, dalam
                    pengoperasian pabrik didukung oleh tenaga kerja yang direkrut dari masyarakat daerah setempat dengan
                    diberikan pelatihan terlebih dahulu. Pelatihan kerja pada karyawan juga dilaksanakan dengan
                    mengirimkan karyawan ke instansi-instansi terkait guna meningkatkan potensi dan kualitas kerja
                    karyawan.</p>
            </div>
        </div>
    </div>

    <!-- My Image -->

    <section id="my-image" class="my-image">
        <div class="container">
            <div class="row my-image">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/');?>img/10.png" alt="">
                </div>
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/');?>img/3.png" alt="">
                </div>
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/');?>img/1.png" alt="">
                </div>
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/');?>img/8.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Akhir My Image -->

    <section id="Komitmen" class="komitmen">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Harapan Dan Komitmen</h3>
                    <p>PT Kurnia Luwuk Sejati yakin, untuk mencapai keberlangsungan bisnis yang berkelanjutan,
                        keberadaan perusahaan harus memberikan manfaat bagi masyarakat sekitar, negara, iklim, konsumen
                        dan bagi perusahaan. Diharapkan dengan adanya website ini dapat mempermudah kelompok tani dalam
                        mengelola hasil tani nya.</p>
                </div>
                <div class="col-lg-6">
                    <img src="<?= base_url('assets/');?>img/2.png" alt="" class="harapan-img">
                </div>
            </div>
        </div>
    </section>


    <!-- footer -->

    <footer class="my-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Copyright 2021 | Build By PT Kurnia Luwuk Sejati</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- akhir footer -->

















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>