<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\dataAkun;
use Illuminate\Http\Request;
use DataTables;

class DataAkunController extends Controller
{
    public function akun()
    {
        $users = dataAkun::all(); 
        return view('dataAkun', compact('users')); 
    }
    public function tambahAkun()
    {
        return view('tambahDataAkun');
    }
    public function insertAkun(Request $request)
    {
        dataAkun::create($request->all());
        return redirect()->route('akun')->with ('success', 'Data berhasil di Tambahkan');
    }
    public function deleteAkun(Request $request, $id_akun)
    {
        $user = dataAkun::find($id_akun);
        $user->delete();
        return redirect()->route('akun')->with('success', 'Data berhasil dihapus');
    }
    public function editAkun($id_akun)
{
    $user = dataAkun::find($id_akun);
    return view('editDataAkun', compact('user'));
}

    public function updateAkun(Request $request, $id_akun)
    {
        $user = dataAkun::find($id_akun);
        $user->username = $request->input('username');
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->nim= $request->input('nim');
        $user->email= $request->input('email');
        $user->password= $request->input('password');
        $user->save();
        return redirect()->route('akun')->with('success', 'Data berhasil di Update');
    }

    public function akunJson()
    {
        $user = dataAkun::all();
        return DataTables::of($user)
            ->addColumn('action', function ($item) {
                $btnEdit = '<a href="/editAkun/'.$item->id_akun.'" class="btn btn-primary">Edit</a>';
                $btnDelete = '<a href="/deleteAkun/'.$item->id_akun.'" class="btn btn-danger">Delete</a>';
                return $btnEdit.$btnDelete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
