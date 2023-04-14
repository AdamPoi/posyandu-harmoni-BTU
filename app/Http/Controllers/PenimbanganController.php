<?php

namespace App\Http\Controllers;

use App\Models\Penimbangan;
use Illuminate\Http\Request;

class PenimbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
        $penimbangan = Penimbangan::with('Nim', 'like', "%$katakunci%")
            ->orwhere('Nama', 'like', "%$katakunci%")
            ->orwhere('kelas_id', 'like', "%$katakunci%")
            ->orwhere('Jurusan', 'like', "%$katakunci%")
            ->orwhere('No_Handphone', 'like', "%$katakunci%")
            ->orwhere('email', 'like', "%$katakunci%")
            ->orwhere('tgl_lahir', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $penimbangan = Penimbangan::with('balita')->get();
            $paginate = Penimbangan::orderBy('id_penimbangan', 'asc')->paginate(5);
    }
    return view('pages.penimbangan.index', ['penimbangan' => $penimbangan, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penimbangan  $penimbangan
     * @return \Illuminate\Http\Response
     */
    public function show(Penimbangan $penimbangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penimbangan  $penimbangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penimbangan $penimbangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penimbangan  $penimbangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penimbangan $penimbangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penimbangan  $penimbangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penimbangan $penimbangan)
    {
        //
    }
}
