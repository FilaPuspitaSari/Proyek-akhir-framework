<?php

namespace App\Http\Controllers;

use App\Models\Reseller;
use Illuminate\Http\Request;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $resellers = Reseller::latest()->paginate(5);
    
        return view('resellers.index',compact('resellers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resellers.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'umur' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);
  
        Reseller::create($request->all());
     
        return redirect()->route('resellers.index')
                        ->with('success','Data Berhasil Ditambahkan.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function edit(Reseller $reseller)
    {
        return view('resellers.edit', compact('reseller'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reseller $reseller)
{
    $request->validate([
        'name' => 'required',
        'umur' => 'required',
        'telp' => 'required',
        'alamat' => 'required', 
    ]);

    $reseller->update($request->all());

    return redirect()->route('resellers.index')
                    ->with('success', 'Data Berhasil Diubah');
}
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reseller $reseller)
    {
        $reseller->delete();
     
        return redirect()->route('resellers.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}