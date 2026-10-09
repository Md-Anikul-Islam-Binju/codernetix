
@extends('admin.app')
@section('admin_content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">CoderNetix</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">E-GP</a>
                        </li>
                        <li class="breadcrumb-item active">E-GP!</li>
                    </ol>
                </div>
                <h4 class="page-title">E-GP!</h4>
            </div>
        </div>
    </div>

    {{-- E-GP Table --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    @can('egp-create')
                        <button type="button"
                                class="btn btn-info"
                                data-bs-toggle="modal"
                                data-bs-target="#addNewModalId">
                            Add New
                        </button>
                    @endcan
                </div>
            </div>

            <div class="card-body">

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close"
                                data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <table id="basic-datatable"
                       class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Tender ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Security Amount</th>
                        <th>Status</th>
                        <th>Days Left</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($egps as $key => $egp)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $egp->title }}</td>
                            <td>{{ $egp->tender_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($egp->start_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($egp->end_date)->format('d M Y') }}</td>
                            <td>
                                {{ number_format((float) $egp->security_amount, 2) }}
                            </td>

                            {{-- Dynamic Status --}}
                            <td>
                                @php
                                    $statusClass = match ($egp->computed_status) {
                                        'Over' => 'bg-danger',
                                        'Urgent' => 'bg-danger',
                                        'Upcoming' => 'bg-warning',
                                        default => 'bg-success',
                                    };
                                @endphp

                                <span class="badge {{ $statusClass }}">
                                        {{ $egp->computed_status }}
                                    </span>
                            </td>


                            <td>
                                @if ($egp->days_left < 0)
                                    <span class="badge bg-danger">
                                        Expired {{ abs($egp->days_left) }} days ago
                                    </span>
                                                            @elseif ($egp->days_left == 0)
                                                                <span class="badge bg-warning text-dark">
                                        Last Day
                                    </span>
                                                            @else
                                                                <span class="badge {{ $egp->days_left <= 20 ? 'bg-danger' : ($egp->days_left <= 30 ? 'bg-warning text-dark' : 'bg-success') }}">
                                        {{ $egp->days_left }} days left
                                    </span>
                                @endif
                            </td>

                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">

                                    @can('egp-edit')
                                        <button type="button"
                                                class="btn btn-info btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editNewModalId{{ $egp->id }}">
                                            Edit
                                        </button>
                                    @endcan

                                    @can('egp-delete')
                                        <a href="javascript:void(0);"
                                           class="btn btn-danger btn-sm"
                                           data-bs-toggle="modal"
                                           data-bs-target="#danger-header-modal{{ $egp->id }}">
                                            Delete
                                        </a>
                                    @endcan

                                </div>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div class="modal fade"
                             id="editNewModalId{{ $egp->id }}"
                             data-bs-backdrop="static"
                             tabindex="-1"
                             role="dialog"
                             aria-labelledby="editNewModalLabel{{ $egp->id }}"
                             aria-hidden="true">

                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title"
                                            id="editNewModalLabel{{ $egp->id }}">
                                            Edit E-GP
                                        </h4>

                                        <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form method="POST"
                                              action="{{ route('egp.update', $egp->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            Title
                                                        </label>

                                                        <input type="text"
                                                               name="title"
                                                               class="form-control"
                                                               value="{{ $egp->title }}"
                                                               placeholder="Enter Title"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            Tender ID
                                                        </label>

                                                        <input type="text"
                                                               name="tender_id"
                                                               class="form-control"
                                                               value="{{ $egp->tender_id }}"
                                                               placeholder="Enter Tender ID"
                                                               required>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            Security Amount
                                                        </label>

                                                        <input type="number"
                                                               name="security_amount"
                                                               class="form-control"
                                                               value="{{ $egp->security_amount }}"
                                                               placeholder="Enter Security Amount"
                                                               min="0"
                                                               step="0.01"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            Start Date
                                                        </label>

                                                        <input type="date"
                                                               name="start_date"
                                                               class="form-control"
                                                               value="{{ $egp->start_date->format('Y-m-d') }}"
                                                               required>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            End Date
                                                        </label>

                                                        <input type="date"
                                                               name="end_date"
                                                               class="form-control"
                                                               value="{{ $egp->end_date->format('Y-m-d') }}"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Current Status
                                                </label>

                                                <input type="text"
                                                       class="form-control"
                                                       value="{{ $egp->computed_status }}"
                                                       readonly>

                                                <small class="text-muted">
                                                    Status is calculated automatically
                                                    from the end date.
                                                </small>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-primary"
                                                        type="submit">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Delete Modal --}}
                        <div id="danger-header-modal{{ $egp->id }}"
                             class="modal fade"
                             tabindex="-1"
                             role="dialog"
                             aria-labelledby="danger-header-modalLabel{{ $egp->id }}"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header modal-colored-header bg-danger">
                                        <h4 class="modal-title"
                                            id="danger-header-modalLabel{{ $egp->id }}">
                                            Delete
                                        </h4>

                                        <button type="button"
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <h5 class="mt-0">
                                            Are you sure you want to delete this?
                                        </h5>

                                        <p class="mb-1">
                                            <strong>Title:</strong>
                                            {{ $egp->title }}
                                        </p>

                                        <p class="mb-0">
                                            <strong>Tender ID:</strong>
                                            {{ $egp->tender_id }}
                                        </p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button"
                                                class="btn btn-light"
                                                data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <form method="POST"
                                              action="{{ route('egp.destroy', $egp->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    <div class="modal fade"
         id="addNewModalId"
         data-bs-backdrop="static"
         tabindex="-1"
         role="dialog"
         aria-labelledby="addNewModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">
                        Add E-GP
                    </h4>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('egp.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>

                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           placeholder="Enter Title"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Tender ID</label>

                                    <input type="text"
                                           name="tender_id"
                                           class="form-control"
                                           placeholder="Enter Tender ID"
                                           required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Security Amount
                                    </label>

                                    <input type="number"
                                           name="security_amount"
                                           class="form-control"
                                           placeholder="Enter Security Amount"
                                           min="0"
                                           step="0.01"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Start Date</label>

                                    <input type="date"
                                           name="start_date"
                                           class="form-control"
                                           required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">End Date</label>

                                    <input type="date"
                                           name="end_date"
                                           class="form-control"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
