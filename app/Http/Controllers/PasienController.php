<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pasien')->orderBy('id_pasien')->simplePaginate(5);
        return view('pasien.pasien')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.form_pasien')->with('url_form', url('pasien'));
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
            'rm' => 'required|string|max:10, unique:pasien,rm',
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'jk' => 'required|string',
        ]);

        $data = pasien::create($request->except(['_token']));
        return redirect('pasien')->with('success', 'Hobi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(pasien $pasien)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pasien::find($id);
        return view('pasien.form_pasien')
            ->with('url_form', url('/pasien/' . $id))
            ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rm' => 'required|string|max:10, unique:pasien,rm,' . $request->rm . ',rm',
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'jk' => 'required|string',
        ]);

        $data = pasien::where('id_pasien', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('pasien')->with('message', 'berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = pasien::where('id_pasien', '=', $id)->delete();

        return redirect('pasien')->with('message', 'Data Berhasil Dihapus');
    }
}
