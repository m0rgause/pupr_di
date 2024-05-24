<?php

namespace App\Http\Controllers;

use App\Models\Lantai;
use App\Models\Menu;
use App\Models\WebProfile;
use App\Models\JadwalAsesmen;
use App\Models\RuangAsesmen;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function floor($id)
    {
        $asesmen = JadwalAsesmen::select('nama', 'asesor', 'peserta')
            ->where('ruang_asesmen_id', $id)
            ->paginate(5);
        $data = [
            'setting' => WebProfile::first(),
            'menus' => Menu::where('lantai_id', $id)->get(),
            'floor' => Lantai::find($id),
            'asesmen' => $asesmen
        ];
        return view('layouts_home/app', $data);
    }

    function getMenu($id)
    {
        $menu = Menu::find($id);
        $data = [
            response()->json($menu)
        ];
        return view('layouts_home/konten', $data);
    }
}
