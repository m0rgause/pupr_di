<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebProfile;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Setting',
            'setting' => WebProfile::first()
        ];

        return view('admin.setting', $data);
    }

    public function update(Request $request)
    {

        $data = [
            'title' => $request->title,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'whatsapp' => $request->whatsapp,
            'twitter' => $request->twitter,
            'web' => $request->web,
            'teks' => $request->teks,
        ];

        $setting = WebProfile::first();

        // logo upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads', $filename);
            $data['logo'] = $filename;
        }

        // banner upload
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads', $filename);
            $data['banner'] = $filename;
        }

        // maskot upload
        if ($request->hasFile('maskot')) {
            $file = $request->file('maskot');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads', $filename);
            $data['maskot'] = $filename;
        }

        $setting->update($data);

        return redirect(route('admin.setting'))->with('success', 'Data berhasil diubah');
    }
}
