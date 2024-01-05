<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Carbon;
class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::paginate(5);
        return view('perusahaan.index', compact('perusahaans'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required',
            'nama_kontak' => 'required',
            'email_perusahaan' => 'required|email',
            'no_telp' => 'required',
        ]);

        Perusahaan::create($validatedData);

        return redirect()->route('perusahaans.index')
            ->with('success', 'Perusahaan berhasil ditambahkan!');
    }

    public function show(Perusahaan $perusahaan)
    {
        return view('perusahaan.show', compact('perusahaan'));
    }

    public function edit(Perusahaan $perusahaan)
    {
        return view('perusahaan.edit', compact('perusahaan'));
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

        return redirect()->route('perusahaans.index')
            ->with('success', 'Perusahaan berhasil diperbarui!');
    }

    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();

        return redirect()->route('perusahaans.index')
            ->with('success', 'Perusahaan berhasil dihapus!');
    }
}
