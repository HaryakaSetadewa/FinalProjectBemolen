<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MapsBackpage;

class MapsBackpageController extends Controller
{
    public function index()
    {
        $mapsBackpages = MapsBackpage::all();
        return response()->json(['mapsBackpages' => $mapsBackpages], 200);
    }

    public function show(MapsBackpage $mapsBackpage)
    {
        return response()->json(['mapsBackpage' => $mapsBackpage], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_bengkel' => 'required',
            'koordinatX' => 'required',
            'koordinatY' => 'required',
        ]);

        $mapsBackpage = MapsBackpage::create($validatedData);

        return response()->json(['message' => 'Data bengkel berhasil ditambahkan!', 'mapsBackpage' => $mapsBackpage], 201);
    }

    public function update(Request $request, MapsBackpage $mapsBackpage)
    {
        $validatedData = $request->validate([
            'id_bengkel' => 'required',
            'koordinatX' => 'required',
            'koordinatY' => 'required',
        ]);

        $mapsBackpage->update($validatedData);

        return response()->json(['message' => 'Data bengkel berhasil diperbarui!', 'mapsBackpage' => $mapsBackpage], 200);
    }

    public function destroy(MapsBackpage $mapsBackpage)
    {
        $mapsBackpage->delete();

        return response()->json(['message' => 'Data bengkel berhasil dihapus!'], 200);
    }
}
