@extends('frontend.app')
@section('content')

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Product</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-primary">Product</li>
        </ol>
    </div>
</div>


    @if($product->count() > 0)
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Product</h4>
                    <h1 class="display-5 mb-4">Products Ready For Sale</h1>
                    <p class="mb-0"> Codernetix offers ready-to-buy products and services, combining top quality with cost efficiency. Get solutions that save development time, deliver fast results, and provide maximum value for your business.
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
