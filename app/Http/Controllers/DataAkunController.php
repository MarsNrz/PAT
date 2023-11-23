<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\dataAkun;
use Illuminate\Http\Request;
;

class DataAkunController extends Controller
{
    public function akun()
    {
        $data = dataAkun::all();
        return view('dataAkun',compact('data'));
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
        $data = dataAkun::find($id_akun);
        $data->delete();
        return redirect()->route('akun')->with('success', 'Data berhasil dihapus');
    }
    public function editAkun($id_akun){
        $data = dataAkun::find($id_akun);
        // dd($data);

        return view('editDataAkun',compact('data'));
    }
    public function updateAkun(Request $request, $id_akun)
    {
        $data = dataAkun::find($id_akun);
        $data->username = $request->input('username');
        $data->nama_lengkap = $request->input('nama_lengkap');
        $data->nim= $request->input('nim');
        $data->email= $request->input('email');
        $data->password= $request->input('password');
        $data->save();
        return redirect()->route('akun')->with('success', 'Data berhasil di Update');
    }
}
