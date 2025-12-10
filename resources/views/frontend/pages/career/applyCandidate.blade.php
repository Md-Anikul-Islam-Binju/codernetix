@extends('frontend.app')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4">Career Details</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('career') }}">Career</a></li>
                <li class="breadcrumb-item active text-primary">{{ $job->title }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row">

            <!-- LEFT SIDE: JOB DETAILS -->
            <div class="col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-body p-4">

                        <h2 class="mb-3">{{ $job->title }}</h2>

                        <p class="text-muted mb-1">
                            <strong>Job Type:</strong> Full-Time
                        </p>

                        <p class="text-muted mb-4">
                            <strong>Published:</strong>
                            {{ date('d M, Y', strtotime($job->created_at)) }}
                        </p>

                        <hr>

                        <div class="job-details">
                            {!! $job->details !!}
                        </div>

                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE: APPLY FORM -->
            <div class="col-lg-4">
                <div class="card shadow border-0">
                    <div class="card-body p-4">

                        <h4 class="mb-3">Apply Now</h4>

                        <form action="{{ route('apply.candidate.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="job_id" value="{{ $job->id }}">

                            <div class="mb-3">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone *</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address *</label>
                                <textarea name="address" class="form-control" rows="2" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Joining Type</label>
                                <select name="join_type" id="join_type" class="form-control" required>
                                    <option value="Full Time">Full Time (Salary Based)</option>
                                    <option value="Commission Based">Commission Based</option>
                                    <option value="Contractual">Contractual</option>
                                </select>
                            </div>

                            <div class="mb-3" id="salary_field">
                                <label class="form-label">Expected Salary (BDT)</label>
                                <input type="number" name="expected_salary" class="form-control">
                            </div>

                            <div class="mb-3" id="salary_field">
                                <label class="form-label">CV / Resume *</label>
                                <input type="file" name="cv_or_resume" class="form-control" accept=".pdf,.doc,.docx" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">GitHub Profile</label>
                                <input type="url" name="github_link" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">LinkedIn Profile</label>
                                <input type="url" name="linkedin_link" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Portfolio Website</label>
                                <input type="url" name="portfolio_link" class="form-control">
                            </div>

                            <button class="btn btn-primary w-100 mt-2" type="submit">
                                Submit Application
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const joinType = document.getElementById("join_type");
            const salaryField = document.getElementById("salary_field");

            function toggleSalaryField() {
                if (joinType.value === "Full Time") {
                    salaryField.style.display = "block";
                } else {
                    salaryField.style.display = "none";
                }
            }

            // Initial check
            toggleSalaryField();

            // On change
            joinType.addEventListener("change", toggleSalaryField);
        });
    </script>



@endsection
