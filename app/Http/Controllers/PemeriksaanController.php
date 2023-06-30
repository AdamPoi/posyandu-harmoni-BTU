<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PDF;

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
    return view('pages.pemeriksaan.create', ['ibu_hamils' => $ibu_hamils]);
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
        'tanggal' => 'required',
        'id_ibu_hamil' => 'required',
        'catatan' => 'required',
      ],
      [
        'tanggal.required' => 'Tanggal wajib diisi',
        'catatan.required' => 'Catatan wajib diisi',
        'id_ibu_hamil.required' => 'Nama Ibu Hamil wajib diisi',
      ]
    );
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
    $pemeriksaan = Pemeriksaan::with('ibu_hamil')->where('id_pemeriksaan', $id_pemeriksaan)->first();
    return view('pages.pemeriksaan.show', compact('pemeriksaan'));
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
    $pemeriksaan = Pemeriksaan::with('ibu_hamil')->where('id_pemeriksaan', $id_pemeriksaan)->first();
    $ibu_hamils = IbuHamil::all(); //mendapatkan data dari ibu hamil
    return view('pages.pemeriksaan.edit', compact('pemeriksaan', 'ibu_hamils'));
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
    $request->validate(
      [
        'tanggal' => 'required',
        'id_ibu_hamil' => 'required',
        'catatan' => 'required',
      ],
      [
        'tanggal.required' => 'Tanggal wajib diisi',
        'catatan.required' => 'Catatan wajib diisi',
        'id_ibu_hamil.required' => 'Nama Ibu Hamil wajib diisi',
      ]
    );
    $pemeriksaan = Pemeriksaan::with('ibu_hamil')->where('id_pemeriksaan', $id_pemeriksaan)->first();
    $pemeriksaan->tanggal = $request->get('tanggal');
    $pemeriksaan->catatan = $request->get('catatan');

    $ibu_hamils = new IbuHamil;
    $ibu_hamils->id_ibu_hamil = $request->get('id_ibu_hamil');

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $pemeriksaan->ibu_hamil()->associate($ibu_hamils);
    $pemeriksaan->save();
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('pemeriksaan.index')
      ->with('msg-success', 'Data Berhasil dirubah');
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
      ->with('msg-success', 'Data Berhasil Dihapus');
  }

  public function cetak_pdf()
  {
    // Mengambil data dari database atau sumber data lainnya
    $data = Pemeriksaan::join('ibu_hamils', 'pemeriksaans.id_ibu_hamil', '=', 'ibu_hamils.id_ibu_hamil')
    ->orderBy('ibu_hamils.nama', 'asc')
    ->get();

    // Inisialisasi objek Dompdf
    $dompdf = new Dompdf();

    // Menyiapkan markup HTML yang akan dicetak ke PDF
    $html = '<html><body>';

    $html .= '<h1 style="text-align: center">Laporan Pemeriksaan Posyandu Harmoni - BTU</h1>'; // Menambahkan judul
    $html .= '<br>';

    $count = 1; // Variabel hitungan untuk nomor tabel

    foreach ($data as $item) {
    $html .= '<h3>Data Pemeriksaan ke-' . $count . '</h3>'; // Menambahkan nomor tabel

    $html .= '<table border="1" style="border-collapse: collapse; width: 100%;">';
    $html .= '<tr>';
    $html .= '<th style="padding: 8px; text-align: left;">No</th>';
    $html .= '<th style="padding: 8px; text-align: left;">Nama Ibu</th>';
    $html .= '<th style="padding: 8px; text-align: left;">Tanggal</th>';
    $html .= '<th style="padding: 8px; text-align: left;">Catatan</th>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="padding: 8px;">' . $count . '</td>';
    $html .= '<td style="padding: 8px;">' . $item->nama . '</td>';
    $html .= '<td style="padding: 8px;">' . date('d-m-Y', strtotime($item->tanggal)) . '</td>';
    $html .= '<td style="padding: 8px;">' . $item->catatan . '</td>';
    $html .= '</tr>';
    $html .= '</table>';

    $html .= '<br>';

    $html .= '<h3>Data Ibu</h3>'; // Menambahkan nomor tabel

    $html .= '<table border="1" style="border-collapse: collapse; width: 100%;">';
    $html .= '<tr>';
    $html .= '<th style="padding: 8px; text-align: left;">No</th>';
    $html .= '<th style="padding: 8px; text-align: left;">Nama Ibu</th>';
    $html .= '<th style="padding: 8px; text-align: left;">Alamat</th>';
    $html .= '<th style="padding: 8px; text-align: left;">No Telepon</th>';
    $html .= '<th style="padding: 8px; text-align: left;">Usia Kandungan</th>';
    $html .= '<th style="padding: 8px; text-align: left;">Tanggal Hamil</th>';
    $html .= '<th style="padding: 8px; text-align: left;">Tanggal Lahir</th>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="padding: 8px;">' . $count . '</td>';
    $html .= '<td style="padding: 8px;">' . $item->nama . '</td>';
    $html .= '<td style="padding: 8px;">' . $item->alamat . '</td>';
    $html .= '<td style="padding: 8px;">' . $item->no_telepon . '</td>';
    $html .= '<td style="padding: 8px;">' . $item->usia_kandungan . '</td>';
    $html .= '<td style="padding: 8px;">' . $item->tanggal_hamil . '</td>';
    $html .= '<td style="padding: 8px;">' . $item->tanggal_lahir . '</td>';
    $html .= '</tr>';
    $html .= '</table>';

    $html .= '<br>';

    $count++;
    }
    $html .= '</body></html>';

    // Memasukkan markup HTML ke objek Dompdf
    $dompdf->loadHtml($html);

    // Render HTML menjadi PDF
    $dompdf->render();

    // Mengirimkan hasil PDF ke browser untuk diunduh
    $dompdf->stream('Cetak-Laporan-Pemeriksaan.pdf');
  }  
}
