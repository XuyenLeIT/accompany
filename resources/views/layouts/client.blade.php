<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header UI</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link rel="stylesheet" href="css/client_header.css">
 
</head>

<body>
    <!-- Header Section -->
    <div class="container-fluid">
        <div class="header">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-md-4 logo-container">
                    <img src="/images/logo.png" alt="Logo" class="logo-image">
                    <div>
                        <span class="tagline">THƯƠNG HIỆU CỦA SỰ AN TÂM</span>
                    </div>
                </div>
                <!-- Main Title -->
                <div class="col-md-4 header-title">
                    <strong>THƯƠNG HIỆU 8 NĂM KHẲNG ĐỊNH UY TÍN TOP 1</strong>
                </div>
                <!-- Hotline -->
                <div class="col-md-4">
                    <div class="hotline-box">
                        <span class="hotline-title">Hotline 24/7</span>
                        <br>
                        <span class="hotline-number">0909 857 629</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navigation Bar -->
        <div class="nav-bar">
            <a href={{ route('client.home') }}>TRANG CHỦ</a>
            <a href={{ route('client.tvgs') }}>TƯ VẤN GIÁM SÁT</a>
            <a href={{ route('client.price') }}>BÁO GIÁ</a>
            <a href={{ route('client.project') }}>DỰ ÁN</a>
            <a href={{ route('client.news') }}>TIN TỨC</a>
            <a href={{ route('client.contact') }}>LIÊN HỆ</a>
        </div>
    </div>

    <main class="main-content">
        @yield('content')
    </main>
    <!-- Button Hotline -->
<a href="tel:0909857629" class="hotline-button">
    <i class="fa-solid fa-phone hotline-icon"></i>
    Hotline: 0909 857 629
</a>
    <!-- Footer -->
<footer class="footer bg-dark text-light">
    <div class="container py-4">
        <div class="row">
            <!-- Cột 1: Thông tin liên hệ -->
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase text-warning">Liên hệ</h5>
                <p><i class="bi bi-geo-alt-fill"></i> 123 Đường ABC, Quận 1, TP.HCM</p>
                <p><i class="bi bi-telephone-fill"></i> Điện thoại: 0909 123 456</p>
                <p><i class="bi bi-envelope-fill"></i> Email: lienhe@example.com</p>
            </div>
            <!-- Cột 2: Liên kết nhanh -->
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase text-warning">Liên kết nhanh</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Trang chủ</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Giới thiệu</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Dịch vụ</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Liên hệ</a></li>
                </ul>
            </div>
            <!-- Cột 3: Theo dõi chúng tôi -->
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase text-warning">Theo dõi chúng tôi</h5>
                <div class="d-flex">
                    <a href="#" class="text-light me-3"><i class="bi bi-facebook" style="font-size: 24px;"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-instagram" style="font-size: 24px;"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-twitter" style="font-size: 24px;"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-youtube" style="font-size: 24px;"></i></a>
                </div>
            </div>
        </div>
        <hr class="bg-light">
        <!-- Bản quyền -->
        <div class="text-center">
            <p class="mb-0">&copy; 2024 Công ty TNHH XYZ. Tất cả các quyền được bảo lưu.</p>
        </div>
    </div>
</footer>
</body>

</html>
