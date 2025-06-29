@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CoderNetix</a></li>
                        <li class="breadcrumb-item active">Manage Project Payment</li>
                    </ol>
                </div>
                <h4 class="page-title">Project Payment Histories ({{$projectHistory->project_name}})</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if($currentDue > 0)
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewHistoryModal">Add Payment History</button>
                </div>
                @endif
            </div>
            <div class="card-body">
                <table id="project-histories-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Project Name</th>
                        <th>Start Date</th>
                        <th>Budget</th>
                        <th>Amount Paid</th>
                        <th>Due</th>
                        <th>Amount Recived Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projectPayment as $key => $history)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $history->project->project_name }}</td>
                            <td>{{ $history->project->project_start_date }}</td>
                            <td>{{ $history->project_budget }}</td>
                            <td>{{ $history->project_amount_paid }}</td>
                            <td>{{ $history->project_due }}</td>
                            <td>{{ $history->payment_date }}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editHistoryModal{{$history->id}}">Edit</button>
                                    <a href="{{route('project.payment.history.destroy',$history->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$history->id}}">Delete</a>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editHistoryModal{{$history->id}}" tabindex="-1" aria-labelledby="editHistoryLabel{{$history->id}}" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Payment History</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('project.payment.history.update', $history->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">


                                                <input  name="project_id" value="{{$history->project_id}}">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="project_budget" class="form-label">Project Budget</label>
                                                        <input type="number" readonly name="project_budget" class="form-control" value="{{ old('project_budget', $history->project_budget) }}" placeholder="Enter Budget">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="project_amount_paid" class="form-label">Amount Paid</label>
                                                        <input type="number" name="project_amount_paid" class="form-control" value="{{ old('project_amount_paid', $history->project_amount_paid) }}" placeholder="Enter Amount Paid">
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="project_start_date" class="form-label">Payment Received Date</label>
                                                        <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', $history->payment_date) }}">
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
                                        <a href="{{route('project.payment.history.destroy',$history->id)}}" class="btn btn-danger">Delete</a>
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('project.payment.history.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden"  name="project_id"  value="{{$projectHistory->id}}">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="project_budget" class="form-label">Project Budget</label>
                                    <input type="number" readonly name="project_budget" class="form-control" value="{{$projectHistory->project_budget}}" placeholder="Enter Budget">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="project_amount_paid" class="form-label">Amount Paid</label>
                                    <input type="number" name="project_amount_paid" class="form-control"
                                           placeholder="Remaining Due: {{ $currentDue }}" value="{{ $currentDue }}">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="project_start_date" class="form-label">Payment Received Date</label>
                                    <input type="date" name="payment_date" class="form-control">
                                </div>
                            </div>


                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Add Payment History</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
