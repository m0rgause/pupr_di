<?php

namespace App\Http\Controllers;

use App\Models\Lantai;
use App\Models\Menu;
use App\Models\WebProfile;
use App\Models\JadwalAsesmen;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function floor($id)
    {
        $asesmen = JadwalAsesmen::select('nama', 'asesor', 'peserta')
            ->join('ruang_asesmen', 'jadwal_asesmen.ruang_asesmen_id', '=', 'ruang_asesmen.id')
            ->paginate(5);
        $data = [
            'setting' => WebProfile::first(),
            'menus' => Menu::where('lantai_id', $id)->get(),
            'floor' => Lantai::find($id),
            'asesmen' => $asesmen
        ];
        return view('layouts_home/app', $data);
    }

    function getMenu()
    {
        $menu = Menu::where('menu_slug', request()->slug)->first();
        // return json
        return response()->json($menu);
    }
}
