<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use Illuminate\Http\Request;

class IbuHamilController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.ibu-hamil.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.ibu-hamil.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    IbuHamil::create($request->all());
    return redirect()->route('ibuhamil.index')->with('success', 'Data ibu hamil berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\IbuHamil  $ibuHamil
   * @return \Illuminate\Http\Response
   */
  public function show(IbuHamil $ibuHamil)
  {
    return view('pages.ibu-hamil.show', compact('ibuHamil'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\IbuHamil  $ibuHamil
   * @return \Illuminate\Http\Response
   */
  public function edit(IbuHamil $ibuHamil)
  {
    return view('pages.ibu-hamil.edit', compact('ibuHamil'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\IbuHamil  $ibuHamil
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, IbuHamil $ibuHamil)
  {
    $ibuHamil->update($request->all());
    return redirect()->route('ibuhamil.index')->with('success', 'Data ibu hamil berhasil diperbarui');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\IbuHamil  $ibuHamil
   * @return \Illuminate\Http\Response
   */
  public function destroy(IbuHamil $ibuHamil)
  {
    $ibuHamil->delete();
    return redirect()->route('ibuhamil.index')->with('success', 'Data ibu hamil berhasil dihapus');
  }
}
