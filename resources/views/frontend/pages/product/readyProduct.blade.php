@extends('frontend.app')
@section('content')
    <section class="cover-pic-header">
        <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
        <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle">
           Product Details - Ecommerch</h1>
    </section>
    <br><br><br>

    <section class="container my-5">

        <div class="row g-4 align-items-stretch">

            <!-- Banner Image (9 cols) -->
            <div class="col-md-9 d-flex">
                <div class="position-relative shadow rounded overflow-hidden w-100" style="height:500px;">
                    <img src="{{ URL::to('frontend/img/offer-1.jpg') }}"
                         class="w-100 h-100 object-fit-cover"
                         alt="Banner Image">
                    <a href="">
                        <span class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2 fs-6">Live Link</span>
                    </a>

                </div>
            </div>

            <!-- Short details (3 cols) -->
            <div class="col-md-3 d-flex">
                <div class="card shadow-sm border-0 w-100" style="height:500px;">
                    <div class="card-body overflow-auto">
                        <h5 class="fw-bold mb-3 text-primary">Key Highlights</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">✅ High performance</li>
                            <li class="mb-2">✅ Easy integration</li>
                            <li class="mb-2">✅ Cost-effective</li>
                            <li class="mb-2">✅ Scalable solution</li>
                            <li class="mb-2">✅ 24/7 support</li>
                            <li class="mb-2">✅ Secure technology</li>
                            <li class="mb-2">✅ User-friendly UI</li>
                            <li class="mb-2">✅ Trusted by experts</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom row -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="p-4 shadow-sm rounded bg-light">
                    <h2 class="fw-bold mb-3">The stock market provides a venue...</h2>
                    <p class="text-muted fs-5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis amet sequi molestiae tenetur eum mollitia,
                        blanditiis, magnam illo magni error dolore unde perspiciatis tempore et totam corrupti dignissimos aut praesentium?
                    </p>
                    <a class="btn btn-success rounded-pill px-5 py-2 fs-5" href="#">Request For Product</a>
                </div>
            </div>
        </div>

    </section>
@endsection


