<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::paginate(10); 
        return view('review.index', compact('reviews')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data ulasan
        $validatedData = $request->validate([
            'id_bengkel' => 'required',
            'review' => 'required',
        ]);
    
        // Mendapatkan nama pengguna yang sedang login
        $validatedData['nama_user'] = auth()->check() ? auth()->user()->name : 'Anonymous';
    
        // Simpan ulasan ke dalam database
        Review::create($validatedData);
    
        // Redirect kembali ke halaman sebelumnya atau ke halaman tertentu
        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id); // Temukan review berdasarkan ID
    
        $review->delete(); // Hapus review
    
        return redirect()->route('reviews.index')->with('success', 'Review berhasil dihapus');
    }
    
    
}
