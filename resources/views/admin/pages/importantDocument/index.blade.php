@extends('admin.app')

@section('admin_content')

    <div class="content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">

                    <div class="page-title-box">

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard">Dashboard</a>
                                </li>

                                <li class="breadcrumb-item active">
                                    Important Documents
                                </li>
                            </ol>
                        </div>

                        <h4 class="page-title">
                            Important Documents
                        </h4>

                    </div>

                </div>
            </div>


            <!-- Form -->
            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-header">
                            <h4 class="header-title">
                                Important Documents
                            </h4>
                        </div>


                        <div class="card-body">

                            <form
                                action="{{ route(
                                'important.documents.createOrUpdate',
                                $importantDocument ? $importantDocument->id : null
                            ) }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >

                                @csrf


                                <div class="row g-3">

                                    {{-- Trade Licence --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            Trade Licence
                                        </label>

                                        <input
                                            type="file"
                                            name="tread_licence"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                        >

                                        @if($importantDocument?->tread_licence)

                                            <div class="mt-2">

                                                <a
                                                    href="{{ asset($importantDocument->tread_licence) }}"
                                                    target="_blank"
                                                    class="btn btn-sm btn-outline-primary"
                                                >
                                                    <i class="bi bi-file-earmark-text"></i>
                                                    View Current File
                                                </a>

                                            </div>

                                        @endif

                                        @error('tread_licence')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>


                                    {{-- TIN Certificate --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            TIN Certificate
                                        </label>

                                        <input
                                            type="file"
                                            name="tin_certificate"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                        >

                                        @if($importantDocument?->tin_certificate)

                                            <div class="mt-2">

                                                <a
                                                    href="{{ asset($importantDocument->tin_certificate) }}"
                                                    target="_blank"
                                                    class="btn btn-sm btn-outline-primary"
                                                >
                                                    <i class="bi bi-file-earmark-text"></i>
                                                    View Current File
                                                </a>

                                            </div>

                                        @endif

                                        @error('tin_certificate')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>


                                    {{-- BIN Certificate --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            BIN Certificate
                                        </label>

                                        <input
                                            type="file"
                                            name="bin_certificate"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                        >

                                        @if($importantDocument?->bin_certificate)

                                            <div class="mt-2">

                                                <a
                                                    href="{{ asset($importantDocument->bin_certificate) }}"
                                                    target="_blank"
                                                    class="btn btn-sm btn-outline-primary"
                                                >
                                                    <i class="bi bi-file-earmark-text"></i>
                                                    View Current File
                                                </a>

                                            </div>

                                        @endif

                                        @error('bin_certificate')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>


                                    {{-- Company Pad --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            Company Pad Document
                                        </label>

                                        <input
                                            type="file"
                                            name="company_pad_doc"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                        >

                                        @if($importantDocument?->company_pad_doc)

                                            <div class="mt-2">

                                                <a
                                                    href="{{ asset($importantDocument->company_pad_doc) }}"
                                                    target="_blank"
                                                    class="btn btn-sm btn-outline-primary"
                                                >
                                                    <i class="bi bi-file-earmark-text"></i>
                                                    View Current File
                                                </a>

                                            </div>

                                        @endif

                                        @error('company_pad_doc')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>


                                    {{-- Domain Renewal Invoice --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            Company Domain Renew Invoice
                                        </label>

                                        <input
                                            type="file"
                                            name="company_domain_renew_invoice"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                        >

                                        @if($importantDocument?->company_domain_renew_invoice)

                                            <div class="mt-2">

                                                <a
                                                    href="{{ asset($importantDocument->company_domain_renew_invoice) }}"
                                                    target="_blank"
                                                    class="btn btn-sm btn-outline-primary"
                                                >
                                                    <i class="bi bi-file-earmark-text"></i>
                                                    View Current File
                                                </a>

                                            </div>

                                        @endif

                                        @error('company_domain_renew_invoice')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>


                                    {{-- Old Trade Licence Multiple --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            <i class="bi bi-files me-1"></i>
                                            Old Trade Licence Documents
                                        </label>

                                        <input
                                            type="file"
                                            name="old_tread_licence_multiple[]"
                                            id="old_tread_licence_multiple"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                            multiple
                                        >

                                        <div id="old-tread-file-list" class="mt-2"></div>

                                        @if($importantDocument?->old_tread_licence_multiple)

                                            <div class="mt-3">

                                                <strong class="d-block mb-2">
                                                    Existing Documents:
                                                </strong>

                                                @foreach($importantDocument->old_tread_licence_multiple as $key => $file)

                                                    <div class="mb-2">

                                                        <a
                                                            href="{{ asset($file) }}"
                                                            target="_blank"
                                                            class="btn btn-sm btn-outline-primary"
                                                        >
                                                            <i class="bi bi-file-earmark-text me-1"></i>
                                                            View Document {{ $key + 1 }}
                                                        </a>

                                                    </div>

                                                @endforeach

                                            </div>

                                        @endif

                                        @error('old_tread_licence_multiple')
                                        <small class="text-danger d-block">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                        @error('old_tread_licence_multiple.*')
                                        <small class="text-danger d-block">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>

                                    {{-- VAT Certificate Multiple --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            <i class="bi bi-file-earmark-spreadsheet me-1"></i>
                                            VAT Certificate Documents
                                        </label>

                                        <input
                                            type="file"
                                            name="vat_certificate_multiple[]"
                                            id="vat_certificate_multiple"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                            multiple
                                        >

                                        <div id="vat-file-list" class="mt-2"></div>

                                        @if($importantDocument?->vat_certificate_multiple)

                                            <div class="mt-3">

                                                <strong class="d-block mb-2">
                                                    Existing Documents:
                                                </strong>

                                                @foreach($importantDocument->vat_certificate_multiple as $key => $file)

                                                    <div class="mb-2">

                                                        <a
                                                            href="{{ asset($file) }}"
                                                            target="_blank"
                                                            class="btn btn-sm btn-outline-primary"
                                                        >
                                                            <i class="bi bi-file-earmark-text me-1"></i>
                                                            View Document {{ $key + 1 }}
                                                        </a>

                                                    </div>

                                                @endforeach

                                            </div>

                                        @endif

                                        @error('vat_certificate_multiple')
                                        <small class="text-danger d-block">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                        @error('vat_certificate_multiple.*')
                                        <small class="text-danger d-block">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>

                                    {{-- TIN Return Certificate Multiple --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            <i class="bi bi-file-earmark-text me-1"></i>
                                            TIN Return Certificate Documents
                                        </label>

                                        <input
                                            type="file"
                                            name="tin_return_certificate_multiple[]"
                                            id="tin_return_certificate_multiple"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                            multiple
                                        >

                                        <div
                                            id="tin-return-file-list"
                                            class="mt-2"
                                        ></div>


                                        @if($importantDocument?->tin_return_certificate_multiple)

                                            <div class="mt-3">

                                                <strong class="d-block mb-2">
                                                    Existing Documents:
                                                </strong>

                                                @foreach($importantDocument->tin_return_certificate_multiple as $key => $file)

                                                    <div class="mb-2">

                                                        <a
                                                            href="{{ asset($file) }}"
                                                            target="_blank"
                                                            class="btn btn-sm btn-outline-primary"
                                                        >
                                                            <i class="bi bi-file-earmark-text me-1"></i>
                                                            View Document {{ $key + 1 }}
                                                        </a>

                                                    </div>

                                                @endforeach

                                            </div>

                                        @endif


                                        @error('tin_return_certificate_multiple')
                                        <small class="text-danger d-block">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                        @error('tin_return_certificate_multiple.*')
                                        <small class="text-danger d-block">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>


                                    {{-- Long Details --}}
                                    <div class="col-md-12">

                                        <label class="form-label">
                                            Details
                                        </label>




                                        <textarea id="summernoteEditLong{{ $importantDocument->id }}" name="long_details">{{ $importantDocument->long_details }}</textarea>

                                        @error('long_details')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror

                                    </div>

                                </div>


                                <div class="mt-4">

                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="bi bi-save"></i>
                                        Save
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- File Preview -->
    <script>

        function showSelectedFiles(inputId, listId) {

            const input = document.getElementById(inputId);
            const list = document.getElementById(listId);

            if (!input || !list) {
                return;
            }

            input.addEventListener('change', function () {

                list.innerHTML = '';

                if (this.files.length === 0) {
                    return;
                }


                const title = document.createElement('strong');

                title.className = 'd-block mb-2';

                title.innerText = 'Selected Documents:';

                list.appendChild(title);


                Array.from(this.files).forEach((file) => {

                    const div = document.createElement('div');

                    div.className =
                        'd-flex align-items-center justify-content-between border rounded p-2 mb-2';


                    div.innerHTML = `
                        <div>
                            <i class="bi bi-file-earmark-text me-2"></i>
                            ${file.name}
                        </div>

                        <small class="text-muted">
                            ${(file.size / 1024 / 1024).toFixed(2)} MB
                        </small>
                    `;


                    list.appendChild(div);

                });

            });

        }


        // Old Trade Licence
        showSelectedFiles(
            'old_tread_licence_multiple',
            'old-tread-file-list'
        );


        // VAT Certificate
        showSelectedFiles(
            'vat_certificate_multiple',
            'vat-file-list'
        );


        // TIN Return Certificate
        showSelectedFiles(
            'tin_return_certificate_multiple',
            'tin-return-file-list'
        );

    </script>

@endsection
