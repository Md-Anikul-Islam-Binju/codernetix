@extends('frontend.app')
@section('content')

    <style>
        html, body {
            overflow-x: hidden;
        }

        .bg-breadcrumb {
            overflow-x: hidden;
        }

        .gallery-section {
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            height: 320px;
            cursor: pointer;
            background: #1e293b;
            box-shadow: 0 10px 25px rgba(0,0,0,.25);
            transition: 0.4s ease;
        }

        .gallery-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: 0.6s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.08);
        }

        .gallery-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(15,23,42,.85),
                transparent
            );
            z-index: 1;
        }

        .big-card {
            height: 660px;
        }

        .floating-shape {
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: linear-gradient(to right,#0ea5e9,#6366f1);
            filter: blur(120px);
            opacity: .2;
            z-index: -1;
        }

        .shape1 {
            top: -120px;
            left: -120px;
        }

        .shape2 {
            bottom: -120px;
            right: -120px;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .big-card {
                height: 320px;
            }
        }

        @media (max-width: 576px) {
            .gallery-card {
                height: 240px;
            }

            .gallery-section {
                padding: 50px 0;
            }
        }
    </style>

    <!-- BREADCRUMB -->
    <div class="container-fluid bg-breadcrumb overflow-hidden">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">Gallery</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Gallery</li>
            </ol>
        </div>
    </div>

    <!-- GALLERY -->
    <section class="gallery-section">
        <div class="floating-shape shape1"></div>
        <div class="floating-shape shape2"></div>

        <div class="container px-3 overflow-hidden">
            <div class="row g-4">

                <!-- LEFT BIG IMAGE -->
                <div class="col-lg-6 col-md-12">
                    <div class="gallery-card big-card">
                        <img src="{{ asset('images/gallery/'.$firstItem->image) }}" alt="">
                    </div>
                </div>

                <!-- RIGHT SIDE -->
                <div class="col-lg-6 col-md-12">
                    <div class="row g-4">

                        @foreach($secondSet as $secondSetItem)
                            <div class="col-md-6 col-6">
                                <div class="gallery-card">
                                    <img src="{{ asset('images/gallery/'.$secondSetItem->image) }}" alt="">
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12">
                            <div class="gallery-card">
                                <img src="{{ asset('images/gallery/'.$fourthItem->image) }}" alt="">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- EXTRA GALLERY -->
                @foreach($gallery as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="gallery-card">
                            <img src="{{ asset('images/gallery/'.$item->image) }}" alt="">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
