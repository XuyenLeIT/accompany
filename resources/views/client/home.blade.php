@extends('layouts.client')
@section('title', 'Home Page')
<style>
    /* carausels */
        .carousel-flick {
        background: #EEE;
      }
      
      .carousel-flick-cell {
        width: 100%;
        height: 300px;
        margin-right: 10px;
        background: #8C8;
        border-radius: 5px;
        counter-increment: gallery-cell;
        padding: 10px;
      }
      
      /* cell number */
      .carousel-cell-flick:before {
        display: block;
        text-align: center;
        content: counter(gallery-cell);
        line-height: 200px;
        font-size: 80px;
        color: white;
      }
      .image-caraulsel{
        width: 100%;
        object-fit: cover;
        height: 100%;

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
    }

    .image-container .home-intro-image {
        width: 100%;
        height: auto;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .image-container .home-intro-image:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
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

    /* Responsive */
    @media (max-width: 768px) {
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

    /* Image Grid Styling */
    .img-acceptance {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 15px;
    }

    .img-acceptance:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    /* Responsive Layout */
    @media (max-width: 768px) {
        .item-work {
            padding: 15px;
        }

        .title-acceptance {
            font-size: 20px;
        }

        .content-acceptance {
            font-size: 14px;
        }

        .img-acceptance {
            height: 150px;
        }
    }

    /* Title Styling */
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
        height: 250px;
        object-fit: cover;
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

    /* Responsive Styling */
    @media (max-width: 768px) {
        .fancy-title {
            font-size: 24px;
        }

        .card img {
            height: 200px;
        }

        .card .overlay h2 {
            font-size: 16px;
        }
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

    <div class="container-fluid">
        <div class="row">
            <div class="carousel-flick" data-flickity>
                @if ($carausels)
                    @foreach ($carausels as $item)
                    <div class="carousel-flick-cell"><img src="{{$item->image}}" class="image-caraulsel"/></div>
                    @endforeach
                @endif
             
              </div>
        </div>
        <div class="row p-4">
            @if ($homeIntro)
                <div class="col-md-7">
                    <div class="home-intro-content">

                        {{-- @dd($homeIntro) --}}
                        {{-- <h3>CHÚNG TÔI SINH RA VÌ <span class="text-highlight">HẠNH PHÚC</span> CỦA CHÍNH BẠN</h3> --}}
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
                        <img src="{{$homeIntro->image}}" alt="Giới Thiệu"
                            class="home-intro-image">
                    </div>
                </div>
            @endif
        </div>

        <div class="row p-4">
            <!-- Video Section -->
            <div class="col-lg-7">
                <div class="video-container">
                    <iframe width="100%" height="400"
                        src="https://www.youtube.com/embed/nUkE0nHEb34?si=5wmmZ069G2CP1vMv" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Description Section -->
            <div class="col-lg-5">
                <div class="description-container">
                    <h2 class="description-title">GIÁ TRỊ ĐẾN TỪ TÂM</h2>
                    <p class="description-text">
                        Công ty chúng tôi tự hào mang lại những giải pháp giám sát xây dựng tối ưu nhất, đảm bảo chất lượng
                        và sự hài lòng của khách hàng.
                        <span class="highlight">Chúng tôi sinh ra vì hạnh phúc của chính bạn.</span> Với đội ngũ chuyên
                        nghiệp, giàu kinh nghiệm, chúng tôi cam kết tạo nên những công trình không chỉ bền vững mà còn mang
                        giá trị lâu dài.
                    </p>
                </div>
            </div>
        </div>
        <div class="item-work">
            <div class="row p-1">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-acceptance"
                                src="https://hoangphuanh.com/wp-content/uploads/2020/05/anh02-cong-trinh-dang-thi-cong-phan-san.jpg" />
                        </div>
                        <div class="col-md-4">
                            <img class="img-acceptance"
                                src="https://vnteco.com/wp-content/uploads/2016/05/ket-cau-mong-1.jpg" />
                        </div>
                        <div class="col-md-4">
                            <img class="img-acceptance"
                                src="https://hoangphuanh.com/wp-content/uploads/2020/05/anh02-cong-trinh-dang-thi-cong-phan-san.jpg" />
                        </div>
                        <div class="col-md-4">
                            <img class="img-acceptance"
                                src="https://hoangphuanh.com/wp-content/uploads/2020/05/anh02-cong-trinh-dang-thi-cong-phan-san.jpg" />
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <h4 class="title-acceptance">GIÁM SÁT-NGHIỆM THU THÉP</h4>
                    <p class="content-acceptance">Tất cả công trình thi công do SBS HOUSE thực hiện đều đảm bảo những giải
                        pháp
                        mới và tối ưu nhất nhằm
                        mang đến một sản phẩm kiên cố, bền vững. Mặc dù thi công nhà phố nhưng từ hạng mục lớn nhỏ đều được
                        áp
                        dụng kỹ thuật thi công nhà cao tầng Coteccons. Hơn thế nữa, các công trình được thiết kế - thi công
                        trọn
                        gói sẽ giống với bản vẽ thiết kế ít nhất 95%.</p>
                </div>
            </div>
        </div>
        <div class="item-work">
            <div class="row p-5">
                <div class="col-md-3">
                    <h4 class="title-acceptance">GIÁM SÁT-NGHIỆM THU BÊ TÔNG</h4>
                    <p class="content-acceptance">Tất cả công trình thi công do SBS HOUSE thực hiện đều đảm bảo những giải
                        pháp mới và tối ưu nhất nhằm
                        mang đến một sản phẩm kiên cố, bền vững. Mặc dù thi công nhà phố nhưng từ hạng mục lớn nhỏ đều được
                        áp
                        dụng kỹ thuật thi công nhà cao tầng Coteccons. Hơn thế nữa, các công trình được thiết kế - thi công
                        trọn
                        gói sẽ giống với bản vẽ thiết kế ít nhất 95%.</p>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-acceptance"
                                src="https://naphoga.info/upload/images/Tieu%20chuan%20nghiem%20thu%20be%20tong%20cot%20thep.jpg" />
                        </div>
                        <div class="col-md-4">
                            <img class="img-acceptance"
                                src="https://3adesign.vn/wp-content/uploads/nghiem-thu-cong-trinh-green-villa-8.jpg" />
                        </div>
                        <div class="col-md-4">
                            <img class="img-acceptance"
                                src="https://luatduonggia.vn/wp-content/uploads/2021/04/Mau-bien-ban-nghiem-thu-be-tong-cot-thep.jpg" />
                        </div>
                        <div class="col-md-4">
                            <img class="img-acceptance"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaE4ALksjiutvDmYpKL2_OPr1dB4MXy4vv1woeUbXmX0RbDHodnb89Jmmt1J8378JhRlY&usqp=CAU" />
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <h3 class="text-center fancy-title">SỰ KHÁC BIỆT CỦA A&C</h3>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://img.meta.com.vn/Data/image/2022/06/28/may-thuy-binh-la-gi-cong-dung-va-cau-tao-cua-may-thuy-binh-6.jpg"
                        alt="Card Image">
                    <div class="overlay">
                        <h2>Card Title</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://bizweb.dktcdn.net/thumb/1024x1024/100/464/139/products/may-do-do-am-dat-cat-than-da-dm300l.jpg?v=1677572440617"
                        alt="Card Image">
                    <div class="overlay">
                        <h2>Card Title</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://img.meta.com.vn/Data/image/2022/06/28/may-thuy-binh-la-gi-cong-dung-va-cau-tao-cua-may-thuy-binh-6.jpg"
                        alt="Card Image">
                    <div class="overlay">
                        <h2>Card Title</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container home-feedback">
            <h2 class="text-center mb-4">Cảm Nhận Khách Hàng</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>

                <!-- Slides -->
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="testimonial-card mx-auto">
                            <img src="https://via.placeholder.com/80" alt="Customer Image">
                            <h5 class="testimonial-name">Nguyễn Văn A</h5>
                            <p class="testimonial-title">Chủ Dự Án</p>
                            <p class="testimonial-content">
                                "Dịch vụ tư vấn giám sát của công ty thật tuyệt vời. Công trình của tôi hoàn thành đúng tiến
                                độ và đạt chất lượng vượt mong đợi!"
                            </p>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="testimonial-card mx-auto">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVQ_uINv8HoTirutteQ7grrQ8qTkE8wxF6VljQaSrgtFiNykezCX9jHZbSGj2zJRumTCH1EYP3gS756aYxNMSsjA"
                                alt="Customer Image">
                            <h5 class="testimonial-name">Trần Thị B</h5>
                            <p class="testimonial-title">Nhà Đầu Tư</p>
                            <p class="testimonial-content">
                                "Tôi rất hài lòng với sự chuyên nghiệp của đội ngũ kỹ sư. Họ luôn lắng nghe và đưa ra giải
                                pháp phù hợp nhất cho dự án của tôi."
                            </p>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="testimonial-card mx-auto">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVQ_uINv8HoTirutteQ7grrQ8qTkE8wxF6VljQaSrgtFiNykezCX9jHZbSGj2zJRumTCH1EYP3gS756aYxNMSsjA"
                                alt="Customer Image">
                            <h5 class="testimonial-name">Lê Hoàng C</h5>
                            <p class="testimonial-title">Khách Hàng</p>
                            <p class="testimonial-content">
                                "Đội ngũ tận tâm, trách nhiệm và luôn đảm bảo quyền lợi cho khách hàng. Đây là sự lựa chọn
                                tôi tin tưởng!"
                            </p>
                        </div>
                    </div>
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
        </div>
    </div>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
        // Khởi tạo Flickity
        const elem = document.querySelector('.carousel-flick');
        const flkty = new Flickity(elem, {
            cellAlign: 'left',
            contain: true,
            wrapAround: true, // Cho phép lặp lại carousel
            autoPlay: 2000,  // Tự động chuyển slide sau 3 giây
            prevNextButtons: true, // Hiển thị nút điều hướng
            pageDots: false    // Hiển thị điểm chỉ báo
        });
    </script>
@endsection
