<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteSettingController extends Controller
{
    public function index()
    {
        $siteSettings = SiteSetting::where('id', 1)->first();
        return view('admin.pages.siteSetting.index', compact('siteSettings'));
    }

    public function createOrUpdate(Request $request, $id = null)
    {
        // Validation rules

        $rules = [
            'name' => 'nullable',
            'title' => 'nullable',
            'meta_description' => 'nullable',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
            'site_preview_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'short_description' => 'nullable',
            'site_link' => 'nullable',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the setting with the provided ID exists
        if ($id) {
            $setting = SiteSetting::findOrFail($id);
            $setting->update($request->except(['favicon', 'logo', 'site_preview_image'])); // Exclude image fields from update
        } else {
            $setting = new SiteSetting($request->except(['favicon', 'logo', 'site_preview_image'])); // Exclude image fields from creation
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            $faviconName = time().'.'.$request->file('favicon')->extension();
            $request->file('favicon')->move(public_path('images/favicons'), $faviconName);
            $setting->favicon = 'images/favicons/'.$faviconName;
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoName = time().'.'.$request->file('logo')->extension();
            $request->file('logo')->move(public_path('images/logos'), $logoName);
            $setting->logo = 'images/logos/'.$logoName;
        }
        // Handle logo upload
        if ($request->hasFile('site_preview_image')) {
            $previewName = time().'.'.$request->file('site_preview_image')->extension();
            $request->file('site_preview_image')->move(public_path('images/site_preview_image'), $previewName);
            $setting->site_preview_image = 'images/site_preview_image/'.$previewName;
        }
        $setting->save();
        $message = $id ? 'Site settings updated successfully!' : 'Site settings created successfully!';
        return redirect()->back()->with('success', $message);
    }
}
