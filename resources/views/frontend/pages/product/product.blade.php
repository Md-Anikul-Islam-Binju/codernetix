@extends('frontend.app')
@section('content')

    <section class="cover-pic-header">
        <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
        <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle  mt-5">
          Our Ready Product</h1>
    </section>

    @if($product->count() > 0)
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Ready Product</h4>
                    <h1 class="display-5 mb-4">Ready Product Best Price</h1>
                    <p class="mb-0"> CoderNetix delivers ready-to-use products and services. We ensure top quality at the best possible price.
                        Our solutions are immediately deployable, saving you development time. Experience optimal value and rapid
                        results with CoderNetix offerings.
                    </p>
                </div>
                <div class="row g-4">
                    @foreach($product as $productData)
                        <div class="col-md-6 col-lg-4 wow fadeInUp h-100" data-wow-delay="0.2s">
                            <div class="service-item">
                                <div class="service-img">
                                    <img style="height: 250px;" src="{{asset('images/product/'. $productData->image )}}" class="img-fluid rounded-top w-100" alt="Image">
                                </div>
                                <div class="rounded-bottom p-4">
                                    <a href="{{route('product.details',$productData->id)}}" class="h4 d-inline-block mb-4">{{$productData->title}}</a>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="{{route('product.details',$productData->id)}}">Learn Project Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif



@endsection
