@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CoderNetix</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Project History</a></li>
                        <li class="breadcrumb-item active">Manage Project Histories</li>
                    </ol>
                </div>
                <h4 class="page-title">Project Histories</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewHistoryModal">Add New Project History</button>
                </div>
            </div>
            <div class="card-body">
                <table id="project-histories-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Project Category</th>
                        <th>Project Name</th>
                        <th>Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Budget</th>
                        <th>Amount Paid</th>
                        <th>Due</th>
                        <th>Client Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($project as $key => $history)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $history->category->name }}</td>
                            <td>{{ $history->project_name }}</td>
                            <td>{{ $history->project_type }}</td>
                            <td>{{ $history->project_start_date }}</td>
                            <td>{{ $history->project_end_date }}</td>
                            <td>{{ $history->project_budget }}</td>
                            <td>{{ $history->project_amount_paid }}</td>
                            <td>{{ $history->project_due }}</td>
                            <td>{{ $history->client_name }}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editHistoryModal{{$history->id}}">Edit</button>
                                    <a href="{{route('project.history.destroy',$history->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$history->id}}">Delete</a>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editHistoryModal{{$history->id}}" tabindex="-1" aria-labelledby="editHistoryLabel{{$history->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Project History</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('project.history.update', $history->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="category_id" class="form-label">Project Category</label>
                                                        <select name="category_id" class="form-select" required>
                                                            <option value="">Select Category</option>
                                                            @foreach($category as $categoryData) <!-- Adjusted to match your variable naming -->
                                                            <option value="{{ $categoryData->id }}" {{ $history->category_id == $categoryData->id ? 'selected' : '' }}>
                                                                {{ $categoryData->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="project_name" class="form-label">Project Name</label>
                                                        <input type="text" name="project_name" class="form-control" value="{{ old('project_name', $history->project_name) }}" placeholder="Enter Project Name" required>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="project_type" class="form-label">Project Type</label>
                                                        <select name="project_type" class="form-select" required>
                                                            <option value="">Select Project Type</option>
                                                            <option value="Full" {{ $history->project_type == 'Full' ? 'selected' : '' }}>Full</option>
                                                            <option value="Custom" {{ $history->project_type == 'Custom' ? 'selected' : '' }}>Custom</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="project_document" class="form-label">Project Document</label>
                                                        <input type="file" name="project_document" class="form-control">
                                                        @if($history->project_document)
                                                            <small>Current Document: <a href="{{ asset('/documents/project-history/' . $history->project_document) }}" target="_blank">View Document</a></small>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="project_complete_duration" class="form-label">Project Complete Duration (days)</label>
                                                        <input type="number" name="project_complete_duration" class="form-control" value="{{ old('project_complete_duration', $history->project_complete_duration) }}" placeholder="Enter Duration">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="project_budget" class="form-label">Project Budget</label>
                                                        <input type="number" name="project_budget" class="form-control" value="{{ old('project_budget', $history->project_budget) }}" placeholder="Enter Budget">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="project_amount_paid" class="form-label">Amount Paid</label>
                                                        <input type="number" name="project_amount_paid" class="form-control" value="{{ old('project_amount_paid', $history->project_amount_paid) }}" placeholder="Enter Amount Paid">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="project_due" class="form-label">Project Due</label>
                                                        <input type="number" name="project_due" class="form-control" value="{{ old('project_due', $history->project_due) }}" placeholder="Enter Project Due">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="project_start_date" class="form-label">Project Start Date</label>
                                                        <input type="date" name="project_start_date" class="form-control" value="{{ old('project_start_date', $history->project_start_date) }}">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="project_end_date" class="form-label">Project End Date</label>
                                                        <input type="date" name="project_end_date" class="form-control" value="{{ old('project_end_date', $history->project_end_date) }}">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="client_name" class="form-label">Client Name</label>
                                                        <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $history->client_name) }}" placeholder="Enter Client Name">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="client_email" class="form-label">Client Email</label>
                                                        <input type="email" name="client_email" class="form-control" value="{{ old('client_email', $history->client_email) }}" placeholder="Enter Client Email">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="client_phone" class="form-label">Client Phone</label>
                                                        <input type="text" name="client_phone" class="form-control" value="{{ old('client_phone', $history->client_phone) }}" placeholder="Enter Client Phone">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="client_address" class="form-label">Client Address</label>
                                                        <input type="text" name="client_address" class="form-control" value="{{ old('client_address', $history->client_address) }}" placeholder="Enter Client Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div id="danger-header-modal{{$history->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$history->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-danger">
                                        <h4 class="modal-title" id="danger-header-modalLabe{{$history->id}}l">Delete</h4>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <a href="{{route('project.history.destroy',$history->id)}}" class="btn btn-danger">Delete</a>
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

    <!-- Add New Project History Modal -->
    <div class="modal fade" id="addNewHistoryModal" tabindex="-1" aria-labelledby="addNewHistoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Project History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('project.history.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Project Category</label>
                                    <select name="category_id" class="form-select" required>
                                        <option value="">Select Category</option>
                                        @foreach($category as $categoryData)
                                            <option value="{{$categoryData->id}}">{{$categoryData->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project_name" class="form-label">Project Name</label>
                                    <input type="text" name="project_name" class="form-control" placeholder="Enter Project Name" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project_type" class="form-label">Project Type</label>
                                    <select name="project_type" class="form-select" required>
                                        <option value="">Select Project Type</option>
                                        <option value="Full">Full</option>
                                        <option value="Custom">Custom</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project_document" class="form-label">Project Document</label>
                                    <input type="file" name="project_document" class="form-control">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project_complete_duration" class="form-label">Project Complete Duration (days)</label>
                                    <input type="number" name="project_complete_duration" class="form-control" placeholder="Enter Duration">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project_budget" class="form-label">Project Budget</label>
                                    <input type="number" name="project_budget" class="form-control" placeholder="Enter Budget">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project_amount_paid" class="form-label">Amount Paid</label>
                                    <input type="number" name="project_amount_paid" class="form-control" placeholder="Enter Amount Paid">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project_due" class="form-label">Project Due</label>
                                    <input type="number" name="project_due" class="form-control" placeholder="Enter Project Due">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project_start_date" class="form-label">Project Start Date</label>
                                    <input type="date" name="project_start_date" class="form-control">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project_end_date" class="form-label">Project End Date</label>
                                    <input type="date" name="project_end_date" class="form-control">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="client_name" class="form-label">Client Name</label>
                                    <input type="text" name="client_name" class="form-control" placeholder="Enter Client Name">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="client_email" class="form-label">Client Email</label>
                                    <input type="email" name="client_email" class="form-control" placeholder="Enter Client Email">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="client_phone" class="form-label">Client Phone</label>
                                    <input type="text" name="client_phone" class="form-control" placeholder="Enter Client Phone">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="client_address" class="form-label">Client Address</label>
                                    <input type="text" name="client_address" class="form-control" placeholder="Enter Client Address">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Add Project History</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
