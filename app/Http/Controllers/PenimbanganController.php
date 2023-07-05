<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\IbuHamil;
use App\Models\Jadwal;
use App\Models\Penimbangan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
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
        'id_jadwal' => 'nullable',
        'lingkar_kepala' => 'required',
        'tanggal' => 'required',
      ],
      [
        'tinggi_badan.required' => 'Tinngi badan wajib diisi',
        'lingkar_kepala.required' => 'Tinngi badan wajib diisi',
        'berat_badan.required' => 'Berat badan wajib diisi',
        'id_balita.required' => 'Id Balita wajib diisi',
        'tanggal.required' => 'Id Balita wajib diisi',
      ]
    );
    $penimbangan = new Penimbangan;
    $penimbangan->id_balita = $request->get('id_penimbangan');
    $penimbangan->id_jadwal = $request->get('id_jadwal');
    $penimbangan->tinggi_badan = $request->get('tinggi_badan');
    $penimbangan->lingkar_kepala = $request->get('lingkar_kepala');
    $penimbangan->berat_badan = $request->get('berat_badan');
    $penimbangan->tanggal = $request->get('tanggal');


    $balitas = new Balita;
    $balitas->id_balita = $request->get('id_balita');

    $jadwals = new Jadwal;
    $jadwals->id_jadwal = $request->get('id_jadwal');
    $penimbangan->jadwal()->associate($jadwals);

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $penimbangan->balita()->associate($balitas);

    $penimbangan->save();
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('penimbangan.index')
      ->with('msg-success', 'Data Berhasil ditambahkan');
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
  public function update(Request $request, $id_penimbangan)
  {
    //melakukan validasi data
    $request->validate(
      [
        'tinggi_badan' => 'required',
        'id_balita' => 'required',
        'berat_badan' => 'required',
        'id_jadwal' => 'nullable',
        'lingkar_kepala' => 'required',
        'tanggal' => 'required',
      ],
      [
        'tinggi_badan.required' => 'Tinngi badan wajib diisi',
        'lingkar_kepala.required' => 'Tinngi badan wajib diisi',
        'berat_badan.required' => 'Berat badan wajib diisi',
        'id_balita.required' => 'Id Balita wajib diisi',
        'tanggal.required' => 'Id Balita wajib diisi',
      ]
    );
    $penimbangan = new Penimbangan;
    $penimbangan->id_balita = $request->get('id_penimbangan');
    $penimbangan->id_jadwal = $request->get('id_jadwal');
    $penimbangan->tinggi_badan = $request->get('tinggi_badan');
    $penimbangan->lingkar_kepala = $request->get('lingkar_kepala');
    $penimbangan->berat_badan = $request->get('berat_badan');
    $penimbangan->tanggal = $request->get('tanggal');

    $balitas = new Balita;
    $balitas->id_balita = $request->get('id_balita');
    $jadwals = new Jadwal;
    $jadwals->id_jadwal = $request->get('id_jadwal');

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $penimbangan->balita()->associate($balitas);
    $penimbangan->jadwal()->associate($jadwals);
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
    // Mengambil data dari database atau sumber data lainnya
    $data = Penimbangan::join('balitas', 'penimbangans.id_balita', '=', 'balitas.id_balita')
      ->orderBy('balitas.nama', 'asc')
      ->get();

    // Inisialisasi objek Dompdf
    $dompdf = new Dompdf();

    // Menyiapkan markup HTML yang akan dicetak ke PDF
    $html = '<html><body>';

    $html .= '<h1 style="text-align: center">Laporan Penimbangan Posyandu Harmoni - BTU</h1>'; // Menambahkan judul
    $html .= '<br>';

    $count = 1; // Variabel hitungan untuk nomor tabel

    foreach ($data as $item) {
      $html .= '<h3>Data Penimbangan ke-' . $count . '</h3>'; // Menambahkan nomor tabel

      $html .= '<table border="1" style="border-collapse: collapse; width: 100%;">';
      $html .= '<tr>';
      $html .= '<th style="padding: 8px; text-align: left;">No</th>';
      $html .= '<th style="padding: 8px; text-align: left;">Nama</th>';
      $html .= '<th style="padding: 8px; text-align: left;">Berat Badan</th>';
      $html .= '<th style="padding: 8px; text-align: left;">Tinggi Badan</th>';
      $html .= '<th style="padding: 8px; text-align: left;">Lingkar Kepala</th>';
      $html .= '<th style="padding: 8px; text-align: left;">Tanggal</th>';
      $html .= '</tr>';
      $html .= '<tr>';
      $html .= '<td style="padding: 8px;">' . $count . '</td>';
      $html .= '<td style="padding: 8px;">' . $item->nama . '</td>';
      $html .= '<td style="padding: 8px;">' . $item->nama ? $item->balita->nama : '</td>';
      $html .= '<td style="padding: 8px;">' . $item->berat_badan . '</td>';
      $html .= '<td style="padding: 8px;">' . $item->tinggi_badan . '</td>';
      $html .= '<td style="padding: 8px;">' . $item->lingkar_kepala . '</td>';
      $html .= '<td style="padding: 8px;">' . date('d-m-Y', strtotime($item->tanggal)) . '</td>';
      $html .= '</tr>';
      $html .= '</table>';

      $html .= '<br>';

      $html .= '<h3>Data Balita</h3>'; // Menambahkan nomor tabel

      $html .= '<table border="1" style="border-collapse: collapse; width: 100%;">';
      $html .= '<tr>';
      $html .= '<th style="padding: 8px; text-align: left;">No</th>';
      $html .= '<th style="padding: 8px; text-align: left;">Nama</th>';
      // $html .= '<th style="padding: 8px; text-align: left;">Nama Ibu</th>';
      // $html .= '<th style="padding: 8px; text-align: left;">Nama Ayah</th>';
      $html .= '<th style="padding: 8px; text-align: left;">Tanggal Lahir</th>';
      $html .= '<th style="padding: 8px; text-align: left;">Usia</th>';
      $html .= '<th style="padding: 8px; text-align: left;">Jenis Kelamin</th>';
      $html .= '</tr>';
      $html .= '<tr>';
      $html .= '<td style="padding: 8px;">' . $count . '</td>';
      $html .= '<td style="padding: 8px;">' . $item->nama . '</td>';
      // $html .= '<td style="padding: 8px;">' . $item->nama ? $item->ibu_hamil->nama : '</td>';
      // $html .= '<td style="padding: 8px;">' . $item->nama_ayah . '</td>';
      $html .= '<td style="padding: 8px;">' . date('d-m-Y', strtotime($item->tanggal_lahir)) . '</td>';
      $html .= '<td style="padding: 8px;">' . $item->usia . '</td>';
      $html .= '<td style="padding: 8px;">' . $item->jenis_kelamin . '</td>';
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
    $dompdf->stream('Cetak-Laporan-Penimbangan.pdf');
  }
}
