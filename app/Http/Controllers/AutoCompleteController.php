<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Vitamin;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
  public function getIbuHamil(Request $request)
  {
    $dataIbuHamil = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataIbuHamil = IbuHamil::select("id_ibu_hamil", "nama")
        ->where('nama', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataIbuHamil);
  }
  public function getBalita(Request $request)
  {
    $dataBalita = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataBalita = Balita::select("id_balita", "nama")
        ->where('nama', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataBalita);
  }
  public function getJadwal(Request $request)
  {
    $dataJadwal = [];
    if ($request->has('q')) {
      $search = $request->q;

      $dataJadwal = Jadwal::where('jenis', $request->get('jenis'))
        ->where('kegiatan', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataJadwal);
  }
  public function getVitamin(Request $request)
  {
    $dataVitamin = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataVitamin = Vitamin::select("id_vitamin", "jenis_vitamin")
        ->where('jenis_vitamin', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataVitamin);
  }
}
