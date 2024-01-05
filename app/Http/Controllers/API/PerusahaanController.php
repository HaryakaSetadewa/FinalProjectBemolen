<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaan;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::all();
        return response()->json(['perusahaans' => $perusahaans], 200);
    }

    public function show(Perusahaan $perusahaan)
    {
        return response()->json(['perusahaan' => $perusahaan], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required',
            'nama_kontak' => 'required',
            'email_perusahaan' => 'required|email',
            'no_telp' => 'required',
        ]);

        $perusahaan = Perusahaan::create($validatedData);

        return response()->json(['message' => 'Perusahaan berhasil ditambahkan!', 'perusahaan' => $perusahaan], 201);
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required',
            'nama_kontak' => 'required',
            'email_perusahaan' => 'required|email',
            'no_telp' => 'required',
        ]);

        $perusahaan->update($validatedData);

        return response()->json(['message' => 'Perusahaan berhasil diperbarui!', 'perusahaan' => $perusahaan], 200);
    }

    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();

        return response()->json(['message' => 'Perusahaan berhasil dihapus!'], 200);
    }
}

