<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PageReloadLog;
use App\Models\TrackedPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class ReloadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('reload-track-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $trackedPages = TrackedPage::where('is_active', true)->get();
        $logs = PageReloadLog::orderBy('reloaded_at', 'desc')->get();
        return view('admin.pages.reloadTrack.index', compact('trackedPages', 'logs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_url' => 'required|url'
        ]);

        PageReloadLog::create([
            'page_url' => $request->page_url,
            'reloaded_at' => now(),
        ]);

        return response()->json(['status' => 'ok']);
    }

    public function deleteByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);

        $date = $request->date;

        PageReloadLog::whereDate('reloaded_at', $date)->delete();

        return redirect()->back()->with('success', 'Logs deleted for ' . $date);
    }
}
