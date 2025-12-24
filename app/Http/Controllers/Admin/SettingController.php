<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function edit()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.edit-destinasi', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'bg_destinasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle background image upload
        if ($request->hasFile('bg_destinasi')) {
            $file = $request->file('bg_destinasi');
            $path = $file->store('images', 'public');
            SiteSetting::updateOrCreate(
                ['key' => 'bg_destinasi'],
                ['value' => $path]
            );
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan berhasil diperbarui');
    }
}
