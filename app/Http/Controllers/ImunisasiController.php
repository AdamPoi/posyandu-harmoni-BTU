<?php

namespace App\Http\Controllers;
use App\Models\Balita;
use App\Models\Imunisasi;
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
    return view('pages.imunisasi.create' , ['balitas' => $balitas]);
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
      'id_balita' => 'required',
      'jenis_imunisasi' => 'required',
      'tanggal' => 'required',
      'deskripsi' => 'required',
  ],
  [
      'id_balita.required' => 'Nama Ibu Hamil wajib diisi',
      'jenis_imunisasi.required' => 'jenis imunisasi wajib diisi',
      'tanggal.required' => 'Tanggal wajib diisi',
      'deskripsi.required' => 'Catatan wajib diisi',
      
  ]);
  $imunisasi = new Imunisasi;
  $imunisasi->id_imunisasi = $request->get('id_imunisasi');
  $imunisasi->jenis_imunisasi = $request->get('jenis_imunisasi');
  $imunisasi->tanggal = $request->get('tanggal');
  $imunisasi->deskripsi = $request->get('deskripsi');

  $balitas = new Balita;
  $balitas->id_balita = $request->get('id_balita');

  //fungsi eloquent untuk menambah data dengan relasi belongsTo
  $imunisasi->balita()->associate($balitas);
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
      $imunisasis = Imunisasi::with('balita')->where('id_imunisasi', $id_imunisasi)->first();
      return view('pages.imunisasi.show', ['imunisasis' => $imunisasis]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Imunisasi  $imunisasi
   * @return \Illuminate\Http\Response
   */
  public function edit($id_imunisasi)
  {
     //menampilkan detail data dengan menemukan berdasarkan id_imunisasi 
    //Pemriksaan untuk diedit
    $imunisasis = Imunisasi::with('balita')->where('id_imunisasi', $id_imunisasi)->first();
    $balitas = Balita::all(); //mendapatkan data dari balita
    return view('pages.imunisasi.edit', compact('imunisasis','balitas'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Imunisasi  $imunisasi
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request,$id_imunisasi)
  {
    //melakukan validasi data
    $request->validate([
      'jenis_imunisasi' => 'required',
      'tanggal' => 'required',
      'id_balita' => 'required',
      'deskripsi' => 'required',
  ],
  [
    'jenis_imunisasi.required' => 'jenis imunisasi wajib diisi',  
    'tanggal.required' => 'Tanggal wajib diisi',
    'deskripsi.required' => 'Deskripsi wajib diisi',
    'id_balita.required' => 'Nama Balita wajib diisi',
  ]);
  $imunisasi = Imunisasi::with('balita')->where('id_imunisasi', $id_imunisasi)->first();
  $imunisasi->jenis_imunisasi = $request->get('jenis_imunisasi');
  $imunisasi->tanggal = $request->get('tanggal');
  $imunisasi->deskripsi = $request->get('deskripsi');

  $balitas = new Balita;
  $balitas->id_balita = $request->get('id_balita');

  //fungsi eloquent untuk menambah data dengan relasi belongsTo
  $imunisasi->balita()->associate($balitas);
  $imunisasi->save();
  //jika data berhasil ditambahkan, akan kembali ke halaman utama
  return redirect()->route('imunisasi.index')
      ->with('msg-success', 'Data Berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Imunisasi  $imunisasi
   * @return \Illuminate\Http\Response
   */
  public function destroy($imunisasi)
  {
    Imunisasi::find($id_imunisasi)->delete();
    return redirect()->route('imunisasi.index')-> with('success', 'Data Berhasil Dihapus');
  }
  public function cetak_pdf()
  {
    $imunisasi = Imunisasi::all();
    $pdf = PDF::loadview('pages.imunisasi.imunisasi_pdf',['imunisasi'=>$imunisasi]);
    return $pdf->stream();
  }
}
