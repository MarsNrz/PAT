<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
;

class AdminController extends Controller
{
    public function admin()
    {
        $data = admin::all();
        return view('admin',compact('data'));
    }
    public function tambahadmin()
    {
        return view('tambahadmin');
    }
    public function insertadmin(Request $request)
    {
        admin::create($request->all());
        return redirect()->route('admin')->with ('success', 'Data berhasil di Tambahkan');
    }
    public function deleteadmin(Request $request, $id_admin)
    {
        $data = admin::find($id_admin);
        $data->delete();
        return redirect()->route('admin')->with('success', 'Data berhasil dihapus');
    }
    public function editadmin($id_admin){
        $data = admin::find($id_admin);
        // dd($data);

        return view('editadmin',compact('data'));
    }
    public function updateadmin(Request $request, $id_admin)
    {
        $data = admin::find($id_admin);
        $data->username = $request->input('username');
        $data->nama_lengkp= $request->input('nama_lengkp');
        $data->nim= $request->input('nim');
        $data->email= $request->input('email');
        $data->password= $request->input('password');
        $data->save();
        return redirect()->route('admin')->with('success', 'Data berhasil di Update');
    }
}
