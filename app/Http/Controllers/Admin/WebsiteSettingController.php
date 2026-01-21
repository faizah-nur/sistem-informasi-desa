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
            'siteName'        => Setting::get('site_name', ''),
            'contactAddress' => Setting::get('contact_address', ''),
            'contactPhone'   => Setting::get('contact_phone', ''),
            'contactEmail'   => Setting::get('contact_email', ''),
            'serviceHours'   => Setting::get('service_hours', ''),
            'googleMaps'     => Setting::get('google_maps', ''),
            'siteLogo'       => Setting::get('site_logo'),
        ]);
    }

    /**
     * Simpan pengaturan website
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name'        => 'required|string|max:255',
            'contact_address' => 'required|string|max:255',
            'contact_phone'   => 'required|string|max:50',
            'contact_email'   => 'required|email',
            'service_hours'   => 'required|string|max:100',
            'google_maps'     => 'nullable|string',
            'logo'            => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        // daftar setting text
        $settings = [
            'site_name'        => $validated['site_name'],
            'contact_address' => $validated['contact_address'],
            'contact_phone'   => $validated['contact_phone'],
            'contact_email'   => $validated['contact_email'],
            'service_hours'   => $validated['service_hours'],
            'google_maps'     => $validated['google_maps'] ?? '',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // simpan logo jika diupload
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');

            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $path]
            );
        }

        return redirect()
            ->route('admin.settings.website')
            ->with('success', 'Pengaturan website berhasil diperbarui');
    }
}