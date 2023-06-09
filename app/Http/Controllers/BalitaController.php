<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\IbuHamil;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Carbon;

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
        'nama_ibu' => 'required',
        'usia' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
      ],
      [
        'nama.required' => 'Nama wajib diisi',
        'nama_ayah.required' => 'Nama Ayah wajib diisi',
        'nama_ibu.required' => 'Nama Ibu Hamil wajib diisi',
        'usia.required' => 'Usia wajib diisi',
        'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
        'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi',
      ]
    );
    $balita = new Balita();
    $balita->nama = $request->get('nama');
    $balita->nama_ayah = $request->get('nama_ayah');
    $balita->nama_ibu = $request->get('nama_ibu');
    $balita->usia = $request->get('usia');
    $balita->tanggal_lahir = $request->get('tanggal_lahir');
    $balita->jenis_kelamin = $request->get('jenis_kelamin');

    $balita->save();
    return redirect()->route('balita.index')
      ->with('msg-success', 'Data Berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function show(Balita $balita)
  {
    // $balita = $balita->load('balita');
    return view('pages.balita.show', compact('balita'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function edit($id_balita)
  {
    //menampilkan detail data dengan menemukan berdasarkan id_balita 
    //Pemriksaan untuk diedit
    $balita = Balita::find($id_balita);
    return view('pages.balita.edit', compact('balita'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id_balita)
  {
    //melakukan validasi data
    $request->validate(
      [
        'nama' => 'required',
        'nama_ayah' => 'required',
        'nama_ibu' => 'required',
        'usia' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
      ],
      [
        'nama.required' => 'Nama wajib diisi',
        'nama_ayah.required' => 'Nama Ayah wajib diisi',
        'nama_ibu.required' => 'Nama Ibu wajib diisi',
        'usia.required' => 'Usia wajib diisi',
        'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
        'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi',
      ]
    );
    $balita = Balita::find($id_balita);
    $balita->nama = $request->get('nama');
    $balita->nama_ayah = $request->get('nama_ayah');
    $balita->nama_ibu = $request->get('nama_ibu');
    $balita->usia = $request->get('usia');
    $balita->tanggal_lahir = $request->get('tanggal_lahir');
    $balita->jenis_kelamin = $request->get('jenis_kelamin');

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $balita->save();
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('balita.index')
      ->with('msg-success', 'Data Berhasil diubah');
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
    $balitas = Balita::all();
    $pdf = PDF::loadview('pages.balita.balita_pdf', ['balitas' => $balitas]);
    return $pdf->stream();
  }
}
