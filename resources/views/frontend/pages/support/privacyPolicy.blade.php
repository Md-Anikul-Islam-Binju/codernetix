@extends('frontend.app')
@section('content')

<section class="cover-pic-header">
    <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
    <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle">
        Privacy Policy</h1>
</section>

<section class="pb-8 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-12">

                <!-- heading -->
                <h1 class="fw-bold mb-3">Privacy Policy</h1>
                <p class="fs-4 mb-4">
                    At Codernetix, we value your privacy and are committed to protecting your personal information.
                    This Privacy Policy outlines how we collect, use, disclose, and safeguard your data when you use our services,
                    including custom software development, web and mobile application development, cloud solutions, hardware migration, and our ready-made software products.
                </p>

                <!-- Data Collection -->
                <h2 class="fw-bold mt-5">1. Information We Collect</h2>
                <p class="fs-4">
                    We may collect the following types of information:
                </p>
                <ul class="fs-4">
                    <li>Personal details such as your name, email address, phone number, and business information.</li>
                    <li>Billing and payment details for purchasing custom or ready-made software.</li>
                    <li>Technical information such as IP address, browser type, and device information.</li>
                    <li>Usage data regarding how you interact with our website and services.</li>
                </ul>

                <!-- Usage of Data -->
                <h2 class="fw-bold mt-5">2. How We Use Your Information</h2>
                <p class="fs-4">
                    We use your data to:
                </p>
                <ul class="fs-4">
                    <li>Provide and deliver our services, including software solutions and support.</li>
                    <li>Process transactions and send invoices.</li>
                    <li>Improve our website, applications, and services.</li>
                    <li>Communicate with you regarding updates, offers, or important notices.</li>
                    <li>Ensure compliance with legal and regulatory requirements.</li>
                </ul>

                <!-- Data Sharing -->
                <h2 class="fw-bold mt-5">3. Data Sharing and Disclosure</h2>
                <p class="fs-4">
                    We do not sell, rent, or trade your personal information. We may share your information only with:
                </p>
                <ul class="fs-4">
                    <li>Trusted service providers who assist us in delivering our services (e.g., payment gateways, cloud providers).</li>
                    <li>Legal authorities if required to comply with legal obligations or enforce our terms.</li>
                </ul>

                <!-- Data Security -->
                <h2 class="fw-bold mt-5">4. Data Security</h2>
                <p class="fs-4">
                    We implement appropriate technical, administrative, and physical security measures to protect your personal data from unauthorized access, loss, or misuse.
                </p>

                <!-- User Rights -->
                <h2 class="fw-bold mt-5">5. Your Rights</h2>
                <p class="fs-4">
                    You have the right to:
                </p>
                <ul class="fs-4">
                    <li>Access, update, or delete your personal information.</li>
                    <li>Request a copy of the data we hold about you.</li>
                    <li>Opt-out of marketing communications at any time.</li>
                </ul>

                <!-- Cookies -->
                <h2 class="fw-bold mt-5">6. Cookies and Tracking</h2>
                <p class="fs-4">
                    Our website may use cookies and similar tracking technologies to enhance user experience and analyze website performance.
                </p>

                <!-- Third-Party Links -->
                <h2 class="fw-bold mt-5">7. Third-Party Links</h2>
                <p class="fs-4">
                    Our services may contain links to third-party websites. We are not responsible for the privacy practices or content of those sites.
                </p>

                <!-- Policy Updates -->
                <h2 class="fw-bold mt-5">8. Changes to This Privacy Policy</h2>
                <p class="fs-4">
                    We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date.
                </p>



            </div>
        </div>
    </div>
</section>

@endsection
