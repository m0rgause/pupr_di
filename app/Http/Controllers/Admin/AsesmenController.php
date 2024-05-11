<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RuangAsesmen;
use Illuminate\Http\Request;

class AsesmenController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Asesmen',
            'ruangAsesmen' => RuangAsesmen::all()
        ];

        return view('admin.asesmen.list', $data);
    }

    public function store()
    {
        $data = request()->validate([
            'nama' => 'required',
        ]);

        RuangAsesmen::create($data);

        return redirect()->route('admin.asesmen')->with('success', 'Data berhasil ditambahkan');
    }

    public function update($id)
    {
        $data = request()->validate([
            'nama' => 'required',
        ]);

        try {
            RuangAsesmen::findOrFail($id)->update($data);
            return redirect()->route('admin.asesmen')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('admin.asesmen')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            RuangAsesmen::findOrFail($id)->delete();
            return redirect()->route('admin.asesmen')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.asesmen')->with('error', 'Data gagal dihapus');
        }
    }
}
