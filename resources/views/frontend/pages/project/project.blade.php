@extends('frontend.app')
@section('content')
@include('frontend.slider')

     <br>
    <!-- Project Start -->
    <div class="container-fluid blog pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Project</h4>
                <h1 class="display-5 mb-4">Our Successfully Completed Projects</h1>
                <p class="mb-0">At Codernetix, we take pride in delivering innovative and high-quality IT solutions. Our completed projects showcase our expertise in transforming complex challenges into seamless, efficient systems that drive business success.
                </p>
            </div>
            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
                @foreach($project as $projectData)
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="{{asset('images/project/'. $projectData->image )}}" class="img-fluid w-100 rounded"  style="height: 200px;" alt="">
                            <div class="blog-title">
                                <a href="{{$projectData->link}}" class="btn">Visit Site</a>
                            </div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">{{$projectData->title}}</a>
                        <p class="mb-4">{!! Str::limit($projectData->details, 150) !!}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
