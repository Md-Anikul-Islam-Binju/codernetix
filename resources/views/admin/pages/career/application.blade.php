@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CoderNetix</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Application</a></li>
                        <li class="breadcrumb-item active">Application!</li>
                    </ol>
                </div>
                <h4 class="page-title">Application!</h4>
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
                        <th>Candidate Info</th>
                        <th>Join Type</th>
                        <th>Expected Salary</th>
                        <th>CV/Resume</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applyCandidates as $key=>$applyCandidatesData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$applyCandidatesData->name}}<br>
                                {{$applyCandidatesData->email}}<br>
                                {{$applyCandidatesData->phone}}<br>
                                {{$applyCandidatesData->address}}
                            </td>
                            <td>{{$applyCandidatesData->join_type}}</td>
                            <td>{{$applyCandidatesData->expected_salary}}</td>

                            <td>
                                @if($applyCandidatesData->cv_or_resume)
                                    <a href="{{asset('images/cv/'.$applyCandidatesData->cv_or_resume)}}" target="_blank">View CV/Resume</a>
                                @else
                                    N/A
                                @endif
                            </td>

                            <td>
                                {{-- GitHub --}}
                                @if($applyCandidatesData->github_link)
                                    <a href="{{ $applyCandidatesData->github_link }}" target="_blank" class="d-block">
                                        GitHub Profile
                                    </a>
                                @endif

                                {{-- LinkedIn --}}
                                @if($applyCandidatesData->linkedin_link)
                                    <a href="{{ $applyCandidatesData->linkedin_link }}" target="_blank" class="d-block">
                                        LinkedIn Profile
                                    </a>
                                @endif

                                {{-- Portfolio --}}
                                @if($applyCandidatesData->portfolio_link)
                                    <a href="{{ $applyCandidatesData->portfolio_link }}" target="_blank" class="d-block">
                                        Portfolio Website
                                    </a>
                                @endif

                                {{-- If none available --}}
                                @if(
                                    !$applyCandidatesData->github_link &&
                                    !$applyCandidatesData->linkedin_link &&
                                    !$applyCandidatesData->portfolio_link
                                )
                                    N/A
                                @endif
                            </td>

                            <td style="width: 100px;">
                                <div class="d-flex gap-1">
                                   <a href="{{route('application.destroy',$applyCandidatesData->id)}}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$applyCandidatesData->id}}">Delete</a>
                                </div>
                            </td>

                            <!-- Delete Modal -->
                            <div id="danger-header-modal{{$applyCandidatesData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$applyCandidatesData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$applyCandidatesData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('application.destroy',$applyCandidatesData->id)}}" class="btn btn-danger">Delete</a>
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
