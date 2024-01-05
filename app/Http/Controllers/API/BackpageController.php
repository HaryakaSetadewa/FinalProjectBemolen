<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Backpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BackpageController extends Controller
{
    public function index()
    {
        $backpages = Backpage::all();
        return response()->json(['backpages' => $backpages], 200);
    }

    public function show(Backpage $backpage)
    {
        return response()->json(['backpage' => $backpage], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_bengkel' => 'required',
            'id_perusahaan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('images'), $imageName);
        }

        $backpage = new Backpage([
            'nama_bengkel' => $request->nama_bengkel,
            'id_perusahaan' => $request->id_perusahaan,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'foto' => $imageName ?? null,
        ]);
        $backpage->save();

        return response()->json(['message' => 'Bengkel created successfully'], 201);
    }

    public function update(Request $request, Backpage $backpage)
    {
    $validator = Validator::make($request->all(), [
        'nama_bengkel' => 'required',
        'id_perusahaan' => 'required',
        'deskripsi' => 'required',
        'kategori' => 'required',
        'lokasi' => 'required',
        'jam_buka' => 'required',
        'jam_tutup' => 'required',
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    if ($request->hasFile('foto')) {
        $imageName = time() . '.' . $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->move(public_path('images'), $imageName);

        if ($backpage->foto) {
            $imagePath = public_path('images/' . $backpage->foto);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $backpage->foto = $imageName;
    }

    $backpage->nama_bengkel = $request->nama_bengkel;
    $backpage->id_perusahaan = $request->id_perusahaan;
    $backpage->deskripsi = $request->deskripsi;
    $backpage->kategori = $request->kategori;
    $backpage->lokasi = $request->lokasi;
    $backpage->jam_buka = $request->jam_buka;
    $backpage->jam_tutup = $request->jam_tutup;
    $backpage->save();

    return response()->json(['message' => 'Bengkel updated successfully'], 200);
    }
    public function destroy(Backpage $backpage)
    {
        $imagePath = public_path('images/' . $backpage->foto);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $backpage->delete();

        return response()->json(['message' => 'Bengkel deleted successfully'], 200);
    }
}