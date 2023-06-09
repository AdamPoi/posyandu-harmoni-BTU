<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\IbuHamil;
use Illuminate\Http\Request;
use PDF;

class BalitaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.balita.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $ibu_hamils = IbuHamil::all(); //mendapatkan data dari tabel ibu_hamilss
    return view('pages.balita.create', ['ibu_hamils' => $ibu_hamils]);
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
        'nama' => 'required',
        'nama_ayah' => 'required',
        'ibu_hamil' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
      ],
      [
        'nama.required' => 'Nama wajib diisi',
        'nama_ayah.required' => 'Nama Ayah wajib diisi',
        'ibu_hamil.required' => 'Nama Ibu wajib diisi',
        'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
        'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi',
      ]
    );
    $balita = new Balita();
    $balita->id_balita = $request->get('id_balita');
    $balita->nama = $request->get('nama');
    $balita->nama_ayah = $request->get('nama_ayah');
    $balita->nama_ibu = explode('-', $request->get('ibu_hamil'))[1];
    $balita->tanggal_lahir = $request->get('tanggal_lahir');
    $balita->jenis_kelamin = $request->get('jenis_kelamin');

    $ibu_hamils = new IbuHamil;
    $ibu_hamils->id_ibu_hamil = explode('-', $request->get('ibu_hamil'))[0];

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $balita->ibu_hamil()->associate($ibu_hamils);
    $balita->save();
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('balita.index')
      ->with('success', 'Data Berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function show(Balita $balita)
  {
    $balita = $balita->load('ibu_hamil');
    return view('pages.balita.show', compact('balita'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function edit(Balita $balita)
  {
    $balita = $balita->load('ibu_hamil');
    return view('pages.balita.show', compact('balita'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Balita $balita)
  {
    //   //melakukan validasi data
    //   $request->validate([
    //     'tanggal' => 'required',
    //     'id_ibu_hamil' => 'required',
    //     'catatan' => 'required',
    // ],
    // [
    //     'tanggal.required' => 'Tanggal wajib diisi',
    //     'catatan.required' => 'Catatan wajib diisi',
    //     'id_ibu_hamil.required' => 'Nama Ibu Hamil wajib diisi',
    // ]);
    // $pemeriksaan = Pemeriksaan::with('ibu_hamils')->where('id_pemeriksaan', $id_pemeriksaan)->first();
    // $pemeriksaan->tanggal = $request->get('tanggal');
    // $pemeriksaan->catatan = $request->get('catatan');

    // $ibu_hamils = new IbuHamil;
    // $ibu_hamils->id_ibu_hamil = $request->get('id_ibu_hamil');

    // //fungsi eloquent untuk menambah data dengan relasi belongsTo
    // $pemeriksaan->ibu_hamil()->associate($ibu_hamils);
    // $pemeriksaan->save();
    // //jika data berhasil ditambahkan, akan kembali ke halaman utama
    // return redirect()->route('pemeriksaan.index')
    //     ->with('success', 'Data Berhasil ditambahkan');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function destroy(Balita $balita)
  {
    //fungsi eloquent untuk menghapus data
    $balita->delete();
    return redirect()->route('balita.index')
      ->with('msg-success', 'Data Berhasil Dihapus');
  }

  public function cetak_pdf()
  {
    $balitass = Balita::all();
    $pdf = PDF::loadview('pages.balitas.balitas_pdf', ['balitass' => $balitass]);
    return $pdf->stream();
  }
}
