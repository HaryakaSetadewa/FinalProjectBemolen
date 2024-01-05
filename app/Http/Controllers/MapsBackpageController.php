<?php

namespace App\Http\Controllers;

use App\Models\Backpage;
use App\Models\MapsBackpage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MapsBackpageController extends Controller
{
    public function index()
    {
        $mapsBackpages = MapsBackpage::paginate(10);
        return view('maps_backpage.index', compact('mapsBackpages'));
    }

    public function create()
    {
        $backpages = Backpage::doesntHave('mapsBackpage')->get();
        return view('maps_backpage.create', compact('backpages'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_bengkel' => 'required',
            'koordinatX' => 'required',
            'koordinatY' => 'required',
        ]);

        MapsBackpage::create($validatedData);

        return redirect()->route('maps_backpage.index')
            ->with('success', 'Data bengkel berhasil ditambahkan!');
    }

    public function show(MapsBackpage $mapsBackpage)
    {
        return view('maps_backpage.show', compact('mapsBackpage'));
    }

    public function edit(MapsBackpage $mapsBackpage)
    {
        return view('maps_backpage.edit', compact('mapsBackpage'));
    }

    public function update(Request $request, MapsBackpage $mapsBackpage)
    {
        $validatedData = $request->validate([

            'koordinatX' => 'required',
            'koordinatY' => 'required',
        ]);
        $mapsBackpage->update($validatedData);

        return redirect()->route('maps_backpage.index')
            ->with('success', 'Data bengkel berhasil diperbarui!');
    }

    public function destroy(MapsBackpage $mapsBackpage)
    {
        $mapsBackpage->delete();

        return redirect()->route('maps_backpage.index')
            ->with('success', 'Data bengkel berhasil dihapus!');
    }
}