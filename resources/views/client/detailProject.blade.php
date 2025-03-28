@extends('layouts.client')
@section('title', 'Tư Vấn Giám Sát')
@section('meta_tags')
    <meta name="description" content="{{ $cleanDescription }}">
    <meta name="keywords" content="giamsatxaydung,tuvanxaydung,tintucxaydung,xaynha">
    <meta name="author" content="Trương Minh Hải">
    <!-- Thẻ Open Graph cho chia sẻ trên mạng xã hội -->
    <meta property="og:title" content="{{ $detailProject->title }}">
    <meta property="og:description" content="{{ $cleanDescription }}">
    <meta property="og:image"
        content="https://thumbs.dreamstime.com/z/working-online-work-office-businessman-employee-cartoon-vector-illustration-154769768.jpg">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
@endsection
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
        max-height: 300px;
        object-fit: cover;
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

    .text-title {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        /* number of lines to show */
        line-clamp: 1;
        -webkit-box-orient: vertical;
    }

    .text-description {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>
@section('content')
    <div class="container mt-2">
        {{-- @dd($newsDetail) --}}
        <div class="row">
            <!-- Nội dung bài viết -->
            <div class="col-lg-9">
                @if ($detailProject)
                    @php
                        $date = new DateTime($detailProject->created_at);
                        // Định dạng lại thành dd/mm/yyyy
                        $formattedDate = $date->format('d/m/Y');
                    @endphp
                    <div class="article-content">
                        <h1 class="article-title">{{ $detailProject->title }}</h1>
                        <div class="article-meta">
                            <span>Tác giả: Trương Minh Hải</span> | <span>Ngày đăng:
                                {{ $formattedDate }}</span>
                        </div>
                        <div class="article-body">
                            <p>
                                {!! $detailProject->description !!}
                            </p>
                        </div>
                    </div>
                @endif

            </div>

            <!-- Quảng cáo -->
            <div class="col-lg-3">
                <div class="advertisement">
                    <h5>Hoạt Động Giám Sát</h5>
                    @if ($adsDetail->count() > 0)
                        @foreach ($adsDetail as $item)
                            <img class="image-ads" src="{{ $item->image }}" alt="Quảng cáo 1">
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                @php
                    function slugText($title, $id)
                    {
                        $value = $title . '-' . $id;
                        $slug = Str::slug($value);
                        return $slug;
                    }
                    function cleanText($input)
                    {
                        $decodedText = html_entity_decode($input, ENT_QUOTES, 'UTF-8');
                        $plainText = strip_tags($decodedText);
                        return preg_replace('/[^\p{L}\p{N}\s]/u', '', $plainText);
                    }
                @endphp
                <div class="row gx-3 gy-3">
                    <!-- Danh sách bài viết liên quan -->
                    <h3 class="related-title">Các dự án khác</h3>
                    @if ($projectOther)
                        {{-- @dd($projectOther) --}}
                        @foreach ($projectOther as $item)
                            <!-- Card 1 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card related-card">
                                    <img src="{{ $item->image }}" class="card-img-top" alt="Bài viết 1">
                                    <div class="card-body">
                                        <h5 class="card-title text-title">{{ $item->title }}</h5>
                                        <p class="card-text text-description">{{ cleanText($item->description) }}</p>
                                        <a href="{{ route('client.detailProject', [slugText($item->title, $item->id)]) }}"
                                            class="btn btn-primary btn-sm">Đọc Thêm</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection
