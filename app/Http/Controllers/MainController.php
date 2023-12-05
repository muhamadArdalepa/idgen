<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\Pelanggan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $pelanggan = Pelanggan::latest()->get();
        $latest = Pelanggan::latest()->first() ?? '00001';
        if ($latest != '00001') {
            $latest = $latest->id;
            $latest = (int) substr($latest, -4);
            $latest = $latest + 1;
            $latest = str_pad($latest, 5, '0', STR_PAD_LEFT);
        }
        $id = now()->format('ymd') . '01' . $latest;
        $password = strtolower(Str::random(6));
        return view('welcome', compact('pelanggan', 'id', 'password'));
    }

    public function store(Request $request)
    {
        $pelanggan = Pelanggan::find($request->id);
        if ($pelanggan) {
            $pelanggan->update([
                'nama' => $request->nama,
                'password' => $request->password,
            ]);
        } else {
            Pelanggan::create([
                'id' => $request->id,
                'nama' => $request->nama,
                'password' => $request->password,
            ]);
        }

        return back();
    }
    public function delete($id)
    {
        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) $pelanggan->delete();
        return back();
    }
}
