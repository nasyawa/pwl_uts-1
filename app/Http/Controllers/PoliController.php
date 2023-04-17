<?php

namespace App\Http\Controllers;

use App\Models\poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('poli')->orderBy('id_poli')->simplePaginate(5);
        return view('poli.poli')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poli.form_poli')->with('url_form', url('/poli'));
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
            'poli' => 'required|string|max:100, unique:poli,poli',
        ]);

        $data = poli::create($request->except(['_token']));
        return redirect('poli')->with('success', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = poli::find($id);
        return view('poli.form_poli')
            ->with('url_form', url('/poli/' . $id))
            ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
        ]);

        $data = poli::where('id_poli', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('poli')->with('message', 'berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        poli::where('id','=',$id)->delete();
        return redirect('poli')
        ->with('success','Berhasil Dihapus');
    }
}
