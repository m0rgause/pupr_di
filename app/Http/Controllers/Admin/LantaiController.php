<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lantai;
use Illuminate\Http\Request;

class LantaiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Lantai',
            'lantai' => Lantai::all(),
        ];

        return view('admin.lantai.list', $data);
    }

    public function store()
    {
        $data = request()->validate([
            'lantai' => 'required',
        ]);

        Lantai::create($data);

        return redirect()->route('admin.lantai')->with('success', 'Data berhasil ditambahkan');
    }

    public function update($id)
    {
        $data = request()->validate([
            'lantai' => 'required',
        ]);

        Lantai::find($id)->update($data);

        return redirect()->route('admin.lantai')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        try {
            Lantai::find($id)->delete();
            return redirect()->route('admin.lantai')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.lantai')->with('error', 'Data gagal dihapus karena masih terdapat data yang terkait!');
        }
    }
}
