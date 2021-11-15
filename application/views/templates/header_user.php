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
        margin-top: 38px;
        height: 600px;
    }

    .turun{
        margin-top: 7%;
    }

    .bawah{
        margin-bottom: 15%;
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
    <link rel="stylesheet" href="<?= base_url('assets/css/users.css');?>">

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
                <a class="nav-item nav-link active" href="<?= base_url('user');?>"> Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?= base_url('user/kelompok');?>">Anggota</a>
                <a class="nav-item nav-link" href="<?= base_url('user/modal');?>">Modal</a>
                <a class="nav-item nav-link" href="<?= base_url('user/hasil');?>">Hasil </a>
                <a class="nav-item nav-link" href="<?= base_url('user/pembagian');?>">Pembagian </a>
                <a class="nav-item nav-link" href="<?= base_url('home/logout'); ?>">Keluar</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->