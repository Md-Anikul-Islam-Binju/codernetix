@extends('frontend.app')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Career</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Career</li>
            </ol>
        </div>
    </div>

    <!-- Career Intro Section -->
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Join Our Team</h4>
            <h1 class="display-5 mb-4">Exciting Career Opportunities</h1>
            <p class="mb-0">
                Codernetix is always looking for talented individuals to join our team. Explore open positions and become part of a dynamic environment that values innovation, growth, and excellence.
            </p>
        </div>
    </div>

    <div class="container-fluid bg-white py-5">
        <div class="container py-5">
            @if($career->count() > 0)
                <div class="row">
                    @foreach($career as $job)
                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="card shadow-lg border-0 h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="card-title mb-1">{{ $job->title }}</h4>
                                            <p class="text-muted mb-1"><strong>Type:</strong> Full-Time</p>
                                            <p class="text-muted mb-0"><strong>Circular Date:</strong> {{ date('d-m-Y', strtotime($job->created_at)) }}</p>
                                        </div>
                                        <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#showNewModalId{{$job->id}}"> View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Show Modal -->
                        <div class="modal fade" id="showNewModalId{{$job->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="showNewModalLabel{{$job->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="showNewModalLabel{{$job->id}}">Job Details</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $job->details !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <i class="far fa-frown-open display-1 text-primary mb-4"></i>
                        <h1 class="mb-4">No Job Found</h1>
                        <p class="mb-4">We’re sorry, currently there is no open position.</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="/">Go Back To Home</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
