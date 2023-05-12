<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
  public function getIbuHamil(Request $request)
  {
    $dataIbuHamil = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataIbuHamil= IbuHamil::select("id_ibu_hamil", "nama")
        ->where('nama', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataIbuHamil);
  }
 
}
