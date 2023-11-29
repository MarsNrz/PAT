<?php

namespace App\Http\Controllers;

use App\Models\keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    public function keluhan(){
        $data = keluhan::all();
        return view('dataKeluhan', compact('data'));
    }

    public function tambahDataKeluhan()
    {
        return view ('tambahDataKeluhan');
    }
    public function insertDataKeluhan(Request $request)
    {
        keluhan::create($request->all());
        return redirect()->route('keluhan')->with ('success', 'Data berhasil di Tambahkan');
    }

    public function editDataKeluhan($id_keluhan)
    {
        $data = keluhan::find($id_keluhan);
        return view('editDataKeluhan', compact('data'));
    }

    public function updateDataKeluhan(Request $request, $id_keluhan)
    {
        $data = keluhan::find($id_keluhan);
        $data->deskripsi_keluhan = $request->input('deskripsi_keluhan');
        $data->id_akun = $request->input('id_akun');
        $data->save();
        return redirect()->route('keluhan')->with('success', 'Data berhasil di Update');
    }
    public function deleteDataKeluhan(Request $request, $id_keluhan)
    {
        $data = keluhan::find($id_keluhan);
        $data->delete();
        return redirect()->route('keluhan')->with('success', 'Data berhasil dihapus');
    }
    public function akunJson()
    {
        $user = keluhan::all();
        return DataTables::of($data)
            ->addColumn('action', function ($item) {
                $btnEdit = '<a href="/editAkun/'.$item->id_akun.'" class="btn btn-primary">Edit</a>';
                $btnDelete = '<a href="/deleteAkun/'.$item->id_akun.'" class="btn btn-danger">Delete</a>';
                return $btnEdit.$btnDelete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
