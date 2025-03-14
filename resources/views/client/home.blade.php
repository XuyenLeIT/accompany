@extends('layouts.client')
@section('meta_tags')
    <!-- Meta Description: Tối ưu SEO cho mô tả ngắn gọn về dịch vụ -->
    <meta name="description"
        content="Công ty Giám sát xây dựng A&C chuyên cung cấp dịch vụ giám sát chất lượng, tiến độ, và an toàn cho các công trình xây dựng dân dụng và công nghiệp. Liên hệ ngay để nhận báo giá chi tiết.">
    <!-- Meta Keywords: Từ khóa liên quan đến ngành -->
    <meta name="keywords"
        content="giám sát xây dựng, giám sát công trình, dịch vụ xây dựng, giám sát chất lượng, tiến độ xây dựng, A&C">
      <!-- Meta Author: Thông tin tác giả hoặc công ty -->
      <meta name="author" content="Công Ty Giám Sát Xây Dựng A&C">
        <!-- Thẻ Open Graph cho chia sẻ trên mạng xã hội (Facebook, Zalo, LinkedIn) -->
    <meta property="og:title" content="Giám Sát Xây Dựng A&C - Dịch Vụ Giám Sát Chất Lượng Cao">
    <meta property="og:description"
        content="Công ty Giám sát xây dựng A&C cung cấp dịch vụ giám sát công trình uy tín và chuyên nghiệp. Đảm bảo chất lượng và tiến độ công trình xây dựng của bạn.">
    <meta property="og:image" content="{{ $introCompany->image }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <!-- Open Graph Image Format for better rendering -->
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endsection
@section('title', 'Trang chủ')
<style>
    /* carausels */
    .carousel-flick {
        background: #EEE;
        margin: auto;
    }

    .carousel-flick-cell {
        width: 100%;
        height: 300px;
        background: #8C8;
        border-radius: 5px;
        counter-increment: gallery-cell;
        padding: 10px;
    }


    .carousel-cell-flick:before {
        display: block;
        text-align: center;
        content: counter(gallery-cell);
        line-height: 200px;
        font-size: 80px;
        color: white;
    }

    .image-caraulsel {
        width: 100%;
        object-fit: cover;
        height: 280px;

    }
    .home-intro-container{
        width: 100%;
        display: flex;
        justify-items: center;
        height: 570px;
    }



    /* General Styling */
    .home-intro-content {
        background: linear-gradient(145deg, #f5f5f5, #ffffff);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
       
    }

    .home-intro-content h3 {
        font-size: 28px;
        font-weight: bold;
        color: #4CAF50;
        text-transform: uppercase;
        margin-bottom: 20px;
        text-shadow: 1px 1px 4px rgba(0, 102, 204, 0.3);
    }

    .text-highlight {
        color: #ff6a00;
        font-weight: bold;
    }

    .intro-content {
        font-size: 16px;
        line-height: 1.8;
        color: #555555;
        margin-bottom: 20px;
        text-align: justify;
    }

    /* Features List */
    .features-list {
        margin-top: 20px;
    }

    .features-list li {
        font-size: 16px;
        color: #333333;
        padding: 10px 0;
        position: relative;
        list-style-type: none;
    }

    .features-list .intro-icon {
        color: #ff6a00;
        font-size: 18px;
        margin-right: 10px;
    }

    /* Image Container */
    .image-container {
        text-align: center;
        max-height: 100%;
    }

    .image-container .home-intro-image {
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-container .home-intro-image:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }




    /* General Styling */
    .row.p-4 {
        background: linear-gradient(135deg, #ffffff, #f2f2f2);
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 20px;
    }

    /* Video Section */
    .video-container {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .video-container iframe {
        width: 100%;
        height: 400px;
        border: none;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .video-container:hover iframe {
        transform: scale(1.02);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    /* Description Section */
    .description-container {
        background: linear-gradient(135deg, #4CAF50, #ff6a00);
        padding: 20px;
        border-radius: 15px;
        color: white;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .description-title {
        font-size: 28px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 15px;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
        color: #ffffff;
    }

    .description-text {
        font-size: 16px;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.9);
    }

    .description-text .highlight {
        color: #ffeb3b;
        font-weight: bold;
    }



    /* General Container Styling */
    .item-work {
        margin-bottom: 40px;
        background: linear-gradient(135deg, #f9f9f9, #ffffff);
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .item-work:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
    }

    /* Title Styling */
    .title-acceptance {
        font-size: 24px;
        font-weight: bold;
        color: #0066cc;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .content-acceptance {
        font-size: 16px;
        line-height: 1.8;
        color: #555555;
    }

    .img-container {
        width: 100%;
        height: 250px;
        padding: 10px;
        margin-bottom: 30px;
    }

    /* Image Grid Styling */
    .img-acceptance {
        object-fit: contain;
        width: 100%;
        height: 100%;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .img-acceptance:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .img-intro {
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 15px;
    }

    .img-intro:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    /* Responsive Layout */
    @media (max-width: 768px) {
        .carousel-flick-cell {
            height: 140px;
        }

        .image-caraulsel {
            height: 120px;
        }

        .home-intro-content {
            padding: 20px;
        }

        .home-intro-content h3 {
            font-size: 24px;
        }

        .intro-content {
            font-size: 14px;
        }

        .features-list li {
            font-size: 14px;
        }

        .video-container iframe {
            height: 250px;
        }

        .description-container {
            padding: 15px;
        }

        .description-title {
            font-size: 22px;
        }

        .description-text {
            font-size: 14px;
        }
        .image-container .home-intro-image{
            display: none;
        }
        .item-work {
            padding: 15px;
        }

        .title-acceptance {
            font-size: 20px;
        }

        .content-acceptance {
            font-size: 14px;
        }

        .img-container {
            width: 80%;
            height: 100%;
            display: block;
            margin: auto;
            margin-bottom: 10px;
        }

        .card img {
            height: 250px;
        }
    }

    /* Title Styling */
    .fancy-title {
        font-size: 28px;
        font-weight: bold;
        text-transform: uppercase;
        color: #0066cc;
        margin-bottom: 30px;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 102, 204, 0.2);
    }

    /* Card Container */
    .card {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 20px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Image Styling */
    .card img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .fancy-title {
        font-size: 24px;
    }


    .card .overlay h2 {
        font-size: 16px;
    }

    /* Always Visible Overlay at Bottom */
    .card .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 10px 15px;
        text-align: center;
        border-radius: 0 0 15px 15px;
    }

    .card .overlay h2 {
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        margin: 0;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
    }

    .home-feedback {
        background: #E2DFD0;
        border-radius: 10px;
        margin-top: 10px;
        padding: 5px;
    }

    .carousel-item {
        text-align: center;
        padding: 30px;
    }

    .testimonial-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        display: inline-block;
    }

    .testimonial-card img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        border: 3px solid #007bff;
    }

    .testimonial-name {
        font-size: 18px;
        font-weight: bold;
        color: #343a40;
    }

    .testimonial-title {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 15px;
    }

    .testimonial-content {
        font-size: 16px;
        color: #6c757d;
        line-height: 1.5;
        font-style: italic;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #007bff;
        /* Màu xanh cho icon */
        border-radius: 50%;
        /* Biểu tượng dạng hình tròn */
        width: 40px;
        height: 40px;
    }

    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
        background-color: #0056b3;
        /* Màu đậm hơn khi hover */
    }
</style>
@section('content')
    <div class="row gx-0">
        @if ($carausels && $carausels->count() > 0)
            <div class="carousel-flick" data-flickity>
                @foreach ($carausels as $item)
                    <div class="carousel-flick-cell"><img src="{{ $item->image }}" class="image-caraulsel" /></div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="row p-4 gx-2 home-intro-container">
        @if ($homeIntro)
            <div class="col-md-7">
                <div class="home-intro-content">
                    <h3>{{ $homeIntro->title }}</h3>
                    <p class="intro-content">
                        {{ $homeIntro->description }}
                    </p>

                    <!-- Features List -->
                    <ul class="features-list row">
                        @foreach ($features_chunks as $chunk)
                            <div class="col-md-6">
                                @foreach ($chunk as $feature)
                                    <li><i class="intro-icon fa-solid fa-check"></i> {{ $feature['title'] }}</li>
                                @endforeach
                            </div>
                        @endforeach

                </div>
            </div>
            <div class="col-md-5">
                <div class="image-container">
                    <img src="{{ $homeIntro->image }}" alt="Giới Thiệu" class="home-intro-image">
                </div>
            </div>
        @endif
    </div>

    <div class="row p-4 gy-2 gx-1">
        @if ($introVideo)
            <!-- Video Section -->
            <div class="col-lg-7">
                <div class="video-container">
                    <iframe width="100%" height="400" src="{{ $introVideo->urlVideo }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Description Section -->
            <div class="col-lg-5">
                <div class="description-container">
                    <h2 class="description-title">{{ $introVideo->title }}</h2>
                    <p class="description-text">
                        {{ $introVideo->description }}
                    </p>
                </div>
            </div>
        @endif

    </div>
    @if ($panelJobs && $panelJobs->count() > 0)
        @foreach ($panelJobs as $item)
            <div class="item-work gx-0">
                <div class="row p-1">
                    @if ($item->type && $item->type == 1)
                        <div class="col-md-9">
                            <div class="row">
                                @if ($item->panelJobImages->count() > 0)
                                    @foreach ($item->panelJobImages as $ig)
                                        <div class="col-md-4">
                                            <div class="img-container">
                                                <img class="img-acceptance" src="{{ $ig->image }}" />
                                            </div>

                                        </div>
                                    @endforeach
                                @else
                                    <p>No Image</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="title-acceptance">{{ $item->title }}</h4>
                            <p class="content-acceptance">{{ $item->description }}</p>
                        </div>
                    @endif
                    @if ($item->type && $item->type == 2)
                        <div class="col-md-3">
                            <h4 class="title-acceptance">{{ $item->title }}</h4>
                            <p class="content-acceptance">{{ $item->description }}</p>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                @if ($item->panelJobImages->count() > 0)
                                    @foreach ($item->panelJobImages as $ig)
                                        <div class="col-md-4">
                                            <div class="img-container">
                                                <img class="img-acceptance" src="{{ $ig->image }}" />
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No Image</p>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        @endforeach

    @endif
    <div class="container p-1 item-work">
        <div class="row justify-content-center w-80 mx-auto">
            @if ($introCompany)
                <div class="col-md-5 m-auto">
                    @if ($introCompany->image)
                        <img class="img-intro" src="{{ $introCompany->image }}" />
                    @else
                        <p>No Image</p>
                    @endif
                </div>
                <div class="col-md-7">
                    <h4 class="title-acceptance">{{ $introCompany->title }}</h4>
                    <p class="content-acceptance">{!! $introCompany->description !!}</p>
                </div>
            @endif
        </div>
    </div>
    <div class="row mt-1 gx-0 p-3">
        <h3 class="text-center fancy-title">SỰ KHÁC BIỆT CỦA A&C</h3>
        @if ($outstandings && $outstandings->count() > 0)
            @foreach ($outstandings as $item)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $item->image }}" alt="Card Image">
                        <div class="overlay">
                            <h2>{{ $item->title }}</h2>
                        </div>
                    </div>
                </div>
            @endforeach

        @endif
    </div>
    <div class="container home-feedback">
        <h2 class="text-center mb-4">Cảm Nhận Khách Hàng</h2>
        @if ($feedbacks && $feedbacks->count() > 0)
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    @foreach ($feedbacks as $key => $item)
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="{{ $key }}"
                            class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"
                            aria-label="Slide-{{ $key }}"></button>
                    @endforeach
                </div>

                <!-- Slides -->
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    @foreach ($feedbacks as $key => $item)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="testimonial-card mx-auto">
                                <img src="{{ $item->image }}" alt="Customer Image">
                                <h5 class="testimonial-name">{{ $item->name }}</h5>
                                <p class="testimonial-title">Chủ Dự Án</p>
                                <p class="testimonial-content">
                                    "{{ $item->description }}"
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif

    </div>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
        const elem = document.querySelector('.carousel-flick');
        const flkty = new Flickity(elem, {
            cellAlign: 'center',
            contain: true,
            wrapAround: true, // Cho phép lặp lại carousel
            adaptiveHeight: true,
            autoPlay: 2000, // Tự động chuyển slide sau 3 giây
            prevNextButtons: true, // Hiển thị nút điều hướng
            pageDots: false // Hiển thị điểm chỉ báo
        });
    </script>

@endsection
