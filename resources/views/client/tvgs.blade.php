@extends('layouts.client')
@section('title', 'Home Page')
<style>
    .title-card {
        height: 80px;
        /* Adjust height */
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg,
                #c2e59c,
                #64b3f4);
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Shadow effect */
        text-align: center;
    }

    .title-page {
        color: #0066cc;
        font-weight: bold;
        text-transform: uppercase;
        text-shadow: 2px 2px 4px rgba(0, 102, 204, 0.3);
    }

    /* General Styling */

    /* Title Styling */
    .title-page-content {
        color: #0066cc;
        font-weight: bold;
        text-transform: uppercase;
        text-shadow: 2px 2px 4px rgba(0, 102, 204, 0.3);
        border-bottom: 4px solid #ff6a00;
        padding-bottom: 10px;
    }

    /* Content Styling */
    .text-content {
        color: #333333;
        line-height: 1.8;
    }

    /* Section Title Styling */
    .section-title {
        color: #0066cc;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 15px;
        position: relative;
        /* Để ::after bám theo .section-title */
        display: inline-block;
        /* Đảm bảo chỉ chiếm không gian vừa với nội dung */
    }

    .section-title::after {
        content: '';
        width: 100%;
        /* Bằng với chiều dài của text */
        height: 3px;
        background: #ff6a00;
        position: absolute;
        left: 0;
        bottom: -5px;
        /* Khoảng cách dưới */
    }

    /* General Styling */
    .banner-card {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        height: 400px;
        background: #f2f2f2;
    }

    /* Hover Effect */
    .banner-card:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    /* Background Image */
    .banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.7);
        transition: transform 0.4s ease, filter 0.4s ease;
    }

    .banner-card:hover .banner-img {
        transform: scale(1.1);
        filter: brightness(0.5);
    }

    /* Overlay */
    .banner-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        z-index: 1;
        opacity: 1;
        transition: opacity 0.4s ease;
    }

    /* Content Styling */
    .banner-content {
        text-align: center;
        animation: fadeIn 1s ease forwards;
    }

    .banner-title {
        font-size: 24px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 10px;
        color: #ff6a00;
    }

    .banner-discount {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
        letter-spacing: 1px;
    }

    .banner-discount span {
        font-size: 28px;
        color: #ff9a3f;
    }

    .custom-btn {
        background: linear-gradient(90deg, #71a88e, #FFB200);
        border: none;
        color: white;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 25px;
        transition: background 0.4s ease, transform 0.3s ease;
        box-shadow: 0 4px 10px rgba(255, 106, 0, 0.4);
    }

    .custom-btn:hover {
        background: linear-gradient(90deg, #cc5500, #ff9a3f);
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(255, 106, 0, 0.6);
    }

    /* Keyframe Animation */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Activity Card Styling */
    .activity-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .activity-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .activity-card .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.4s ease, filter 0.4s ease;
        filter: brightness(0.9);
    }

    .activity-card:hover .card-img-top {
        transform: scale(1.1);
        filter: brightness(1);
    }

    .activity-card .card-title {
        font-size: 18px;
        font-weight: bold;
        color: #0066cc;
    }

    .activity-card .card-text {
        font-size: 14px;
        color: #555;
    }

    .activity-card .btn {
        border-radius: 25px;
        padding: 8px 20px;
        transition: background 0.4s ease, color 0.4s ease;
    }

    .activity-card .btn:hover {
        background-color: #0066cc;
        color: white;
    }

    /* Quote Section Styling */
    .quote-section {
        margin: 30px auto;
        padding: 20px;
        background-color: #e9f7e7; /* Xanh lá cây nhạt */
        border-left: 5px solid #ff8c42; /* Viền màu cam */
        border-radius: 8px;
        max-width: 800px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .quote-text {
        font-style: italic;
        font-size: 20px;
        color: #2d6a4f; /* Xanh lá cây đậm */
        margin: 0 0 10px;
        line-height: 1.6;
    }

    .quote-author {
        font-size: 16px;
        color: #0066cc; /* Xanh dương đậm */
        font-weight: bold;
        margin: 0;
    }

    /* Sidebar Section Styling */
    .sidebar-images {
        margin-top: 20px;
    }

    .sidebar-card {
        text-align: center;
        background: #ffffff;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .sidebar-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    /* Image Styling */
    .sidebar-card img {
        border-radius: 10px;
        transition: transform 0.4s ease, filter 0.4s ease;
        filter: brightness(0.9);
    }

    .sidebar-card:hover img {
        transform: scale(1.05);
        filter: brightness(1);
    }

    /* Title Styling */
    .sidebar-title {
        font-size: 16px;
        font-weight: bold;
        color: #0066cc;
        text-transform: uppercase;
        margin: 10px 0 0;
    }
</style>
@section('content')
    <div class="container-fluid mt-1">
        <div class="container">
            <div class="title-card">
                <h2 class="title-page"> TƯ VẤN GIÁM SÁT</h2>
            </div>
        </div>
        <div class="row mt-2">
            <!-- Main Content: col-9 -->
            <div class="col-lg-9">
                <h3 class="mb-4 title-page-content">Tư Vấn Giám Sát Xây Dựng</h3>
                <p class="text-justify fs-5 text-content">
                    Tư vấn giám sát xây dựng là một yếu tố quan trọng trong bất kỳ dự án xây dựng nào. Vai trò của tư vấn
                    giám sát là đảm bảo rằng tất cả các hoạt động xây dựng được thực hiện đúng theo kế hoạch, tiêu chuẩn kỹ
                    thuật, và quy định pháp luật. Điều này không chỉ giúp đảm bảo chất lượng công trình mà còn giảm thiểu
                    rủi ro, tiết kiệm chi phí và thời gian cho chủ đầu tư.
                </p>

                <h3 class="mt-5 mb-3 section-title">Các Bài Viết Nổi Bật</h3>
                <div class="row">
                    <!-- Article Card 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card article-card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Mẹo Giám Sát Hiệu Quả">
                            <div class="card-body">
                                <h5 class="card-title">Mẹo Giám Sát Hiệu Quả</h5>
                                <p class="card-text">Các mẹo giám sát công trình giúp tối ưu hóa tiến độ và chất lượng công
                                    việc.</p>
                                <a href="#" class="btn btn-primary custom-btn">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- Article Card 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card article-card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Mẹo Giám Sát Hiệu Quả">
                            <div class="card-body">
                                <h5 class="card-title">Mẹo Giám Sát Hiệu Quả</h5>
                                <p class="card-text">Các mẹo giám sát công trình giúp tối ưu hóa tiến độ và chất lượng công
                                    việc.</p>
                                <a href="#" class="btn btn-primary custom-btn">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- Article Card 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card article-card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Mẹo Giám Sát Hiệu Quả">
                            <div class="card-body">
                                <h5 class="card-title">Mẹo Giám Sát Hiệu Quả</h5>
                                <p class="card-text">Các mẹo giám sát công trình giúp tối ưu hóa tiến độ và chất lượng công
                                    việc.</p>
                                <a href="#" class="btn btn-primary custom-btn">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Các Hoạt Động Ấn Tượng -->
                    <h3 class="mt-5 mb-3 section-title">Hoạt Động Ấn Tượng</h3>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card activity-card h-100">
                                <img src="https://via.placeholder.com/500x300" class="card-img-top"
                                    alt="Hội Thảo Chuyên Đề">
                                <div class="card-body">
                                    <h5 class="card-title">Hội Thảo Chuyên Đề</h5>
                                    <p class="card-text">Công ty tổ chức hội thảo chuyên đề về các xu hướng xây dựng hiện
                                        đại.</p>
                                    <a href="#" class="btn btn-outline-primary">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card activity-card h-100">
                                <img src="https://via.placeholder.com/500x300" class="card-img-top"
                                    alt="Hoạt Động Xây Dựng">
                                <div class="card-body">
                                    <h5 class="card-title">Hoạt Động Xây Dựng</h5>
                                    <p class="card-text">Tham gia xây dựng các công trình tiêu biểu trong khu vực.</p>
                                    <a href="#" class="btn btn-outline-primary">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Quote Section -->
                <div class="quote-section">
                    <blockquote class="quote-text">
                        "Kiến trúc không chỉ là xây dựng, mà còn là sự thăng hoa của nghệ thuật và tâm hồn."
                    </blockquote>
                    <p class="quote-author">- Frank Lloyd Wright</p>
                </div>
            </div>

            <!-- Sidebar: col-3 -->
            <div class="col-lg-3">
                <div style="top: 20px;">
                    <h4 class="mb-3 section-title">Quảng Cáo</h4>
                    <div class="card banner-card">
                        <div class="banner-overlay">
                            <div class="banner-content">
                                <h3 class="banner-title">Giảm Giá Đặc Biệt</h3>
                                <p class="banner-discount">Lên đến <span>-50%</span></p>
                                <a href="#" class="btn btn-primary custom-btn">Xem Ngay</a>
                            </div>
                        </div>
                        <img src="https://via.placeholder.com/300x400" class="card-img banner-img" alt="Quảng Cáo">
                    </div>
                </div>
                <!-- Additional Image Cards -->
                <div class="sidebar-images">
                    <div class="sidebar-card mb-3">
                        <img src="https://via.placeholder.com/300x200" class="img-fluid rounded" alt="Sản phẩm nổi bật">
                        <h5 class="sidebar-title mt-2">Sản phẩm nổi bật</h5>
                    </div>
                    <div class="sidebar-card mb-3">
                        <img src="https://via.placeholder.com/300x200" class="img-fluid rounded" alt="Ưu đãi tháng 12">
                        <h5 class="sidebar-title mt-2">Ưu đãi tháng 12</h5>
                    </div>
                    <div class="sidebar-card mb-3">
                        <img src="https://via.placeholder.com/300x200" class="img-fluid rounded" alt="Dự án nổi bật">
                        <h5 class="sidebar-title mt-2">Dự án nổi bật</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
