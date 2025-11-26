<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yoeunes\Toastr\Facades\Toastr;

class ContactPageController extends Controller
{
    public function contact()
    {
        $siteSetting = SiteSetting::first();
        return view('frontend.pages.contact.contact',compact('siteSetting'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',
                'g-recaptcha-response' => 'required'
            ]);


            //Verify Google reCAPTCHA
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response'),
            ]);
            $recaptcha = $response->json();
            if (!($recaptcha['success'] ?? false)) {
                return back()->withErrors(['captcha' => 'reCAPTCHA verification failed, please try again.']);
            }

            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            Toastr::success('Contact Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
