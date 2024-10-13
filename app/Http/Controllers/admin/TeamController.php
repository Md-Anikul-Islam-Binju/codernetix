<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Toastr;
class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();
        return view('admin.pages.team.index', compact('team'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'image' => 'required',
            ]);
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/team'), $file);

            $team = new Team();
            $team->name = $request->name;
            $team->email = $request->email;
            $team->phone = $request->phone;
            $team->designation = $request->designation;
            $team->facebook = $request->facebook;
            $team->linkedin = $request->linkedin;
            $team->image = $file;
            $team->save();
            Toastr::success('Team Added Successfully', 'Success');
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
                'name' => 'required',
            ]);
            $team = Team::find($id);
            $team->name = $request->name;
            $team->email = $request->email;
            $team->phone = $request->phone;
            $team->designation = $request->designation;
            $team->facebook = $request->facebook;
            $team->linkedin = $request->linkedin;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/team'), $file);
                $team->image = $file;
            }
            $team->save();
            Toastr::success('Team Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $team = Team::find($id);
            $filePath = public_path('images/team/' . $team->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $team->delete();
            Toastr::success('Team Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
