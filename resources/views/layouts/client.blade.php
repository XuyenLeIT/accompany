<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('meta_tags')
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K7V6M3V6');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="icon" sizes="32x32" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="/css/client_header.css">

</head>

<body>
    <!-- Header Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="header-company">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-md-4 logo-container">
                        @if ($companyInfo)
                            <img src="{{ $companyInfo->logo }}" alt="Logo" class="logo-image">
                        @endif

                        <div>
                            @if ($companyInfo)
                                <span class="tagline">{{ $companyInfo->sologan1 }}</strong>
                            @endif
                        </div>
                    </div>
                    <!-- Main Title -->
                    <div class="col-md-4 header-title">
                        @if ($companyInfo)
                            <strong>{{ $companyInfo->sologan2 }}</strong>
                        @endif

                    </div>
                    <!-- Hotline -->
                    <div class="col-md-4 gx-0">
                        <div class="hotline-box">
                            <span class="hotline-title">Hotline 24/7</span>
                            <br>
                            @if ($companyInfo)
                                <span class="hotline-number">{{ $companyInfo->phone }}</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- Navigation Bar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Nút Hamburger -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Danh sách Menu -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.home') }}">TRANG CHỦ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.tvgs') }}">TƯ VẤN GIÁM SÁT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.price') }}">BÁO GIÁ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.project') }}">DỰ ÁN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.news') }}">TIN TỨC</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.contact') }}">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <main>
        @yield('content')
    </main>
    <!-- Button Hotline -->
    <a href="tel:0909857629" class="hotline-button">
        <i class="fa-solid fa-phone hotline-icon"></i>
        @if ($companyInfo)
            {{ $companyInfo->phone }}
        @endif

    </a>
    <!-- Footer -->
    <footer class="footer bg-dark text-light p-3">
        <div class="container">
            <div class="row">
                <!-- Cột 1: Thông tin liên hệ -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase text-warning">Liên hệ</h5>
                    @if ($companyInfo)
                        <p><i class="bi bi-geo-alt-fill"></i> {{ $companyInfo->address1 }}</p>
                        <p><i class="bi bi-geo-alt-fill"></i> {{ $companyInfo->address2 }}</p>
                        <p><i class="bi bi-telephone-fill"></i> Điện thoại: {{ $companyInfo->phone }}</p>
                        <p><i class="bi bi-envelope-fill"></i> Email: {{ $companyInfo->email }}</p>
                    @endif
                </div>

                <!-- Cột 2: Liên kết nhanh -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase text-warning">Liên kết nhanh</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('client.home') }}" class="text-light text-decoration-none">Trang chủ</a>
                        </li>
                        <li><a href="{{ route('client.tvgs') }}" class="text-light text-decoration-none">Tư Vấn Giám
                                Sát</a></li>
                        <li><a href="{{ route('client.price') }}" class="text-light text-decoration-none">Báo Giá</a>
                        </li>
                        <li><a href="{{ route('client.news') }}" class="text-light text-decoration-none">Tin Tức</a>
                        </li>
                        <li><a href="{{ route('client.project') }}" class="text-light text-decoration-none">Dự Án</a>
                        </li>
                        <li><a href="{{ route('client.contact') }}" class="text-light text-decoration-none">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <!-- Cột 3: Theo dõi chúng tôi -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase text-warning">Theo dõi chúng tôi</h5>
                    <!-- Nhúng Fanpage Facebook -->
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/profile.php?id=100042978018147&tabs=timeline&width=300&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true"
                        width="100%" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                    </iframe>
                </div>
            </div>
            <hr class="bg-light">
            <!-- Bản quyền -->
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Công ty TNHH TVGS Xây Dựng A&C. Tất cả các quyền được bảo lưu.</p>
            </div>
        </div>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7V6M3V6" height="0"
                width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    </footer>
</body>

</html>
