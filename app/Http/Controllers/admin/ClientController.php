<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Toastr;
class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();
        return view('admin.pages.client.index', compact('client'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'logo' => 'required',
            ]);
            $file = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images/client'), $file);

            $client = new Client();
            $client->name = $request->name;
            $client->link = $request->link;
            $client->logo = $file;
            $client->save();
            Toastr::success('Client Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'name' => 'required',
            ]);
            $client = Client::find($id);
            $client->name = $request->name;
            $client->link = $request->link;
            $client->status = $request->status;

            if ($request->logo) {
                $file = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('images/client'), $file);
                $client->logo = $file;
            }
            $client->save();
            Toastr::success('Client Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $client = Client::find($id);
            $filePath = public_path('images/client/' . $client->logo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $client->delete();
            Toastr::success('Client Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
