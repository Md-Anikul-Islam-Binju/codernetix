<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class GalleryImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('gallery-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.pages.gallery.index', compact('gallery'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required',
            ]);
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/gallery'), $file);

            $gallery = new Gallery();
            $gallery->title = $request->title;
            $gallery->image = $file;
            $gallery->save();
            Toastr::success('Gallery Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'title' => 'required',
            ]);
            $gallery = Gallery::find($id);
            $gallery->title = $request->title;
            $gallery->status = $request->status;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/gallery'), $file);
                $gallery->image = $file;
            }
            $gallery->save();
            Toastr::success('Gallery Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $gallery = Gallery::find($id);
            $filePath = public_path('images/gallery/' . $gallery->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $gallery->delete();
            Toastr::success('Gallery Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
