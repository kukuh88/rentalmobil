<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobil = Master::all();
        return view('mobil.index', compact('mobil'));
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
        $attributes = $request->validate([
            'merek_mobil' => 'required|max:255',
            'model_mobil' => 'required|max:255',
            'plat_mobil'  => 'required|max:255',
            'stock_mobil' => 'required|max:255',
            'tarif_sewa'  => 'required|max:255',
            'jenis_mobil' => 'required|max:255',
        ]);

        Master::create($attributes);

        session()->put('sukses', 'Data has been saved successfully!');
        return redirect()->route('mobil.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Master $master, $id)
    {
        $master = Master::find($id);

        return view('mobil.edit', compact('master'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $master = Master::find($id);
        $master->update($request->all());
        session()->put('sukses', 'Data has been update successfully!!');

        return redirect()->route('mobil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Master $master, $id)
    {
        $master = Master::find($id);
        $master->delete();
        session()->put('success', 'Data has been deleted successfully!!');

        return redirect()->route('master.index');
    }

    public function alldata (){
        $master = Master::all();
    }

    public function proses(Request $request){
        $attributes = $request->validate([
            'merek_mobil',
            'model_mobil',
            'plat_mobil',
            'stock_mobil',
            'tarif_sewa',
            'jenis_mobil',
        ]);

        Master::create($attributes);

        session()->put('sukses', 'Data has been saved successfully!');
        return redirect()->route('mobil.index');
    }
}
