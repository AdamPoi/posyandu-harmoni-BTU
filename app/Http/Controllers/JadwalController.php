<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use PDF;

class JadwalController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.jadwal.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.jadwal.create');
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
      'kegiatan' => 'required|string|max:255',
      'tanggal' => 'required|date',
      'deskripsi' => 'required|string',

    ], [
      'kegiatan.required' => 'Kegiatan harus diisi',
      'tanggal.required' => 'Tanggal harus diisi',
      'deskripsi.required' => 'Deskripsi harus diisi',

    ]);
    Jadwal::create($request->all());
    return redirect()->route('jadwal.index')
      ->with('msg-success', 'Berhasil menambahkan data Jadwal ');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function show(Jadwal $jadwal)
  {
    return view('pages.jadwal.show', compact('jadwal'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function edit(Jadwal $jadwal)
  {
    return view('pages.jadwal.edit', compact('jadwal'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Jadwal $jadwal)
  {
    $request->validate([
      'kegiatan' => 'required|string|max:255',
      'tanggal' => 'required|date',
      'deskripsi' => 'required|string',

    ], [
      'kegiatan.required' => 'Kegiatan harus diisi',
      'tanggal.required' => 'Tanggal harus diisi',
      'deskripsi.required' => 'Deskripsi harus diisi',

    ]);
    $jadwal->update($request->all());
    return redirect()->route('jadwal.index')
      ->with('msg-success', 'Berhasil mengubah data Jadwal ');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function destroy(Jadwal $jadwal)
  {
    $jadwal->delete();
    return redirect()->route('jadwal.index')->with('msg-success', 'Berhasil menghapus data Jadwal');
  }
  public function cetak_pdf()
  {
    $jadwals = Jadwal::all();
    $pdf = PDF::loadview('pages.jadwal.jadwal_pdf', ['jadwals' => $jadwals]);
    return $pdf->stream();
  }
}
