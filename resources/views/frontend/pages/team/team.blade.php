@extends('frontend.app')
@section('content')
<section class="cover-pic-header">
    <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
    <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle">
        Team</h1>
</section>
<br><br><br>
<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Team</h4>
            <h1 class="display-5 mb-4">This highlights our team's expertise and contribution to success.</h1>
            <p class="mb-0">At Codernetix, our team is the backbone of our success. Comprised of skilled developers, designers, and IT specialists, each team member brings unique expertise and a passion for innovation.
            </p>
        </div>
        <div class="row g-4">
            @foreach($team as $teamData)
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('images/team/'. $teamData->image )}}" class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0">{{$teamData->name}}</h4>
                            <p class="mb-0">{{$teamData->designation}}</p>
                        </div>
                        <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
