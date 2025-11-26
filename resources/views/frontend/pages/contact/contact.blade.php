@extends('frontend.app')
@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Contact Us</li>
            </ol>
        </div>
    </div>

    <!-- Contact Start -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Contact Us</h4>
                <h1 class="display-4 mb-4">Have comments? Apply Now!</h1>
            </div>
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="contact-img d-flex justify-content-center" >
                        <div class="contact-img-inner">
                            <img src="{{('frontend/img/contact.png')}}" class="img-fluid w-100"  alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <div>
                        <h4 class="text-primary">Send Your Message</h4>
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control border-0" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-126">
                                    <div class="form-floating">
                                        <input type="phone" name="phone" class="form-control border-0" id="phone" placeholder="Phone">
                                        <label for="phone">Your Phone</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="subject" class="form-control border-0" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" name="message" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="contact-add-item">
                                <div class="contact-icon text-primary mb-4">
                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-0">{{$siteSetting->address}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="contact-add-item">
                                <div class="contact-icon text-primary mb-4">
                                    <i class="fas fa-envelope fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-0">{{$siteSetting->email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="contact-add-item">
                                <div class="contact-icon text-primary mb-4">
                                    <i class="fa fa-phone-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-0">+88{{$siteSetting->phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                            <div class="contact-add-item">
                                <div class="contact-icon text-primary mb-4">
                                    <i class="fab fa-firefox-browser fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Website</h4>
                                    <p class="mb-0">{{$siteSetting->site_link}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="rounded">
                        <iframe class="rounded w-100"
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d228.20394244246273!2d90.42973009084304!3d23.773644409619113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c78d8583ee4f%3A0x75f19c2d2c29b3e8!2zU291dGggQmFyaWRoYXJhIFJlc2lkZW50YWlsIEFyZWEsRC5JLlQuIFByb2plY3QsIOCmouCmvuCmleCmviAxMjEy!5e0!3m2!1sbn!2sbd!4v1710827452659!5m2!1sbn!2sbd" class=" w-100 h-100"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
