@extends('frontend.app')
@section('content')

    <section class="cover-pic-header">
        <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
        <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle">
           Product Details - Ecommerch</h1>
    </section>
    <br>
    <section class="container my-5">
        <div class="row g-4 align-items-stretch" style="min-height:500px;">
            <div class="col-md-9 d-flex">
                <div class="position-relative shadow rounded overflow-hidden w-100 h-100">
                    <img src="{{ asset('images/product/' . $product->image) }}"
                         class="w-100 h-100 object-fit-cover"
                         alt="Product Image">
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card shadow-sm border-0 w-100 h-100">
                    <div class="card-body overflow-auto d-flex flex-column">
                        <h5 class="fw-bold mb-3 text-primary">Key Highlights</h5>
                        <div class="flex-grow-1">
                            <p>{!! $product->key_highlights  ? $product->key_highlights : 'No description available.' !!}</p>
                        </div>
                        <div class="mt-auto">
                            <a target="_blank" class="btn btn-secondary rounded-pill py-2 px-4 product-btn"
                               href="{{ $product->link }}">
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
                    <button class="btn btn-success rounded-pill px-5 py-2 fs-5"
                            data-bs-toggle="modal"
                            data-bs-target="#productRequestModal"
                            data-product-id="{{ $product->id }}">
                        Request For Product
                    </button>

                </div>
            </div>
        </div>
    </section>

    <!-- Product Request Modal -->
    <div class="modal fade" id="productRequestModal" tabindex="-1" aria-labelledby="productRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('product.request.submit') }}">
                @csrf
                <input type="hidden" name="product_id" id="modalProductId" value="{{ $product->id }}">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productRequestModalLabel">Request for Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send Request</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const modal = document.getElementById('productRequestModal');

                if (modal) {
                    modal.addEventListener('show.bs.modal', function (event) {
                        const button = event.relatedTarget;
                        if (!button) return;

                        const productId = button.getAttribute('data-product-id');
                        const hiddenInput = document.getElementById('modalProductId');

                        if (productId && hiddenInput) {
                            hiddenInput.value = productId;
                        }
                    });
                }
            });
        </script>
    @endpush

@endsection


