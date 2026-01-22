{{--@extends('admin.app')--}}

{{--@section('admin_content')--}}

{{--    <div class="row mb-3">--}}
{{--        <div class="col-12">--}}
{{--            <div class="page-title-box">--}}
{{--                <div class="page-title-right">--}}
{{--                    <ol class="breadcrumb m-0">--}}
{{--                        <li class="breadcrumb-item"><a href="javascript:void(0);">CoderNetix</a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="javascript:void(0);">Reload Tracked</a></li>--}}
{{--                        <li class="breadcrumb-item active">Reload Tracked!</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--                <h4 class="page-title">Reload Tracked Pages</h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row mt-3">--}}
{{--        <div class="col-12">--}}
{{--            @foreach($trackedPages as $page)--}}
{{--                <div class="mb-2">--}}
{{--                    <span>{{ $page->page_url }}</span>--}}
{{--                    <button class="btn btn-primary openBtn" data-url="{{ $page->page_url }}">--}}
{{--                        <i class="ri-refresh-line"></i> Open & Log--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <script>--}}
{{--        document.querySelectorAll('.openBtn').forEach(btn => {--}}
{{--            btn.addEventListener('click', function () {--}}
{{--                const url = this.dataset.url;--}}

{{--                // 1️⃣ Open the URL in a new tab--}}
{{--                window.open(url, '_blank');--}}

{{--                // 2️⃣ Store reload info in the database--}}
{{--                fetch("{{ route('page.reload.log') }}", {--}}
{{--                    method: "POST",--}}
{{--                    headers: {--}}
{{--                        "X-CSRF-TOKEN": "{{ csrf_token() }}",--}}
{{--                        "Content-Type": "application/json"--}}
{{--                    },--}}
{{--                    body: JSON.stringify({ page_url: url })--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}




{{--@endsection--}}


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
    <div class="row mt-3">
        <div class="col-12">
            @foreach($trackedPages as $page)
                <div class="mb-2">
                    <span>{{ $page->page_url }}</span>
                    <button class="btn btn-primary reloadBtn" data-url="{{ $page->page_url }}">
                        <i class="ri-refresh-line"></i> Open / Reload
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <hr>

    {{-- Delete logs by date --}}
    <div class="row mt-4">
        <div class="col-md-4">
            <form action="{{ route('reload.log.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete logs for selected date?')">
                @csrf
                @method('DELETE')
                <label for="delete_date">Delete Logs by Date:</label>
                <input type="date" name="date" id="delete_date" class="form-control mb-2" required>
                <button type="submit" class="btn btn-danger">Delete Logs</button>
            </form>
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
                        <td>{{ $log->reloaded_at->format('Y-m-d H:i:s') }}</td>
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
