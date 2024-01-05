<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use App\Models\Review;
use App\Models\Backpage;
use App\Models\Perusahaan;
use App\Models\Landingpage;
use App\Models\MapsBackpage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('components.landing-page');
    }

    public function signin()
    {
        return view ('sign.signin');
    }

    public function signup()
    {
        return view ('sign.signup');
    }


    public function maps()
    {
        $data = Backpage::all();
        $maps = MapsBackpage::all();
        return view('components.maps-page', compact('maps','data'));
    }

    public function bengkel()
    {
    
        $data = Backpage::all();
        return view('components.infobengkel-page', compact('data'));
    }

    public function detailbengkel($id)
    {
        
        
        $data = Backpage::find($id);

        
        $reviews = Review::where('id_bengkel', $id)->get();
        
        
        return view('components.detailbengkel-page', compact('data', 'reviews'));
    }


}