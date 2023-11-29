<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\dataAlat;
use Illuminate\Http\Request;

class DataAlatController extends Controller
{
    public function index()
    {
        $data = dataAlat::all();
        return view ('dataAlat', compact('data'));
    }
    public function tambahDataAlat()
    {
        return view ('tambahDataAlat');
    }
    public function insertDataAlat(Request $request)
    {
        dataAlat::create($request->all());
        return redirect()->route('Alat')->with ('success', 'Data berhasil di Tambahkan');
    }

    public function editDataAlat($id_alat)
    {
        $data = dataAlat::find($id_alat);
        return view('editDataAlat', compact('data'));
    }

    public function updateDataAlat(Request $request, $id_alat)
    {
        $data = dataAlat::find($id_alat);
        $data->nama_alat = $request->input('nama_alat');
        $data->jenis_alat = $request->input('jenis_alat');
        $data->save();
        return redirect()->route('Alat')->with('success', 'Data berhasil di Update');
    }
    public function deleteDataAlat(Request $request, $id_alat)
    {
        $data = dataAlat::find($id_alat);
        $data->delete();
        return redirect()->route('Alat')->with('success', 'Data berhasil dihapus');
    }
   
    public function akunJson()
    {
        $user = dataAlat::all();
        return DataTables::of($data)
            ->addColumn('action', function ($item) {
                $btnEdit = '<a href="/editAlat/'.$item->id_akun.'" class="btn btn-primary">Edit</a>';
                $btnDelete = '<a href="/deleteAlat/'.$item->id_akun.'" class="btn btn-danger">Delete</a>';
                return $btnEdit.$btnDelete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function home()
    {
        return view ('home');
    }
}