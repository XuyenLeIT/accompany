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

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card img {
        border-bottom: 3px solid #ff8c42;
        /* Cam */
    }

    .card-body {
        background-color: #e9f7e7;
        /* Xanh lá cây nhạt */
        padding: 15px;
        color: #333;
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
        color: #2d6a4f;
        /* Xanh lá cây đậm */
    }

    .card-text {
        font-size: 14px;
        margin-bottom: 8px;
    }

    .card-footer {
        background-color: #ffecd0;
        /* Cam nhạt */
        color: #333;
        font-weight: bold;
        padding: 10px 15px;
        text-align: center;
    }

    .project-grid {
        margin: 20px 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .quote-section {
        margin: 30px auto;
        padding: 20px;
        background-color: #e9f7e7;
        /* Xanh lá cây nhạt */
        border-left: 5px solid #ff8c42;
        /* Viền màu cam */
        border-radius: 8px;
        max-width: 800px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .quote-text {
        font-style: italic;
        font-size: 20px;
        color: #2d6a4f;
        /* Xanh lá cây đậm */
        margin: 0 0 10px;
        line-height: 1.6;
    }

    .quote-author {
        font-size: 16px;
        color: #0066cc;
        /* Xanh dương đậm */
        font-weight: bold;
        margin: 0;
    }
</style>
@section('content')

    <div class="container project-grid">
        <div class="title-card mt-1 mb-2">
            <h2 class="title-page">DỰ ÁN TIÊU BIỂU</h2>
        </div>
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img src="https://via.placeholder.com/400x250?text=Dự+Án+1" class="img-fluid" alt="Dự án 1">
                    <div class="card-body">
                        <h5 class="card-title">Biệt Thự Đà Lạt</h5>
                        <p class="card-text">Loại công trình: Biệt Thự</p>
                        <p class="card-text">Diện tích: 300 m²</p>
                        <p class="card-text">Chủ đầu tư: Nguyễn Văn A</p>
                    </div>
                    <div class="card-footer">Hoàn thành: 2024</div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img src="https://via.placeholder.com/400x250?text=Dự+Án+2" class="img-fluid" alt="Dự án 2">
                    <div class="card-body">
                        <h5 class="card-title">Nhà Phố Hiện Đại</h5>
                        <p class="card-text">Loại công trình: Nhà phố</p>
                        <p class="card-text">Diện tích: 200 m²</p>
                        <p class="card-text">Chủ đầu tư: Trần Văn B</p>
                    </div>
                    <div class="card-footer">Hoàn thành: 2023</div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img src="https://via.placeholder.com/400x250?text=Dự+Án+3" class="img-fluid" alt="Dự án 3">
                    <div class="card-body">
                        <h5 class="card-title">Căn Hộ Cao Cấp</h5>
                        <p class="card-text">Loại công trình: Căn hộ</p>
                        <p class="card-text">Diện tích: 120 m²</p>
                        <p class="card-text">Chủ đầu tư: Lê Thị C</p>
                    </div>
                    <div class="card-footer">Hoàn thành: 2025</div>
                </div>
            </div>
        </div>
        <div class="quote-section">
            <blockquote class="quote-text">
                "Kiến trúc không chỉ là xây dựng, mà còn là sự thăng hoa của nghệ thuật và tâm hồn."
            </blockquote>
            <p class="quote-author">- Frank Lloyd Wright</p>
        </div>
    </div>


@endsection
