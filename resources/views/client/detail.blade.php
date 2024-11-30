@extends('layouts.client')
@section('title', 'Home Page')
<style>
    /* Nội dung bài viết */
    .article-content {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .article-title {
        color: #0066cc;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .article-meta {
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }

    .article-body p {
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 15px;
        color: #333;
    }

    /* Quảng cáo */
    .advertisement {
        background-color: #ffe5b2;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .advertisement h5 {
        color: #2d6a4f;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .advertisement img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
     /* Tiêu đề bài viết liên quan */
     .related-title {
        color: #2d6a4f;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 20px;
        font-size: 20px;
    }

    /* Card bài viết liên quan */
    .related-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .related-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .related-card img {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .related-card .card-title {
        font-size: 16px;
        font-weight: bold;
        color: #0066cc;
        margin-bottom: 10px;
    }

    .related-card .card-text {
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }

    .related-card .btn {
        font-size: 14px;
    }
</style>
@section('content')
    <div class="container mt-2">
        <div class="row">
            <!-- Nội dung bài viết -->
            <div class="col-lg-9">
                <div class="article-content">
                    <h1 class="article-title">Tiêu Đề Chi Tiết Bài Viết</h1>
                    <div class="article-meta">
                        <span>Tác giả: Nguyễn Văn A</span> | <span>Ngày đăng: 27/11/2024</span>
                    </div>
                    <div class="article-body">
                        <p>
                            Đây là đoạn nội dung chi tiết của bài viết. Nội dung này nhằm cung cấp thông tin, kiến thức
                            hoặc câu chuyện liên quan đến chủ đề chính.
                        </p>
                        <p>
                            Bạn có thể chèn thêm nhiều đoạn văn để giải thích hoặc minh họa, sử dụng hình ảnh, hoặc video
                            để làm rõ nội dung.
                        </p>
                        <p>
                            Kết luận sẽ tóm tắt nội dung và đưa ra những thông điệp chính mà bạn muốn truyền tải đến người
                            đọc.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quảng cáo -->
            <div class="col-lg-3">
                <div class="advertisement">
                    <h5>Quảng Cáo</h5>
                    <img src="https://via.placeholder.com/250x200?text=Ad+1" alt="Quảng cáo 1">
                    <img src="https://via.placeholder.com/250x200?text=Ad+2" alt="Quảng cáo 2">
                    <img src="https://via.placeholder.com/250x200?text=Ad+3" alt="Quảng cáo 3">
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Danh sách bài viết liên quan -->
            <h3 class="related-title">Bài Viết Liên Quan</h3>
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card related-card">
                        <img src="https://via.placeholder.com/300x200?text=Bài+Viết+1" class="card-img-top" alt="Bài viết 1">
                        <div class="card-body">
                            <h5 class="card-title">Tiêu đề bài viết 1</h5>
                            <p class="card-text">Tóm tắt ngắn gọn nội dung của bài viết liên quan.</p>
                            <a href="#" class="btn btn-primary btn-sm">Đọc Thêm</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card related-card">
                        <img src="https://via.placeholder.com/300x200?text=Bài+Viết+2" class="card-img-top" alt="Bài viết 2">
                        <div class="card-body">
                            <h5 class="card-title">Tiêu đề bài viết 2</h5>
                            <p class="card-text">Tóm tắt ngắn gọn nội dung của bài viết liên quan.</p>
                            <a href="#" class="btn btn-primary btn-sm">Đọc Thêm</a>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card related-card">
                        <img src="https://via.placeholder.com/300x200?text=Bài+Viết+3" class="card-img-top" alt="Bài viết 3">
                        <div class="card-body">
                            <h5 class="card-title">Tiêu đề bài viết 3</h5>
                            <p class="card-text">Tóm tắt ngắn gọn nội dung của bài viết liên quan.</p>
                            <a href="#" class="btn btn-primary btn-sm">Đọc Thêm</a>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card related-card">
                        <img src="https://via.placeholder.com/300x200?text=Bài+Viết+4" class="card-img-top" alt="Bài viết 4">
                        <div class="card-body">
                            <h5 class="card-title">Tiêu đề bài viết 4</h5>
                            <p class="card-text">Tóm tắt ngắn gọn nội dung của bài viết liên quan.</p>
                            <a href="#" class="btn btn-primary btn-sm">Đọc Thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
