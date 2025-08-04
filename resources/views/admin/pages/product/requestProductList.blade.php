@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CoderNetix</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Request Product</a></li>
                        <li class="breadcrumb-item active">Request Product!</li>
                    </ol>
                </div>
                <h4 class="page-title">Request Product!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product Name</th>
                        <th>Client Name</th>
                        <th>Client Email</th>
                        <th>Client Phone</th>
                        <th>Client Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productRequests as $key=>$productRequestsData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$productRequestsData->product->title}}</td>
                            <td>{{$productRequestsData->name}}</td>
                            <td>{{$productRequestsData->email}}</td>
                            <td>{{$productRequestsData->phone}}</td>
                            <td>{{$productRequestsData->address}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex">
                                    <a href="{{route('request.product.destroy',$productRequestsData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$productRequestsData->id}}">Delete</a>
                                </div>
                            </td>
                            <!-- Delete Modal -->
                            <div id="danger-header-modal{{$productRequestsData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$productRequestsData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$productRequestsData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('request.product.destroy',$productRequestsData->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
