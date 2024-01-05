<?php

namespace App\Http\Controllers\API;



use App\Models\Landingpage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Perusahaan;

class BemolenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Landingpage::getLandingpage()->paginate(5);
        return response()->json($data);
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
        $validasi=$request->validate([
            'nama_bengkel'=>'required',
            'jenis'=>'required',
            'lokasi'=>'required',
            'foto'=>'required|file|mimes:png,jpg',
            'id_perusahaan'=>'required',
            'jambuka'=>'required',
        ]);
        try {
            $fileName = time().$request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('uploads/landingpages',$fileName);
            $validasi['foto']=$path;
            $response = Landingpage::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
                ]);
        }
    }

    function Perusahaan(){
        $data=Perusahaan::all();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $validasi=$request->validate([
            'nama_bengkel'=>'required',
            'jenis'=>'required',
            'lokasi'=>'required',
            'foto'=>'',
            'id_perusahaan'=>'required',
            'jambuka'=>'required',
        ]);
        try {
            if($request->file('foto')){
                $fileName = time().$request->file('foto')->getClientOriginalName();
                $path = $request->file('foto')->storeAs('uploads/landingpages',$fileName);
                $validasi['foto']=$path;
            }
            $response = Landingpage::find($id);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $landingpage=Landingpage::find($id);
            $landingpage->delete();
            return response()->json([
                'success'=>true,
                'message'=>'Success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
                ]);
        }
    }
}
