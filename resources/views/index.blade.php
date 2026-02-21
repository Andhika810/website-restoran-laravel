<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">
    <title>Restaurant &mdash; Food Specialty</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('ela/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('ela/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('resto/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('ela/css/style.css') }}" rel="stylesheet">

    <!-- Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @if($islogin['login']=='pelanggan')
        <link href="{{ asset('ela/css/lib/toastr/toastr.min.css') }}" rel="stylesheet">
    @elseif($islogin['login']=='pegawai')
        <link href="{{ asset('ela/css/lib/toastr/toastr.min.css') }}" rel="stylesheet">
    @endif

    <style>
        :root{
            --brand:#fb6e14;
            --dark:#151515;
            --muted:#6c757d;
            --cream:#fbf7f2;
        }

        body { background:#fff; }

        @media (min-width: 1024px){
            .page-wrapper { margin-left:0px; }
        }

        /* ===== NAVBAR (KEEP OLD STRUCTURE) ===== */
        .header{
            position: fixed;
            top:0; left:0;
            width:100%;
            z-index: 9999;
            transition: all .25s ease;
        }
        .header .top-navbar{
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(0,0,0,.06);
            padding: 14px 18px;
            transition: all .25s ease;
        }
        .header.shrink .top-navbar{
            padding: 7px 18px;
            background: rgba(255,255,255,.98);
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }
        .navbar-header .navbar-brand b img{ height:28px; }
        .navbar-header .navbar-brand span img{ height:22px; }

        .top-navbar .navbar-nav .nav-link{
            font-weight: 600;
            color:#333 !important;
            padding: .55rem .85rem !important;
            border-radius: 10px;
            transition: all .2s ease;
        }
        .top-navbar .navbar-nav .nav-link:hover{
            background: rgba(251,110,20,.10);
            color: var(--brand) !important;
        }
        .top-navbar .navbar-nav .nav-link.active{
            background: rgba(251,110,20,.14);
            color: var(--brand) !important;
        }

        /* Order button (premium) */
        .btn-order{
            border-radius: 12px;
            font-weight: 800;
            padding: 10px 14px;
            border: 1px solid rgba(251,110,20,.40);
            background: rgba(251,110,20,.14);
            color: #b84f0b;
            transition: all .18s ease;
            white-space: nowrap;
        }
        .btn-order i{ margin-right: 8px; }
        .btn-order:hover{
            background: rgba(251,110,20,.20);
            border-color: rgba(251,110,20,.60);
            transform: translateY(-1px);
            color:#a84509;
            text-decoration:none;
        }

        /* offset so section not ketutup navbar fixed */
        .offset-top{ padding-top: 95px; }

        /* ===== HERO ===== */
        .hero{
            position: relative;
            height: 100vh;
            min-height: 640px;
        }
        .hero .carousel,
        .hero .carousel-inner,
        .hero .carousel-item{ height: 100%; }

        .hero img{
            height:100%;
            width:100%;
            object-fit: cover;
            filter: brightness(40%);
        }
        .hero-overlay{
            position:absolute;
            inset:0;
            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;
            padding: 140px 18px 40px;
            z-index: 2;
        }
        .hero-card{
            max-width: 920px;
            padding: 28px 26px;
            border-radius: 18px;
            background: rgba(0,0,0,.25);
            border: 1px solid rgba(255,255,255,.15);
            box-shadow: 0 25px 80px rgba(0,0,0,.35);
        }
        .hero-title{
            color:#fff;
            font-weight: 800;
            letter-spacing: .5px;
            font-size: clamp(38px, 5vw, 72px);
            line-height: 1.05;
            margin-bottom: 12px;
        }
        .hero-sub{
            color: rgba(255,255,255,.85);
            font-size: clamp(16px, 2vw, 22px);
            margin: 0 auto 18px;
            max-width: 720px;
        }
        .hero-actions .btn{
            border-radius: 12px;
            padding: 12px 18px;
            font-weight: 700;
        }
        .btn-brand{
            background: var(--brand);
            border-color: var(--brand);
            color:#fff;
            border-radius: 12px;
        }
        .btn-brand:hover{
            background:#e95f0a;
            border-color:#e95f0a;
            color:#fff;
        }
        .btn-soft{
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.14);
            color:#fff;
            border-radius: 12px;
        }
        .btn-soft:hover{
            background: rgba(255,255,255,.16);
            color:#fff;
        }

        /* ===== Sections ===== */
        .section{ padding: 90px 0; }
        .section-title{
            font-weight: 800;
            color:#3b2f2a;
            margin-bottom: 8px;
            font-size: clamp(28px, 3vw, 44px);
            text-align:center;
        }
        .section-sub{
            text-align:center;
            color: var(--muted);
            max-width: 720px;
            margin: 0 auto 30px;
        }

        /* ===== About ===== */
        #about{
            background: linear-gradient(120deg, #111 0%, #1e1e1e 60%, #111 100%);
            color:#fff;
        }
        .about-wrap{
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 30px 90px rgba(0,0,0,.35);
            border: 1px solid rgba(255,255,255,.08);
        }
        .about-img{ height: 420px; object-fit: cover; width:100%; }
        .about-content{
            padding: 34px 34px;
            background: radial-gradient(circle at top left, rgba(251,110,20,.12), transparent 55%), rgba(0,0,0,.20);
        }
        .badge-brand{
            display:inline-flex;
            gap:8px;
            align-items:center;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(251,110,20,.14);
            border: 1px solid rgba(251,110,20,.25);
            color: rgba(255,255,255,.9);
            font-weight: 700;
            margin-bottom: 14px;
        }
        .about-content h3{ font-weight: 800; margin-bottom: 12px; font-size: 30px; }
        .about-content p{ color: rgba(255,255,255,.80); line-height: 1.8; margin:0; }

        /* ===== Testimonials ===== */
        #testimonials{ background: var(--cream); }
        .testimonial-card{
            background:#fff;
            border-radius: 20px;
            padding: 34px 26px;
            box-shadow: 0 18px 50px rgba(0,0,0,.08);
            border: 1px solid rgba(0,0,0,.06);
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }
        .quote{
            font-size: clamp(18px, 2vw, 28px);
            color:#4b3c35;
            line-height: 1.6;
            font-weight: 600;
        }
        .quote:before, .quote:after{
            content:'"';
            color: rgba(251,110,20,.55);
            font-weight: 900;
        }
        .quote-by{
            margin-top: 14px;
            color: var(--muted);
            font-weight: 700;
        }
        .no-indicators .carousel-indicators{ display:none !important; }
        .carousel-control-next, .carousel-control-prev{ width: 64px; opacity: .85; }
        .carousel-control-next-icon, .carousel-control-prev-icon{ filter: invert(1); }

        /* ===== Menu cards ===== */
        #hidangan{
            background: linear-gradient(120deg, #0f0f0f, #1b1b1b);
            color:#fff;
        }
        .menu-card{
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.10);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,.28);
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
            height: 100%;
        }
        .menu-card:hover{
            transform: translateY(-6px);
            border-color: rgba(251,110,20,.55);
            box-shadow: 0 30px 80px rgba(0,0,0,.35);
        }
        .menu-img{ height: 190px; width: 100%; object-fit: cover; }
        .menu-body{ padding: 18px 18px 16px; }
        .menu-title{ font-weight: 800; margin: 0 0 8px; font-size: 18px; }
        .menu-price{ color: rgba(255,255,255,.88); font-weight: 800; font-size: 22px; margin-bottom: 14px; }
        .menu-actions .btn{ border-radius: 12px; font-weight: 700; }

        /* ===== Reservasi ===== */
        #reservasi{ background:#fff; }
        .reserve-wrap{
            background: var(--cream);
            border-radius: 22px;
            padding: 28px;
            border: 1px solid rgba(0,0,0,.06);
            box-shadow: 0 18px 55px rgba(0,0,0,.06);
        }
        .form-control{ border-radius: 14px; padding: 12px 14px; }
        .form-group label{ font-weight: 700; color:#3b2f2a; }
        .reserve-side{
            background: #fff;
            border-radius: 18px;
            padding: 18px;
            border: 1px solid rgba(0,0,0,.06);
            height: 100%;
        }
        .profile-card img{
            width: 96px; height: 96px;
            object-fit: cover;
            border-radius: 18px;
            border: 3px solid rgba(251,110,20,.22);
        }

        /* ===== Footer premium ===== */
        footer{
            background: #0f0f10;
            color: rgba(255,255,255,.75);
            padding: 52px 0 26px;
        }
        .footer-title{ color:#fff; font-weight: 800; margin-bottom: 12px; }
        .footer-link{
            color: rgba(255,255,255,.75);
            text-decoration: none;
            display: inline-block;
            margin: 6px 0;
        }
        .footer-link:hover{ color:#fff; text-decoration:none; }
        .social a{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            width: 42px; height: 42px;
            border-radius: 14px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.10);
            color:#fff;
            margin-right: 10px;
            transition: all .18s ease;
        }
        .social a:hover{
            background: rgba(251,110,20,.20);
            border-color: rgba(251,110,20,.50);
            transform: translateY(-3px);
        }
        .footer-bottom{
            border-top: 1px solid rgba(255,255,255,.10);
            margin-top: 26px;
            padding-top: 18px;
            font-size: 14px;
            color: rgba(255,255,255,.55);
        }
    </style>
</head>

<body>
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>

<div id="main-wrapper">

    <!-- NAVBAR -->
    <div class="header" id="siteHeader">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b><img src="{{asset('images/logo.png')}}" alt="homepage" class="dark-logo" /></b>
                    <span><img src="{{asset('images/logo-text.png')}}" alt="homepage" class="dark-logo" /></span>
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-md-0" id="navLinks">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#hidangan">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#reservasi">Reservasi</a></li>

                    @if($islogin['login']=='pelanggan'||$islogin['login']=='pegawai')
                    @else
                        <li class="nav-item">
                            <a id="login" class="nav-link" style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal">Sign In</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#reservasi">Sign Up</a></li>
                    @endif
                </ul>

                <!-- RIGHT SIDE: Order button + profile -->
                <ul class="navbar-nav my-lg-0 align-items-center" style="gap:10px;">
                    <!-- Order Now button (NEW) -->
                    <li class="nav-item">
                        <a href="#hidangan" class="btn-order nav-link" id="orderBtn">
                            <i class="fa-solid fa-bag-shopping"></i> Order Now
                        </a>
                    </li>

                    <!-- Profile dropdown (UNCHANGED) -->
                    <li class="nav-item dropdown">
                        @if($islogin['login']=='pelanggan')
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown">
                                <img src="{{asset('images/profil')}}/{{$pelanggan['foto_pelanggan']}}" style="width:34px;height:34px;border-radius: 12px;object-fit:cover">
                            </a>
                        @elseif($islogin['login']=='pegawai')
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown">
                                <img src="{{asset('images/profil')}}/{{$pegawai['foto_pegawai']}}" style="width:34px;height:34px;border-radius: 12px;object-fit:cover">
                            </a>
                        @endif

                        @if($islogin['login']=='pelanggan'||$islogin['login']=='pegawai')
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <a class="dropdown-item" href="@if($islogin['login']=='pelanggan'){{URL('pelanggan')}}@elseif($islogin['login']=='pegawai'){{URL('pegawai')}}@endif">
                                <i class="fa fa-tachometer"></i> Dashboard
                            </a>
                            <a class="dropdown-item" href="@if($islogin['login']=='pelanggan'){{URL('pelanggan/pengaturan')}}@elseif($islogin['login']=='pegawai'){{URL('pegawai/pengaturan')}}@endif">
                                <i class="ti-user"></i> Profile
                            </a>
                            <a class="dropdown-item" href="@if($islogin['login']=='pelanggan'){{URL('pelanggan/logout')}}@elseif($islogin['login']=='pegawai'){{URL('pegawai/logout')}}@endif">
                                <i class="fa fa-power-off"></i> Logout
                            </a>
                        </div>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- NAVBAR -->

    <!-- HERO -->
    <section id="home" class="hero">
        <div id="heroCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('resto/images/dinner1.jpg') }}" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('resto/images/carlo drink.jpg') }}" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('resto/images/sushi1.jpg') }}" alt="Slide 3">
                </div>
            </div>
        </div>

        <div class="hero-overlay">
            <div class="hero-card">
                <div class="hero-title">Nasi Kuning Bangka</div>
                <div class="hero-sub">Cita rasa autentik Bangka — hangat, gurih, dan dibuat dengan sepenuh hati untuk setiap momen spesialmu.</div>
                <div class="hero-actions d-flex flex-wrap justify-content-center" style="gap:10px;">
                    <a href="#hidangan" class="btn btn-brand">Lihat Menu</a>
                    <a href="#reservasi" class="btn btn-outline-light" style="border-radius:12px;">Reservasi</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="section offset-top">
        <div class="container">
            <div class="about-wrap">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <img class="about-img" src="{{ asset('resto/images/dinner1.jpg') }}" alt="about">
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="badge-brand"><i class="fa-solid fa-star"></i> Authentic Bangka Taste</div>
                            <h3>Tentang Kami</h3>
                            <p>
                                Restoran Nasi Kuning Bangka menyajikan cita rasa khas Bangka yang autentik melalui nasi kuning harum dengan rempah pilihan dan lauk berkualitas.
                                Kami percaya makanan adalah bagian dari budaya dan kebersamaan—setiap hidangan disiapkan untuk menghadirkan pengalaman makan yang lezat, hangat,
                                dan berkesan bagi setiap pelanggan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section id="testimonials" class="section">
        <div class="container">
            <h2 class="section-title">Apa Kata Mereka</h2>
            <p class="section-sub">Beberapa review dari pelanggan yang sudah merasakan pengalaman makan di tempat kami.</p>

            <div id="testimonialCarousel" class="carousel slide no-indicators" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="testimonial-card">
                            <div class="quote">Makan adalah hobiku. Restoran ini mengirim hobiku ke tingkatan selanjutnya.</div>
                            <div class="quote-by">— Adhiarta</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial-card">
                            <div class="quote">Pelayanannya ramah, tempatnya bersih, mantap deh pokoknya.</div>
                            <div class="quote-by">— Marria Tesalonika</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial-card">
                            <div class="quote">Rasanya autentik, plating-nya cantik, cocok buat ajak keluarga.</div>
                            <div class="quote-by">— Urip Y</div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- MENU -->
    <section id="hidangan" class="section">
        <div class="container">
            <h2 class="section-title" style="color:#fff;">Menu Unggulan</h2>
            <p class="section-sub" style="color:rgba(255,255,255,.75);">Pilihan hidangan terbaik kami — dibuat dari bahan berkualitas dan rasa yang konsisten.</p>

            <div class="row">
                @foreach($hidangan as $h)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="menu-card">
                            <img class="menu-img" src="{{ asset('images/hidangan/'.$h->foto_hidangan) }}" alt="{{ $h->nama_hidangan }}">
                            <div class="menu-body">
                                <div class="menu-title">{{ $h->nama_hidangan }}</div>
                                <div class="menu-price">IDR {{ $h->harga_hidangan }}</div>
                                <div class="menu-actions d-flex" style="gap:10px;">
                                    <a href="#reservasi" class="btn btn-brand btn-sm">Pesan</a>
                                    <a href="javascript:void(0)" class="btn btn-soft btn-sm" onclick="alert('Detail: {{ $h->nama_hidangan }}')">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- RESERVASI -->
    <section id="reservasi" class="section">
        <div class="container">
            <h2 class="section-title">Reservasi</h2>
            <p class="section-sub">Isi data untuk mendaftar atau lanjut reservasi. Contact info ada di footer.</p>

            <div class="reserve-wrap">
                <div class="row">
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <div class="reserve-side">
                            <h4 style="font-weight:800;color:#3b2f2a;">@if($islogin['login']=='pelanggan'||$islogin['login']=='pegawai') Profil @else Sign Up @endif</h4>
                            <p style="color:#7a6f69;margin-bottom: 18px;">
                                @if($islogin['login']=='pelanggan'||$islogin['login']=='pegawai')
                                    Lanjutkan ke dashboard atau reservasi.
                                @else
                                    Daftar untuk membuat reservasi lebih cepat.
                                @endif
                            </p>

                            @if($islogin['login']=='pelanggan'||$islogin['login']=='pegawai')
                                @if($islogin['login']=='pelanggan')
                                    <div class="profile-card d-flex align-items-center" style="gap:14px;">
                                        <img src="{{ asset('images/profil/'.$pelanggan['foto_pelanggan']) }}" alt="profil">
                                        <div>
                                            <div style="font-weight:800;color:#3b2f2a;font-size:18px;">{{$pelanggan['nama_pelanggan']}}</div>
                                            <div style="color:#7a6f69;">{{$pelanggan['email_pelanggan']}}</div>
                                            <div style="color:#7a6f69;">{{$pelanggan['username_pelanggan']}}</div>
                                            <div class="mt-3">
                                                <a href="{{URL('pelanggan/reservasi/create')}}" class="btn btn-brand">Reservasi</a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="profile-card d-flex align-items-center" style="gap:14px;">
                                        <img src="{{ asset('images/profil/'.$pegawai['foto_pegawai']) }}" alt="profil">
                                        <div>
                                            <div style="font-weight:800;color:#3b2f2a;font-size:18px;">{{$pegawai['nama_pegawai']}}</div>
                                            <div style="color:#7a6f69;">{{$pegawai['email_pegawai']}}</div>
                                            <div style="color:#7a6f69;">{{$pegawai['username_pegawai']}}</div>
                                            <div class="mt-3">
                                                <a href="{{URL('pegawai')}}" class="btn btn-brand">Dashboard</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <form action="{{URL('pelanggan/register')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" name="name" class="form-control" placeholder="Nama lengkap" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" name="email" class="form-control" placeholder="Email aktif" type="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" name="username" class="form-control" placeholder="Username" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" name="password" class="form-control" placeholder="Password" type="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto_pelanggan">Foto</label>
                                        <input id="foto_pelanggan" class="form-control" type="file" name="foto_pelanggan" required>
                                    </div>
                                    <div class="d-flex align-items-center" style="gap:10px;flex-wrap:wrap;">
                                        <button class="btn btn-brand" type="submit">Sign Up</button>
                                        <a href="{{URL('pelanggan/login')}}" class="btn btn-soft" style="color:#333;border-color:rgba(0,0,0,.12);background:#fff;">Sudah punya akun?</a>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="reserve-side">
                            <h4 style="font-weight:800;color:#3b2f2a;">Kenapa Reservasi di Sini?</h4>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-3">
                                    <div style="background:#fff;border:1px solid rgba(0,0,0,.06);border-radius:16px;padding:16px;height:100%;">
                                        <div style="font-weight:800;"><i class="fa-solid fa-clock" style="color:var(--brand)"></i> Cepat</div>
                                        <div style="color:#7a6f69;margin-top:6px;">Proses reservasi ringkas dan jelas.</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div style="background:#fff;border:1px solid rgba(0,0,0,.06);border-radius:16px;padding:16px;height:100%;">
                                        <div style="font-weight:800;"><i class="fa-solid fa-utensils" style="color:var(--brand)"></i> Menu Favorit</div>
                                        <div style="color:#7a6f69;margin-top:6px;">Hidangan terbaik siap untukmu.</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div style="background:#fff;border:1px solid rgba(0,0,0,.06);border-radius:16px;padding:16px;height:100%;">
                                        <div style="font-weight:800;"><i class="fa-solid fa-star" style="color:var(--brand)"></i> Pelayanan</div>
                                        <div style="color:#7a6f69;margin-top:6px;">Ramah, bersih, dan profesional.</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div style="background:#fff;border:1px solid rgba(0,0,0,.06);border-radius:16px;padding:16px;height:100%;">
                                        <div style="font-weight:800;"><i class="fa-solid fa-location-dot" style="color:var(--brand)"></i> Lokasi</div>
                                        <div style="color:#7a6f69;margin-top:6px;">Mudah dijangkau dan nyaman.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3" style="color:#7a6f69;">
                                *Kalau kamu mau form reservasi beneran (tanggal, jam, jumlah orang) yang disimpan DB, bilang ya.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">

                <div class="col-lg-4 mb-4">
                    <div class="footer-title">Nasi Kuning Bangka</div>
                    <div style="color:rgba(255,255,255,.65);line-height:1.7;">
                        Hidangan autentik dengan rasa khas Bangka. Hangat, gurih, dan dibuat dengan sepenuh hati.
                    </div>

                    <div class="social mt-3">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="footer-title">Contact</div>
                    <div style="margin:8px 0;"><i class="fa-solid fa-location-dot" style="color:var(--brand)"></i>  Jalan Bangka 1B No.11B</div>
                    <div style="margin:8px 0;"><i class="fa-solid fa-phone" style="color:var(--brand)"></i>  +62 87802102002</div>
                    <div style="margin:8px 0;"><i class="fa-solid fa-envelope" style="color:var(--brand)"></i>  NasiKuningBangka@gmail.com</div>
                    <div style="margin:8px 0;"><i class="fa-solid fa-globe" style="color:var(--brand)"></i>  Nasi Kuning Bangka</div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="footer-title">Quick Links</div>
                    <a class="footer-link" href="#home">Home</a><br>
                    <a class="footer-link" href="#about">About</a><br>
                    <a class="footer-link" href="#hidangan">Menu</a><br>
                    <a class="footer-link" href="#reservasi">Reservasi</a><br>
                </div>
            </div>

            <div class="footer-bottom d-flex justify-content-between flex-wrap" style="gap:10px;">
                <div>© {{ date('Y') }} Nasi Kuning Bangka. All rights reserved.</div>
                <div>Designed with Andhika Satya</div>
            </div>
        </div>
    </footer>

    <!-- MODAL LOGIN -->
    <div id="exampleModal" class="modal fadeInUp animated" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 16px; overflow:hidden;">
                <div class="modal-body" style="padding:24px;">
                    <h2 class="display-4" style="text-align:center;font-size: 28px;padding-bottom: 18px;font-weight:800;color:#3b2f2a;">Login</h2>
                    <form method='POST' action='{{ URL('pelanggan/login') }}'>
                        @csrf
                        <div class='form-group'>
                            <label>Email</label>
                            <input id='email' class='form-control' type='email' name='email' value='{{ old('email') }}' required autofocus>
                        </div>
                        <div class='form-group'>
                            <label>Password</label>
                            <input id='password' class='form-control' type='password' name='password' required>
                        </div>
                        <div class='text-center mt-3'>
                            <button type='submit' class='btn btn-brand'>Sign in</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left:10px;border-radius:12px;">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- JS -->
