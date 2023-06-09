<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use Illuminate\Http\Request;
use PDF;

class IbuHamilController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.ibuhamil.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.ibuhamil.create');
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
      'nama' => 'required|string|max:255',
      'no_telepon' => 'required|numeric',
      'alamat' => 'required|string',
      'usia_kandungan' => 'required|numeric',
      'tanggal_hamil' => 'required',
      'tanggal_lahir' => 'required',
    ], [
      'nama.required' => 'Nama Ibu Hamil harus diisi',

    ]);
    IbuHamil::create($request->all());
    return redirect()->route('ibuhamil.index')
      ->with('msg-success', 'Berhasil menambahkan data Ibu Hamil ' . $request->nama);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\IbuHamil  $ibuhamil
   * @return \Illuminate\Http\Response
   */
  public function show(IbuHamil $ibuhamil)
  {
    return view('pages.ibuhamil.show', compact('ibuhamil'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\IbuHamil  $ibuhamil
   * @return \Illuminate\Http\Response
   */
  public function edit(IbuHamil $ibuhamil)
  {
    return view('pages.ibuhamil.edit', compact('ibuhamil'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\IbuHamil  $ibuhamil
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, IbuHamil $ibuhamil)
  {
    $request->validate([
      'nama' => 'required|string|max:255',
      'no_telepon' => 'required|numeric',
      'alamat' => 'required|string',
      'usia_kandungan' => 'required|numeric',
      'tanggal_hamil' => 'required',
      'tanggal_lahir' => 'required',
    ], [
      'nama.required' => 'Nama Ibu Hamil harus diisi',

    ]);
    $ibuhamil->update($request->all());
    return redirect()->route('ibuhamil.index')
      ->with('msg-success', 'Berhasil mengubah data Ibu Hamil ' . $ibuhamil->nama);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\IbuHamil  $ibuhamil
   * @return \Illuminate\Http\Response
   */
  public function destroy(IbuHamil $ibuhamil)
  {
    $ibuhamil->delete();
    return redirect()->route('ibuhamil.index')->with('msg-success', 'Berhasil menghapus data Ibu Hamil ' . $ibuhamil->nama);
  }

  public function cetak_pdf()
  {
    $ibuhamils = IbuHamil::all();
    $pdf = PDF::loadview('pages.ibuhamil.ibuhamil_pdf', ['ibuhamils' => $ibuhamils]);
    return $pdf->stream();
  }
}
