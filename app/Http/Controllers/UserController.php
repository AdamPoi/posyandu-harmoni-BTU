<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      return DataTables::of(User::query())->toJson();
    }
    return view('pages.user.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.user.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate(
      [
        'nama' => 'required',
        'umur' => 'required',
        'role' => 'required',
        'alamat' => 'required',
        'email' => 'required',
        'password' => 'required',
        'profile_picture' => 'required'
      ],
      [
        'nama.required' => 'Nama User wajib diisi',
        'umur.required' => 'Umur User wajib diisi',
        'role.required' => 'Role User wajib diisi',
        'alamat.required' => 'Alamat User wajib diisi',
        'email.required' => 'Email User wajib diisi',
        'password.required' => 'Password User wajib diisi',
      ]
    );

    $nama = $request->nama;
    $umur = $request->umur;
    $role = $request->role;
    $alamat = $request->alamat;
    $email = $request->email;
    $password = $request->password;
    $profile_picture = $this->uploadImage($request->file('profile_picture'));



    try {
      $user = new User();
      $user->nama = $nama;
      $user->umur = $umur;
      $user->role = $role;
      $user->alamat = $alamat;
      $user->email = $email;
      $user->password = bcrypt($password);
      $user->profile_picture = $profile_picture;
      $user->save();

      return redirect()->to('user')->with('msg-success', 'Berhasil menambahkan data');
    } catch (\Throwable $th) {
      echo $th;
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    return view('pages.user.show', compact('user'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    return view('pages.user.edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $request->validate(
      [
        'nama' => 'required',
        'umur' => 'required',
        'role' => 'required',
        'alamat' => 'required',
        'email' => 'required',
        'password' => 'required',
      ],
      [
        'nama.required' => 'Nama User wajib diisi',
        'umur.required' => 'Umur User wajib diisi',
        'role.required' => 'Role User wajib diisi',
        'alamat.required' => 'Alamat User wajib diisi',
        'email.required' => 'Email User wajib diisi',
        'email.unique' => 'Email User yang diisikan sudah ada dalam database',
        'password.required' => 'Password User wajib diisi',
      ]
    );

    $nama = $request->nama;
    $umur = $request->umur;
    $role = $request->role;
    $alamat = $request->alamat;
    $email = $request->email;
    $password = $request->password;
    $profile_picture = $this->uploadImage($request->file('profile_picture'));


    try {
      $user->nama = $nama;
      $user->umur = $umur;
      $user->role = $role;
      $user->alamat = $alamat;
      $user->email = $email;
      $user->password = bcrypt($password);
      $user->profile_picture = $profile_picture;

      $user->save();

      return redirect()->to('user')->with('msg-success', 'Berhasil melakukan update data');
    } catch (\Throwable $th) {
      echo $th;
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Balita  $balita
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('user.index')->with('msg-success', 'Berhasil menghapus data user' . $user->nama);
  }

  protected function uploadImage($file)
  {
    $imageName = time() . '.' . $file->getClientOriginalExtension();

    $file->move(public_path('images/user'), $imageName);
    return $imageName;
  }

  public function cetak_pdf()
  {
    $users = User::all();
    $pdf = PDF::loadview('pages.user.user_pdf', ['users' => $users]);
    return $pdf->stream();
  }
}
