<?php

namespace App\Http\Controllers;

use App\Models\Vitamin;
use Illuminate\Http\Request;

use PDF;

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
    return view('pages.vitamin.show',compact('vitamin'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Vitamin  $vitamin
   * @return \Illuminate\Http\Response
   */
  public function edit(Vitamin $vitamin)
  {
    return view('pages.vitamin.edit', compact('vitamin'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Vitamin  $vitamin
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
        'jenis_vitamin' => 'required|unique:vitamins,jenis_vitamin',
        'deskripsi' => 'required',
      ],[
        'jenis_vitamin.required' => 'Jenis Vitamin wajib diisi',
        'jenis_vitamin.unique' => 'Jenis Vitamin yang diisikan sudah ada dalam database',
        'deskripsi.required' => 'Deskripsi Vitamin wajib diisi',
      ]);

      $data = [
        'jenis_vitamin' => $request->jenis_vitamin,
        'deskripsi' => $request->deskripsi,
      ];

      Vitamin::where('id_vitamin', $id)->update($data);
      return redirect()->to('vitamin')->with('msg-success', 'Berhasil melakukan update data');
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

  public function cetak_pdf()
  {
    $vitamin = Vitamin::all();
    $pdf = PDF::loadview('pages.vitamin.vitamin_pdf',['vitamin'=>$vitamin]);
    return $pdf->stream();
  }
}
