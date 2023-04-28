<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.pemeriksaan.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $ibu_hamils = IbuHamil::all(); //mendapatkan data dari tabel ibu_hamilss
    return view('pages.pemeriksaan.create' , ['ibu_hamils' => $ibu_hamils]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //melakukan validasi data
    $request->validate([
      'tanggal' => 'required',
      'id_ibu_hamil' => 'required',
      'catatan' => 'required',
  ],
  [
      'tanggal.required' => 'Tanggal wajib diisi',
      'catatan.required' => 'Catatan wajib diisi',
      'id_ibu_hamil.required' => 'Nama Ibu Hamil wajib diisi',
  ]);
  $pemeriksaan = new Pemeriksaan;
  $pemeriksaan->id_pemeriksaan = $request->get('id_pemeriksaan');
  $pemeriksaan->tanggal = $request->get('tanggal');
  $pemeriksaan->catatan = $request->get('catatan');

  $ibu_hamils = new IbuHamil;
  $ibu_hamils->id_ibu_hamil = $request->get('id_ibu_hamil');

  //fungsi eloquent untuk menambah data dengan relasi belongsTo
  $pemeriksaan->ibu_hamil()->associate($ibu_hamils);
  $pemeriksaan->save();
  //jika data berhasil ditambahkan, akan kembali ke halaman utama
  return redirect()->route('pemeriksaan.index')
      ->with('msg-success', 'Data Berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pemeriksaan  $pemeriksaan
   * @return \Illuminate\Http\Response
   */
  public function show($id_pemeriksaan)
  {
      //menampilkan detail data dengan menemukan berdasarkan id_pemeriksaan
      $pemeriksaans = Pemeriksaan::with('ibu_hamils')->where('id_pemeriksaan', $id_pemeriksaan)->first();
      return view('pages.pemeriksaan.show', ['pemeriksaans' => $pemeriksaans]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pemeriksaan  $pemeriksaan
   * @return \Illuminate\Http\Response
   */
  public function edit($id_pemeriksaan)
  {
    //menampilkan detail data dengan menemukan berdasarkan id_pemeriksaan 
    //Pemriksaan untuk diedit
    $pemeriksaans = Pemeriksaan::with('ibu_hamils')->where('id_pemeriksaan', $id_pemeriksaan)->first();
    $ibu_hamils = IbuHamil::all(); //mendapatkan data dari ibu hamil
    return view('pages.pemeriksaan.edit', compact('pemeriksaans','ibu_hamils'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pemeriksaan  $pemeriksaan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id_pemeriksaan)
  {
    //melakukan validasi data
    $request->validate([
      'tanggal' => 'required',
      'id_ibu_hamil' => 'required',
      'catatan' => 'required',
  ],
  [
      'tanggal.required' => 'Tanggal wajib diisi',
      'catatan.required' => 'Catatan wajib diisi',
      'id_ibu_hamil.required' => 'Nama Ibu Hamil wajib diisi',
  ]);
  $pemeriksaan = Pemeriksaan::with('ibu_hamils')->where('id_pemeriksaan', $id_pemeriksaan)->first();
  $pemeriksaan->tanggal = $request->get('tanggal');
  $pemeriksaan->catatan = $request->get('catatan');

  $ibu_hamils = new IbuHamil;
  $ibu_hamils->id_ibu_hamil = $request->get('id_ibu_hamil');

  //fungsi eloquent untuk menambah data dengan relasi belongsTo
  $pemeriksaan->ibu_hamil()->associate($ibu_hamils);
  $pemeriksaan->save();
  //jika data berhasil ditambahkan, akan kembali ke halaman utama
  return redirect()->route('pemeriksaan.index')
      ->with('msg-success', 'Data Berhasil ditambahkan');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pemeriksaan  $pemeriksaan
   * @return \Illuminate\Http\Response
   */
  public function destroy($id_pemeriksaan)
  {
    //fungsi eloquent untuk menghapus data
    Pemeriksaan::find($id_pemeriksaan)->delete();
    return redirect()->route('pemeriksaan.index')
        -> with('msg-success', 'Data Berhasil Dihapus');
  }
}
