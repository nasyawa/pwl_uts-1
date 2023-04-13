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
            ->select(
                'daftar.*',
                'dokter.nama as nama_dokter',
                'pasien.*',
                'pasien.nama as nama_pasien',
                'users.nama as nama_perawat',
                'dokter.*',
                'users.*',
                'poli.*'
            )
            ->orderBy('daftar.id_daftar')->simplePaginate(3);

        return view('pendaftaran.pendaftaran')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pasien = pasien::find($id);
        $dokter = dokter::join('poli', 'dokter.id_poli', 'poli.id_poli')
            ->select('dokter.*', 'poli.*')->get();

        return view('pendaftaran.form_pendaftaran')
            ->with('url_form', url('/pendaftaran'))
            ->with('datas', $dokter)
            ->with('pasien', $pasien);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;

        $data = daftar::create([
            'id_pasien' => $request->input('id_pasien'),
            'id_dokter' => $request->input('id_dokter'),
            'keluhan' => $request->input('keluhan'),
            'id_user' => $user
        ]);

        return redirect('pendaftaran');
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
    public function edit($id)
    {
        $daftar = daftar::find($id);
        $pasien = pasien::find($daftar->id_pasien);
        $dokter = dokter::join('poli', 'dokter.id_poli', 'poli.id_poli')
            ->select('dokter.*', 'poli.*')->get();

        return view('pendaftaran.form_pendaftaran')
            ->with('datas', $dokter)
            ->with('pasien', $pasien)
            ->with('data', $daftar)
            ->with('url_form', url('/pasien/' . $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;

        $data = daftar::where('id_pendaftaran', '=', $id)->update([
            'id_pasien' => $request->input('id_pasien'),
            'id_dokter' => $request->input('id_dokter'),
            'keluhan' => $request->input('keluhan'),
            'id_user' => $user
        ]);

        return redirect('pendaftaran');
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
