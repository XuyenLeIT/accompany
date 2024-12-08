@extends('layouts.client')
@section('title', 'Home Page')
<style>
    .main-content {
        background-color: #e9f7e7;
        /* Xanh lá cây nhạt */
        border-radius: 10px;
        padding: 20px;
    }

    .sidebar {
        background-color: #ffe8d6;
        /* Cam nhạt */
        border-radius: 10px;
        padding: 20px;
    }

    .header-title {
        color: #2d6a4f;
        /* Xanh đậm */
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table th,
    table td {
        border: 1px solid #000;
        text-align: center;
        padding: 8px;
    }

    table th {
        background-color: #f2f2f2;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .highlight {
        color: red;
        font-weight: bold;
    }

    .note {
        font-size: 14px;
        margin-top: 10px;
    }

    .note span {
        color: red;
    }

    .articles-section {
        margin-top: 30px;
        padding: 20px;
        border: 1px solid #2d6a4f;
        /* Xanh lá cây đậm */
        border-radius: 10px;
        background: linear-gradient(145deg, #f1fdf4, #e0f7eb);
        /* Nền gradient xanh nhạt */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .articles-section h3 {
        color: #2d6a4f;
        font-weight: bold;
        font-size: 24px;
        border-bottom: 2px solid #2d6a4f;
        padding-bottom: 8px;
        margin-bottom: 15px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .articles-section ul {
        list-style-type: none;
        padding: 0;
    }

    .articles-section ul li {
        margin-bottom: 15px;
        background-color: #f8f9fa;
        /* Nền nhạt */
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        color: #2d6a4f;
        /* Xanh đậm */
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
    }

    .articles-section ul li::before {
        content: "✓";
        /* Icon check */
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #52b788;
        /* Màu xanh lá cây nhạt */
        font-size: 18px;
    }

    .articles-section ul li:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        background-color: #e9f7e7;
        /* Nền xanh lá nhạt khi hover */
    }

    .process-section {
        background-color: gray;
        /* Màu nền tối */
        padding: 20px 0;
        display: flex;
        justify-content: space-evenly;
        width: 100%;
    }

    .step-item {
        color: #fff;
        /* Màu chữ trắng */
        margin-bottom: 30px;
    }

    .step-icon {
        font-size: 48px;
        color: #f0c808;
        /* Màu vàng nhấn mạnh */
        margin-bottom: 15px;
    }

    .step-title {
        font-size: 18px;
        font-weight: bold;
        color: #f0c808;
        /* Màu vàng */
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .step-desc {
        font-size: 14px;
        line-height: 1.6;
        color: #ccc;
        /* Màu chữ xám nhạt */
    }

    /* Mũi tên giữa các bước */
    .arrow-container {
        justify-content: center;
        align-items: center;
    }

    .arrow-container i {
        font-size: 32px;
        color: #f0c808;
        /* Màu vàng */
    }

    @media (max-width: 768px) {
        .step-icon {
            font-size: 36px;
        }

        .step-title {
            font-size: 16px;
        }

        .step-desc {
            font-size: 13px;
        }

        .arrow-container i {
            font-size: 24px;
        }
    }
</style>
@section('content')
    <div class="container my-4">
        <div class="row">
            <!-- Nội dung chính -->
            <div class="col-lg-9 col-md-8">
                <div class="main-content">
                    <h2 class="header-title">Báo Giá Sản Phẩm</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Gói dịch vụ</th>
                                <th>Thời gian giám sát</th>
                                <th>Thời gian (h)/ngày</th>
                                <th>Chi phí / tháng</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->package}}</td>
                                    <td>{{$item->timew}}</td>
                                    <td>{{$item->timed}}</td>
                                    <td>{{intval($item->cost)}} triệu</td>
                                    <td>{{$item->note}}</td>
              
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   <p>{!! $notePrice->desNote!!}</p>
                    <button class="btn btn-primary">Tải báo giá</button>
                </div>
                <!-- Bài viết quy trình -->
                <div class="articles-section">
                    <h3>Quy Trình Giám Sát Xây Dựng Từ Ép Cọc Đến Hoàn Thiện</h3>
                    <ul>
                        <li>Quy trình giám sát giai đoạn ép cọc và nền móng</li>
                        <li>Giám sát xây thô: Những điều cần lưu ý</li>
                        <li>Quy trình giám sát phần hoàn thiện công trình</li>
                        <li>Kiểm tra và nghiệm thu công trình trước khi bàn giao</li>
                        <li>Cách tối ưu chi phí trong giám sát xây dựng</li>
                    </ul>
                </div>

            </div>
            <!-- Banner quảng cáo -->
            <div class="col-lg-3 col-md-4">
                <div class="sidebar">
                    <h4 class="text-center">Quảng Cáo</h4>
                    <div class="mt-3">
                        <img src="https://via.placeholder.com/250x200?text=Ad+1" class="img-fluid rounded mb-3"
                            alt="Ad 1">
                        <img src="https://via.placeholder.com/250x200?text=Ad+2" class="img-fluid rounded mb-3"
                            alt="Ad 2">
                        <img src="https://via.placeholder.com/250x200?text=Ad+3" class="img-fluid rounded mb-3"
                            alt="Ad 3">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="process-section">
                <div class="row text-center align-items-center">
                    <!-- Step 1 -->
                    <div class="col-lg-2 col-md-6 step-item">
                        <div class="step-icon">
                            <i class="fa-regular fa-handshake"></i>
                        </div>
                        <h5 class="step-title">Trao Đổi Tư Vấn</h5>
                        <p class="step-desc">Trao đổi yêu cầu, tư vấn định hướng ý tưởng, phong cách và mức đầu tư.</p>
                    </div>
                    <!-- Icon mũi tên -->
                    <div class="col-lg-1 d-none d-lg-flex arrow-container">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                    <!-- Step 2 -->
                    <div class="col-lg-2 col-md-6 step-item">
                        <div class="step-icon">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <h5 class="step-title">Báo Giá Quy Trình</h5>
                        <p class="step-desc">Gửi khách hàng báo giá theo đúng gói thiết kế và quy trình làm việc cụ thể.
                        </p>
                    </div>
                    <!-- Icon mũi tên -->
                    <div class="col-lg-1 d-none d-lg-flex arrow-container">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                    <!-- Step 3 -->
                    <div class="col-lg-2 col-md-6 step-item">
                        <div class="step-icon">
                            <i class="fa-solid fa-pen"></i>
                        </div>
                        <h5 class="step-title">Ký Hợp Đồng</h5>
                        <p class="step-desc">Thực hiện các thủ tục hành chính và bắt đầu triển khai các công việc.</p>
                    </div>
                    <!-- Icon mũi tên -->
                    <div class="col-lg-1 d-none d-lg-flex arrow-container">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                    <!-- Step 4 -->
                    <div class="col-lg-2 col-md-6 step-item">
                        <div class="step-icon">
                            <i class="fa-solid fa-bars-progress"></i>
                        </div>
                        <h5 class="step-title">Bàn Giao & Quyết Toán</h5>
                        <p class="step-desc">Sau khi hoàn thành, khách hàng thanh toán lần cuối và nhận hồ sơ hoàn
                            chỉnh.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
