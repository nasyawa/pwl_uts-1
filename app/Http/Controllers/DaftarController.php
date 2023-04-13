<?php

namespace App\Http\Controllers;

use App\Models\daftar;
use App\Models\dokter;
use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = daftar::join('pasien', 'daftar.id_pasien', '=', 'pasien.id_pasien')
            ->join('dokter', 'daftar.id_dokter', '=', 'dokter.id_dokter')
            ->join('users', 'daftar.id_user', '=', 'users.id')
            ->join('poli', 'dokter.id_poli', '=', 'poli.id_poli')
            ->select('daftar.*', 'dokter.nama as nama_dokter', 'pasien.*', 'pasien.nama as nama_pasien', 'dokter.*', 'users.*', 'poli.*')
            ->get();

        return view('pendaftaran.pendaftaran')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data2 = pasien::find($id);
        $data = dokter::join('poli', 'dokter.id_poli', 'poli.id_poli')
            ->select('dokter.*', 'poli.*')->get();
        return view('pendaftaran.form_pendaftaran')
            ->with('url_form', url('/pendaftaran'))
            ->with('datas', $data)
            ->with('pasien', $data2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = daftar::insert('daftar')->values([
            'id_pasien' => $request->daftar,
            'id_dokter' => $request->id_daftar,
            'id_user' => Auth::user()->id,
            'keluhan' => $request->keluhan
        ]);

        return redirect('daftar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit(daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, daftar $daftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(daftar $daftar)
    {
        //
    }
}
