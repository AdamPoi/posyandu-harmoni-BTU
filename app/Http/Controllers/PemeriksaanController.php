<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
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
      $pemeriksaan = Pemeriksaan::with('Nim', 'like', "%$katakunci%")
        ->orwhere('Nama', 'like', "%$katakunci%")
        ->orwhere('kelas_id', 'like', "%$katakunci%")
        ->orwhere('Jurusan', 'like', "%$katakunci%")
        ->orwhere('No_Handphone', 'like', "%$katakunci%")
        ->orwhere('email', 'like', "%$katakunci%")
        ->orwhere('tgl_lahir', 'like', "%$katakunci%")
        ->paginate($jumlahbaris);
    } else {
      $pemeriksaan = Pemeriksaan::with('ibu_hamil')->get();
      $paginate = Pemeriksaan::orderBy('id_pemeriksaan', 'asc')->paginate(5);
    }
    return view('pages.pemeriksaan.index', ['pemeriksaan' => $pemeriksaan, 'paginate' => $paginate]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $ibu_hamil = Pemeriksaan::all(); //mendapatkan data dari tabel ibu hamil
    return view('pages.pemeriksaan.create', ['ibu_hamil' => $ibu_hamil]);
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
        'id_ibu_hamil' => 'required',
        'tanggal' => 'required',
        'keterangan' => 'required',
      ],
      [
        'id_ibu_hamil.required' => 'Nama Ibu Hamil wajib diisi',
        'tanggal.required' => 'Tanggal wajib diisi',
        'keterangan.required' => 'Nama wajib diisi',
      ]
    );
    $pemeriksaan = new Pemeriksaan;
    $pemeriksaan->tanggal = $request->get('tanggal');
    $pemeriksaan->keterangan = $request->get('keterangan');

    $ibu_hamil = new Pemeriksaan;
    $ibu_hamil->id = $request->get('id_ibu_hamil');

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $pemeriksaan->ibu_hamil()->associate($ibu_hamil);
    $pemeriksaan->save();
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('pemeriksaan.index')
      ->with('success', 'Data Berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pemeriksaan  $pemeriksaan
   * @return \Illuminate\Http\Response
   */
  public function show(Pemeriksaan $pemeriksaan)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pemeriksaan  $pemeriksaan
   * @return \Illuminate\Http\Response
   */
  public function edit(Pemeriksaan $pemeriksaan)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pemeriksaan  $pemeriksaan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pemeriksaan $pemeriksaan)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pemeriksaan  $pemeriksaan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pemeriksaan $pemeriksaan)
  {
    //
  }
}
