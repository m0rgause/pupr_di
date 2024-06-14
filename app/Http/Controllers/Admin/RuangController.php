<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lantai;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RuangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Ruang',
            'lantaiList' => Lantai::all(),
            'ruang' => Menu::all(),
        ];

        return view('admin.ruang.list', $data);
    }

    public function store()
    {
        $data = request()->validate([
            'lantai_id' => 'required',
            'menu' => 'required',
            'menu_slug' => 'nullable',
            'video' => 'required|mimes:mp4',
            'title_desc' => 'nullable',
            'body_desc' => 'nullable',
        ]);

        $data['is_desc'] = $data['title_desc'] && $data['body_desc'] ? true : false;

        $data['menu_slug'] = Str::slug($data['menu']);

        //store to public/storage/videos
        $data['video'] = request('video')->store('videos', 'public/storage');

        $data['body_desc'] = nl2br($data['body_desc']);

        Menu::create($data);

        return redirect()->route('admin.ruang')->with('success', 'Data berhasil ditambahkan');
    }

    public function update($id)
    {
        $data = request()->validate([
            'video' => 'nullable|mimes:mp4',
        ]);

        $menu = Menu::findOrFail($id);

        if (request()->hasFile('video')) {
            // delete old video file
            Storage::delete($menu->video);
            //store to public/storage/videos
            $data['video'] = request('video')->store('videos', 'public');
        }
        $menu->update($data);

        return redirect()->route('admin.ruang')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $menu->delete();
            // delete video file
            Storage::delete($menu->video);
            return redirect()->route('admin.ruang')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.ruang')->with('error', 'Data gagal dihapus');
        }
    }
}
