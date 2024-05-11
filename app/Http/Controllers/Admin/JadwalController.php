<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalAsesmen;
use App\Models\RuangAsesmen;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jadwal Asesmen',
            'ruangAsesmen' => RuangAsesmen::all(),
            'jadwal' => JadwalAsesmen::all()
        ];

        return view('admin.jadwal.list', $data);
    }

    public function store()
    {
        $data = request()->validate([
            'ruang_asesmen_id' => 'required',
            'asesor' => 'required',
            'peserta' => 'required',
        ]);

        try {
            JadwalAsesmen::create($data);
            return redirect()->route('admin.jadwal')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('admin.jadwal')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function update($id)
    {
        $data = request()->validate([
            'ruang_asesmen_id' => 'required',
            'asesor' => 'required',
            'peserta' => 'required',
        ]);

        try {
            JadwalAsesmen::findOrFail($id)->update($data);
            return redirect()->route('admin.jadwal')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('admin.jadwal')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            JadwalAsesmen::findOrFail($id)->delete();
            return redirect()->route('admin.jadwal')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.jadwal')->with('error', 'Data gagal dihapus');
        }
    }
}
