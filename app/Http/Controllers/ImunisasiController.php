<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Imunisasi;
use App\Models\Vitamin;
use Illuminate\Http\Request;
use PDF;

class ImunisasiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.imunisasi.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $balitas = Balita::all(); //mendapatkan data dari tabel Balita
    $vitamins = Vitamin::all(); //mendapatkan data dari tabel Vitamin
    return view('pages.imunisasi.create', ['balitas' => $balitas, 'vitamins' => $vitamins]);
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
    $request->validate(
      [
        'id_balita' => 'required',
        'id_vitamin' => 'required',
        'tanggal' => 'required',
        'deskripsi' => 'required',
      ],
      [
        'id_balita.required' => 'Nama Ibu Hamil wajib diisi',
        'id_vitamin.required' => 'jenis imunisasi wajib diisi',
        'tanggal.required' => 'Tanggal wajib diisi',
        'deskripsi.required' => 'Catatan wajib diisi',

      ]
    );
    $imunisasi = new Imunisasi;
    $imunisasi->id_balita = $request->get('id_imunisasi');
    $imunisasi->id_vitamin = $request->get('id_imunisasi');
    $imunisasi->tanggal = $request->get('tanggal');
    $imunisasi->deskripsi = $request->get('deskripsi');

    $balitas = new Balita;
    $balitas->id_balita = $request->get('id_balita');
    $vitamins = new Vitamin;
    $vitamins->id_vitamin = $request->get('id_vitamin');
    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $imunisasi->balita()->associate($balitas);
    $imunisasi->vitamin()->associate($vitamins);
    $imunisasi->save();
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('imunisasi.index')
      ->with('msg-success', 'Data Berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Imunisasi  $imunisasi
   * @return \Illuminate\Http\Response
   */
  public function show($id_imunisasi)
  {
    //menampilkan detail data dengan menemukan berdasarkan id_imunisasi
    $imunisasi = Imunisasi::with('balita')->where('id_imunisasi', $id_imunisasi)->first();
    return view('pages.imunisasi.show', ['imunisasi' => $imunisasi]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Imunisasi  $imunisasi
   * @return \Illuminate\Http\Response
   */
  public function edit($id_imunisasi)
  {
    $imunisasi = Imunisasi::with('balita')->where('id_imunisasi', $id_imunisasi)->first();
    $balitas = Balita::all(); //mendapatkan data dari balita
    $vitamins = Vitamin::all(); //mendapatkan data dari vitamin
    return view('pages.imunisasi.edit', compact('imunisasi', 'balitas', 'vitamins'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Imunisasi  $imunisasi
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id_imunisasi)
  {
    //melakukan validasi data
    $request->validate(
      [
        'id_vitamin' => 'required',
        'tanggal' => 'required',
        'id_balita' => 'required',
        'deskripsi' => 'required',
      ],
      [
        'id_vitamin.required' => 'jenis imunisasi wajib diisi',
        'tanggal.required' => 'Tanggal wajib diisi',
        'deskripsi.required' => 'Deskripsi wajib diisi',
        'id_balita.required' => 'Nama Balita wajib diisi',
      ]
    );
    $imunisasi = Imunisasi::with('balita')->where('id_imunisasi', $id_imunisasi)->first();
    $imunisasi = Imunisasi::with('vitamin')->where('id_imunisasi', $id_imunisasi)->first();
    $imunisasi->tanggal = $request->get('tanggal');
    $imunisasi->deskripsi = $request->get('deskripsi');
    $balitas = new Balita;
    $balitas->id_balita = $request->get('id_balita');
    $vitamins = new Vitamin;
    $vitamins->id_vitamin = $request->get('id_vitamin');

    $imunisasi->balita()->associate($balitas);
    $imunisasi->vitamin()->associate($vitamins);
    $imunisasi->save();
    return redirect()->route('imunisasi.index')
    ->with('msg-success', 'Data Berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Imunisasi  $imunisasi
   * @return \Illuminate\Http\Response
   */
  public function destroy(Imunisasi $imunisasi)
  {
    $imunisasi->delete();
    return redirect()->route('imunisasi.index')
      ->with('msg-success', 'Data Berhasil Dihapus');
  }
  public function cetak_pdf()
  {
    $imunisasis = Imunisasi::all();
    $pdf = PDF::loadview('pages.imunisasi.imunisasi_pdf', ['imunisasis' => $imunisasis]);
    return $pdf->stream();
  }
}
