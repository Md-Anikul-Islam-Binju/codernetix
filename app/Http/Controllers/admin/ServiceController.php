<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Toastr;
class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::all();
        return view('admin.pages.service.index', compact('service'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required',
            ]);
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/service'), $file);

            $service = new Service();
            $service->title = $request->title;
            $service->details = $request->details;
            $service->image = $file;
            $service->save();
            Toastr::success('Service Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'title' => 'required',
            ]);
            $service = Service::find($id);
            $service->title = $request->title;
            $service->details = $request->details;
            $service->status = $request->status;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/service'), $file);
                $service->image = $file;
            }
            $service->save();
            Toastr::success('Service Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $service = Service::find($id);
            $filePath = public_path('images/service/' . $service->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $service->delete();
            Toastr::success('Service Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
