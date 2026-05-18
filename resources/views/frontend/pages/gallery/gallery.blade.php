@extends('frontend.app')
@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Gallery</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Gallery</li>
            </ol>
        </div>
    </div>


    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }
        .gallery-section{
            padding:80px 0;
        }
        .gallery-card{
            position:relative;
            overflow:hidden;
            border-radius:25px;
            height:320px;
            cursor:pointer;
            transition:0.5s;
            background:#1e293b;
            box-shadow:
                0 10px 30px rgba(0,0,0,.35);
        }
        .gallery-card img{
            width:100%;
            height:100%;
            object-fit:cover;
            transition:0.7s;
        }
        .gallery-card::before{
            content:'';
            position:absolute;
            inset:0;
            background:linear-gradient(
                to top,
                rgba(15,23,42,.95),
                rgba(15,23,42,.2),
                transparent
            );
            z-index:1;
        }
        .gallery-card:hover img{
            transform:scale(1.15) rotate(2deg);
        }
        .gallery-card:hover .gallery-content{
            transform:translateY(0);
            opacity:1;
        }
        .gallery-card:hover{
            transform:translateY(-10px);
        }
        .big-card{
            height:660px;
        }
        .floating-shape{
            position:absolute;
            width:300px;
            height:300px;
            border-radius:50%;
            background:linear-gradient(to right,#0ea5e9,#6366f1);
            filter:blur(120px);
            opacity:.25;
            z-index:-1;
        }
        .shape1{
            top:-100px;
            left:-100px;
        }
        .shape2{
            bottom:-100px;
            right:-100px;
        }
        @media(max-width:991px){

            .big-card{
                height:320px;
            }

            .section-title h1{
                font-size:40px;
            }

        }
    </style>

    <section class="gallery-section position-relative">
        <div class="floating-shape shape1"></div>
        <div class="floating-shape shape2"></div>
        <div class="container">
            <div class="row g-4">
                <!-- BIG IMAGE -->
                <div class="col-lg-6">
                    <div class="gallery-card big-card">

                        <img
                            src="{{asset('images/gallery/'. $firstItem->image )}}"
                            alt=""
                        >
                    </div>
                </div>

                <!-- RIGHT SIDE -->
                <div class="col-lg-6">

                    <div class="row g-4">
                        @foreach($secondSet as $secondSetItem)
                        <div class="col-md-6">
                            <div class="gallery-card">

                                <img
                                    src="{{asset('images/gallery/'. $secondSetItem->image )}}"
                                    alt=""
                                >


                            </div>
                        </div>
                        @endforeach

                        <div class="col-md-12">
                            <div class="gallery-card">

                                <img
                                    src="{{asset('images/gallery/'. $fourthItem->image )}}"
                                    alt=""
                                >



                            </div>
                        </div>

                    </div>

                </div>

                <!-- EXTRA CARDS -->
                @foreach($gallery as $item)
                    <div class="col-md-4">
                        <div class="gallery-card">

                            <img
                                src="{{asset('images/gallery/'. $item->image )}}"
                                alt=""
                            >
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
