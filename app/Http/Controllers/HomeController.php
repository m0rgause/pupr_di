<?php

namespace App\Http\Controllers;

use App\Models\Lantai;
use App\Models\Menu;
use App\Models\WebProfile;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function floor($id)
    {
        $data = [
            'setting' => WebProfile::first(),
            'menus' => Menu::where('lantai_id', $id)->get(),
            'floor' => Lantai::find($id)
        ];
        return view('layouts_home.app', $data);
    }
}
