<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Penimbangan;
use Illuminate\Http\Request;
use PDF;

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
    $balitas = Balita::all(); //mendapatkan data dari tabel balitas

    return view('pages.penimbangan.create', ['balitas' => $balitas]);
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
        'tinggi_badan' => 'required',
        'id_balita' => 'required',
        'berat_badan' => 'required',
        'tanggal' => 'required',
      ],
      [
        'tinggi_badan.required' => 'Tinngi badan wajib diisi',
        'berat_badan.required' => 'Berat badan wajib diisi',
        'id_balita.required' => 'Id Balita wajib diisi',
        'tanggal.required' => 'Id Balita wajib diisi',
      ]
    );
    $penimbangan = new Penimbangan;
    $penimbangan->id_balita = $request->get('id_penimbangan');
    $penimbangan->tinggi_badan = $request->get('tinggi_badan');
    $penimbangan->berat_badan = $request->get('berat_badan');
    $penimbangan->tanggal = $request->get('tanggal');


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
  public function show($id_penimbangan)
  {
    //menampilkan detail data dengan menemukan berdasarkan id_pemeriksaan
    $penimbangan = Penimbangan::with('balita')->where('id_penimbangan', $id_penimbangan)->first();
    return view('pages.penimbangan.show', ['penimbangan' => $penimbangan]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Penimbangan  $penimbangan
   * @return \Illuminate\Http\Response
   */
  public function edit($id_penimbangan)
  {
    $penimbangan = Penimbangan::with('balita')->where('id_penimbangan', $id_penimbangan)->first();
    $balitas = Balita::all(); //mendapatkan data dari balita
    return view('pages.penimbangan.edit', compact('penimbangan', 'balitas'));
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
    $request->validate(
      [
        'tinggi_badan' => 'required',
        'id_balita' => 'required',
        'berat_badan' => 'required',
        'tanggal' => 'required',
      ],
      [
        'tinggi_badan.required' => 'Tinngi badan wajib diisi',
        'berat_badan.required' => 'Berat badan wajib diisi',
        'id_balita.required' => 'Id Balita wajib diisi',
        'tanggal.required' => 'Tanggal wajib diisi',
      ]
    );
    $penimbangan = new Penimbangan;
    $penimbangan->id_balita = $request->get('id_penimbangan');
    $penimbangan->tinggi_badan = $request->get('tinggi_badan');
    $penimbangan->berat_badan = $request->get('berat_badan');
    $penimbangan->tanggal = $request->get('tanggal');

    $balitas = new Balita;
    $balitas->id_balita = $request->get('id_balita');

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $penimbangan->balita()->associate($balitas);
    $penimbangan->save();
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('penimbangan.index')
      ->with('msg-success', 'Data Berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Penimbangan  $penimbangan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Penimbangan $penimbangan)
  {
    $penimbangan->delete();
    return redirect()->route('penimbangan.index')
      ->with('msg-success', 'Data Berhasil Dihapus');
  }
  public function cetak_pdf()
  {
    $penimbangans = Penimbangan::all();
    $pdf = PDF::loadview('pages.penimbangan.penimbangan_pdf', ['penimbangans' => $penimbangans]);
    return $pdf->stream();
  }
}
