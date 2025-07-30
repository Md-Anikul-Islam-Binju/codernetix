@extends('frontend.app')
@section('content')
{{--    <style>--}}
{{--        @media (max-width: 768px) {--}}
{{--            .position-relative img {--}}
{{--                max-height: 300px !important;--}}
{{--            }--}}
{{--            .btn,--}}
{{--            .badge {--}}
{{--                font-size: 0.875rem;--}}
{{--                padding: 6px 12px;--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}




    <section class="cover-pic-header">
        <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
        <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle">
           Product Details - Ecommerch</h1>
    </section>
    <br>

    <section class="container my-5">
        <div class="row g-4 align-items-stretch">

            <div class="col-md-9">
                <div class="position-relative shadow rounded overflow-hidden w-100 product-image-wrapper">
                    <img src="{{ asset('images/product/' . $product->image) }}"
                         class="w-100 h-100 product-image"
                         alt="Product Image">
                </div>
            </div>



            <!-- Short details (3 cols) -->
            <div class="col-md-3 d-flex">
                <div class="card shadow-sm border-0 w-100" style="height:500px;">
                    <div class="card-body overflow-auto">
                        <h5 class="fw-bold mb-3 text-primary">Key Highlights</h5>
                        <ul class="list-unstyled mb-0">

                            <p> {!! $product->key_highlights  ? $product->key_highlights : 'No description available.' !!}</p>

                        </ul>
                        <div class="position-absolute bottom-0 start-0 m-3">
                            <a target="_blank" class="btn btn-secondary rounded-pill py-2 px-4 product-btn" href="{{ $product->link }}">
                                Visit Project Link
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom row -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="p-4 shadow-sm rounded bg-light">
                    <h2 class="fw-bold mb-3 text-center">{{$product->title}}</h2>
                    <p class="text-muted fs-3">
                        {!! $product->long_details  ? $product->long_details : 'No description available.' !!}
                    </p>
                    <a class="btn btn-success rounded-pill px-5 py-2 fs-5" href="#">Request For Product</a>
                </div>
            </div>
        </div>

    </section>
@endsection


