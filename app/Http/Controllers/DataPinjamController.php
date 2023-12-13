<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\dataPinjam;
use Illuminate\Http\Request;
class DataPinjamController extends Controller
{
    public function pinjam(){
        $data = dataPinjam::all();
        return view('dataPinjam', compact('data'));
    }

    public function tambahDataPinjam()
    {
        return view ('tambahDataPinjam');
    }
    public function insertDataPinjam(Request $request)
    {
        dataPinjam::create($request->all());
        return redirect()->route('pinjam')->with ('success', 'Data berhasil di Tambahkan');
    }

    public function editDataPinjam($id_pinjam)
    {
        $data = dataPinjam::find($id_pinjam);
        return view('editDataPinjam', compact('data'));
    }

    public function updateDataPinjam(Request $request, $id_pinjam)
    {
        $data = dataPinjam::find($id_pinjam);
        $data->deskripsi_keluhan = $request->input('deskripsi_keluhan');
        $data->id_akun = $request->input('id_akun');
        $data->save();
        return redirect()->route('pinjam')->with('success', 'Data berhasil di Update');
    }
    public function deleteDataPinjam(Request $request, $id_pinjam)
    {
        $data = dataPinjam::find($id_pinjam);
        $data->delete();
        return redirect()->route('pinjam')->with('success', 'Data berhasil dihapus');
    }
}