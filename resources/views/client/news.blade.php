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
        height: 200px;
        object-fit: cover;
    }

    .card-title {
        color: #2d6a4f;
        /* Màu xanh lá cây đậm */
        font-size: 18px;
        font-weight: bold;
    }

    .card-text {
        font-size: 14px;
        color: #555;
    }

    .advertisement img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
@section('content')
    <div class="container">
        <!-- Header -->
        <div class="title-card mt-1 mb-2">
            <h2 class="title-page">Tin Tức Mới Nhất</h2>
        </div>
        <div class="row">
            <!-- Col-9: Bài viết chính -->
            <div class="col-lg-9">
                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/400x200?text=Bài+Viết+1" alt="Bài viết 1">
                            <div class="card-body">
                                <h5 class="card-title">Bài Viết Tiêu Biểu</h5>
                                <p class="card-text">Một bài viết hấp dẫn về các chủ đề nóng hổi trong lĩnh vực kiến trúc.
                                </p>
                                <button class="btn btn-primary btn-sm">Đọc Thêm</button>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/400x200?text=Bài+Viết+2" alt="Bài viết 2">
                            <div class="card-body">
                                <h5 class="card-title">Xu Hướng Mới Trong Thiết Kế</h5>
                                <p class="card-text">Tìm hiểu các xu hướng thiết kế nổi bật năm 2024.</p>
                                <button class="btn btn-primary btn-sm">Đọc Thêm</button>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/400x200?text=Bài+Viết+3" alt="Bài viết 3">
                            <div class="card-body">
                                <h5 class="card-title">Công Nghệ Xây Dựng Tương Lai</h5>
                                <p class="card-text">Công nghệ đang thay đổi cách chúng ta xây dựng các công trình.</p>
                                <button class="btn btn-primary btn-sm">Đọc Thêm</button>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/400x200?text=Bài+Viết+4" alt="Bài viết 4">
                            <div class="card-body">
                                <h5 class="card-title">Phỏng Vấn Chuyên Gia</h5>
                                <p class="card-text">Những chia sẻ từ chuyên gia hàng đầu trong ngành.</p>
                                <button class="btn btn-primary btn-sm">Đọc Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Col-2: Quảng cáo -->
            <div class="col-lg-3">
                <div class="advertisement">
                    <img src="https://via.placeholder.com/200x400?text=Ad+1" alt="Quảng cáo 1">
                    <img src="https://via.placeholder.com/200x400?text=Ad+2" alt="Quảng cáo 2">
                    <img src="https://via.placeholder.com/200x400?text=Ad+3" alt="Quảng cáo 3">
                </div>
            </div>
        </div>
    </div>
@endsection
