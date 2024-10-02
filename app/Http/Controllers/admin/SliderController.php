<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Toastr;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('admin.pages.slider.index', compact('slider'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required',
            ]);
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/slider'), $file);

            $slider = new Slider();
            $slider->title = $request->title;
            $slider->details = $request->details;
            $slider->link = $request->link;
            $slider->image = $file;
            $slider->save();
            Toastr::success('Slider Added Successfully', 'Success');
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
            $slider = Slider::find($id);
            $slider->title = $request->title;
            $slider->details = $request->details;
            $slider->link = $request->link;
            $slider->status = $request->status;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/slider'), $file);
                $slider->image = $file;
            }
            $slider->save();
            Toastr::success('Slider Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $slider = Slider::find($id);
            $filePath = public_path('images/slider/' . $slider->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $slider->delete();
            Toastr::success('Slider Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