<script src="{{ asset('ela/js/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('ela/js/lib/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('ela/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ela/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('ela/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('ela/js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('ela/js/custom.min.js') }}"></script>

<script>
    // Navbar shrink + active highlight + smooth scroll
    (function(){
        const header = document.getElementById('siteHeader');
        const links = Array.from(document.querySelectorAll('#navLinks a.nav-link'));
        const sections = links
            .map(a => document.querySelector(a.getAttribute('href')))
            .filter(Boolean);

        function onScroll(){
            const y = window.scrollY || document.documentElement.scrollTop;

            if(y > 80) header.classList.add('shrink');
            else header.classList.remove('shrink');

            let current = null;
            const offset = 140;
            sections.forEach(sec => {
                const top = sec.offsetTop - offset;
                const bottom = top + sec.offsetHeight;
                if(y >= top && y < bottom) current = sec;
            });

            links.forEach(a => a.classList.remove('active'));
            if(current){
                const active = links.find(a => a.getAttribute('href') === '#'+current.id);
                if(active) active.classList.add('active');
            }
        }

        window.addEventListener('scroll', onScroll);
        onScroll();

        // Smooth scroll for navbar links + order button
        function smoothTo(targetSelector){
            const target = document.querySelector(targetSelector);
            if(!target) return;
            const top = target.getBoundingClientRect().top + window.scrollY - 92;
            window.scrollTo({ top, behavior:'smooth' });
        }

        links.forEach(a=>{
            a.addEventListener('click', function(e){
                const href = this.getAttribute('href');
                if(href && href.startsWith('#')){
                    e.preventDefault();
                    smoothTo(href);
                }
            });
        });

        const orderBtn = document.getElementById('orderBtn');
        if(orderBtn){
            orderBtn.addEventListener('click', function(e){
                e.preventDefault();
                smoothTo('#hidangan');
            });
        }
    })();
</script>

@if($islogin['login']=='pelanggan'||$islogin['login']=='pegawai')
<script src="{{ asset('ela/js/lib/toastr/toastr.min.js') }}"></script>
<script>
    toastr.success(
        'Kamu login sebagai @if($islogin["login"]=="pelanggan") {{$pelanggan["nama_pelanggan"]}} @else {{$pegawai["nama_pegawai"]}} @endif',
        'Logged In',
        {
            timeOut: 5000,
            "closeButton": true,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "extendedTimeOut": "1000",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false
        }
    );
</script>
@endif

</body>
</html>
