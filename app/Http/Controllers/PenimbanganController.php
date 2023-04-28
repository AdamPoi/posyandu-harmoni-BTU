<?php

namespace App\Http\Controllers;
use App\Models\Balita;
use App\Models\Penimbangan;
use Illuminate\Http\Request;

class PenimbanganController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.penimbangan.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $balitas = Balita::all(); //mendapatkan data dari tabel ibu_hamilss
    return view('pages.penimbangan.create' , ['balitas' => $balitas]);
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
      'tinggi_badan' => 'required',
      'id_balita' => 'required',
      'berat_badan' => 'required',
  ],
  [
      'tinggi_badan.required' => 'Tinngi badan wajib diisi',
      'berat_badan.required' => 'Berat badan wajib diisi',
      'id_balita.required' => 'Id Balita wajib diisi',
  ]);
  $penimbangan = new Penimbangan;
  $penimbangan->id_balita = $request->get('id_penimbangan');
  $penimbangan->tinggi_badan = $request->get('tinggi_badan');
  $penimbangan->berat_badan = $request->get('berat_badan');

  $balitas = new Balita;
  $balitas->id_balita = $request->get('id_balita');

  //fungsi eloquent untuk menambah data dengan relasi belongsTo
  $penimbangan->balita()->associate($balitas);
  $penimbangan->save();
  //jika data berhasil ditambahkan, akan kembali ke halaman utama
  return redirect()->route('penimbangan.index')
      ->with('success', 'Data Berhasil ditambahkan');
  }
  

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Penimbangan  $penimbangan
   * @return \Illuminate\Http\Response
   */
  public function show(Penimbangan $penimbangan)
  {
    //menampilkan detail data dengan menemukan berdasarkan id_pemeriksaan
    $penimbangans = Penimbangan::with('balitas')->where('id_penimbangan', $id_penimbangan)->first();
    return view('pages.penimbangan.show', ['penimbangans' => $penimbangans]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Penimbangan  $penimbangan
   * @return \Illuminate\Http\Response
   */
  public function edit(Penimbangan $penimbangan)
  {
    $penimbangans = Penimbangan::with('balitas')->where('id_penimbangan', $id_penimbangan)->first();
    $balitas = Balita::all(); //mendapatkan data dari ibu hamil
    return view('pages.penimbangan.edit', compact('penimbangans','balitas'));
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
    //melakukan validasi data
    $request->validate([
      'tinggi_badan' => 'required',
      'id_balita' => 'required',
      'berat_badan' => 'required',
  ],
  [
      'tinggi_badan.required' => 'Tinngi badan wajib diisi',
      'berat_badan.required' => 'Berat badan wajib diisi',
      'id_balita.required' => 'Id Balita wajib diisi',
  ]);
  $penimbangan = new Penimbangan;
  $penimbangan->id_balita = $request->get('id_penimbangan');
  $penimbangan->tinggi_badan = $request->get('tinggi_badan');
  $penimbangan->berat_badan = $request->get('berat_badan');

  $balitas = new Balita;
  $balitas->id_balita = $request->get('id_balita');

  //fungsi eloquent untuk menambah data dengan relasi belongsTo
  $penimbangan->balita()->associate($balitas);
  $penimbangan->save();
  //jika data berhasil ditambahkan, akan kembali ke halaman utama
  return redirect()->route('penimbangan.index')
      ->with('success', 'Data Berhasil ditambahkan');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Penimbangan  $penimbangan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Penimbangan $penimbangan)
  {
    Penimbangan::find($id_penimbangan)->delete();
    return redirect()->route('penimbangan.index')
        -> with('success', 'Data Berhasil Dihapus');
  }
}
