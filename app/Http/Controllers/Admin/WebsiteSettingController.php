<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class WebsiteSettingController extends Controller
{
    /**
     * Form pengaturan website
     */
    public function edit()
    {
        return view('admin.settings.website', [
            'siteName' => Setting::get('site_name'),
            'siteLogo' => Setting::get('site_logo'),
        ]);
    }

    /**
     * Simpan pengaturan website (logo + site name)
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'logo'      => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        // simpan site name
        Setting::updateOrCreate(
            ['key' => 'site_name'],
            ['value' => $request->site_name]
        );

        // simpan logo jika diupload
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');

            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $path]
            );
        }

        return back()->with('success', 'Pengaturan website berhasil diperbarui');
    }
}