@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CoderNetix</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Contact</a></li>
                        <li class="breadcrumb-item active">Contact!</li>
                    </ol>
                </div>
                <h4 class="page-title">Contact!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contact as $key=>$contactData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$contactData->name}}</td>
                            <td>{{$contactData->email}}</td>
                            <td>{{$contactData->phone}}</td>
                            <td>{{$contactData->subject}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#messageNewModalId{{$contactData->id}}">Message</button>
                            </td>
                            <td style="width: 100px;">
                                <div class="d-flex">
                                    <a href="{{route('contact.destroy',$contactData->id)}}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$contactData->id}}">Delete</a>
                                </div>
                            </td>

                            <div class="modal fade" id="messageNewModalId{{$contactData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="messageNewModalLabel{{$contactData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$contactData->id}}">Message</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <pre style="font-family: inherit;">
                                                  {{ $contactData->message }}
                                            </pre>
                                        </div>

                                    </div>
                                </div>
                            </div>
                           <!-- Delete Modal -->
                            <div id="danger-header-modal{{$contactData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$contactData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$contactData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('contact.destroy',$contactData->id)}}" class="btn btn-danger">Delete</a>
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
