@extends('admin.app')
@section('admin_content')

    <div class="row mb-3">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">CoderNetix</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Reload Tracked</a></li>
                        <li class="breadcrumb-item active">Reload Tracked!</li>
                    </ol>
                </div>
                <h4 class="page-title">Reload Tracked Pages</h4>
            </div>
        </div>
    </div>

    {{-- Tracked pages buttons --}}
{{--    <div class="row mt-3">--}}
{{--        <div class="col-12">--}}
{{--            @foreach($trackedPages as $page)--}}
{{--                <div class="mb-2">--}}
{{--                    <span>{{ $page->page_url }}</span>--}}
{{--                    <button class="btn btn-primary reloadBtn" data-url="{{ $page->page_url }}">--}}
{{--                        <i class="ri-refresh-line"></i> Open / Reload--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="row mt-3">
        <div class="col-12">
            @foreach($trackedPages as $page)
                @php
                    $name = str_contains($page->page_url, 'fiverr') ? 'Fiverr' :
                            (str_contains($page->page_url, 'upwork') ? 'Upwork' : 'Page');
                @endphp

                <button class="btn btn-primary reloadBtn mb-2"
                        data-url="{{ $page->page_url }}">
                    <i class="ri-refresh-line"></i>
                    Open / Reload {{ $name }}
                </button>
            @endforeach
        </div>
    </div>






    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                <button type="button"
                        class="btn btn-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteLogsByDateModal">
                    Delete Logs
                </button>
            </div>
        </div>
    </div>


    <div id="deleteLogsByDateModal"
         class="modal fade"
         tabindex="-1"
         role="dialog"
         aria-labelledby="deleteLogsByDateLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="deleteLogsByDateLabel">
                        Delete Reload Logs
                    </h4>
                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>

                <form action="{{ route('reload.log.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="delete_date" class="form-label fw-bold">
                                Select Date
                            </label>
                            <input type="date"
                                   name="date"
                                   id="delete_date"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="alert alert-warning mb-0">
                            <strong>Warning:</strong>
                            All reload logs for the selected date will be permanently deleted.
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-light"
                                data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit"
                                class="btn btn-danger">
                            Yes, Delete Logs
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <hr>

    {{-- Reload logs table --}}
    <div class="row mt-3">
        <div class="col-12">
            <h5>Reload Logs</h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Page URL</th>
                    <th>Reloaded At (BDT)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->page_url }}</td>
                        <td>
                            Date : {{ \Carbon\Carbon::parse($log->reloaded_at)->format('d F Y') }}<br>
                            Time : {{ \Carbon\Carbon::parse($log->reloaded_at)->format('g:i A') }}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Open / Reload JS --}}
    <script>
        let openedTabs = {}; // store opened tab references

        document.querySelectorAll('.reloadBtn').forEach(btn => {
            btn.addEventListener('click', function () {
                const url = this.dataset.url;

                // Reload if already open, else open new
                if(openedTabs[url] && !openedTabs[url].closed){
                    openedTabs[url].location.reload();
                } else {
                    openedTabs[url] = window.open(url, '_blank');
                }

                // Log reload info
                fetch("{{ route('page.reload.log') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ page_url: url })
                });
            });
        });
    </script>

@endsection
