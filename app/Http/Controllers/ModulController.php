<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;

class ModulController extends Controller
{
    public function create()
    {
        return view('modul.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nama_modul.*' => 'required|string',
            'requirement.*' => 'required|string',
        ]);

        // Membuat modul dengan nama
        $modul = Modul::create(['nama' => $request->nama]);

        // Menyimpan requirements jika ada
        foreach ($request->nama_modul as $key => $nama_modul) {
            $newModul = new Modul(['nama' => $nama_modul]);
            $modul->requirements()->save($newModul);
            $newModul->requirements()->create(['requirement' => $request->requirement[$key]]);
        }

        // Cetak data modul dan requirements
        dd($modul->load('requirements'));
    }

}

