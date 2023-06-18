<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use App\Models\Balita;
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
}
