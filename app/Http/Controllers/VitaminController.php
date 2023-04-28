<?php

namespace App\Http\Controllers;

use App\Models\Vitamin;
use Illuminate\Http\Request;

class VitaminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.vitamin.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.vitamin.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
        'jenis_vitamin' => 'required',
        'deskripsi' => 'required',
    ],
    [
        'jenis_vitamin.required' => 'Jenis Vitamin wajib diisi',
        'deskripsi.required' => 'Deskripsi Vitamin wajib diisi',
    ]);

    $jenis_vitamin = $request->jenis_vitamin;
    $deskripsi = $request->deskripsi;

    try {
        $vitamin = new Vitamin();
        $vitamin->jenis_vitamin = $jenis_vitamin;
        $vitamin->deskripsi = $deskripsi;
        $vitamin->save();

        return redirect()->to('vitamin')->with('msg-success', 'Berhasil menambahkan data');
    } catch (\Throwable $th) {
        echo $th;
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Vitamin  $vitamin
   * @return \Illuminate\Http\Response
   */
  public function show(Vitamin $vitamin)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Vitamin  $vitamin
   * @return \Illuminate\Http\Response
   */
  public function edit(Vitamin $vitamin)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Vitamin  $vitamin
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Vitamin $vitamin)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Vitamin  $vitamin
   * @return \Illuminate\Http\Response
   */
  public function destroy(Vitamin $vitamin)
  {
    //
  }
}
