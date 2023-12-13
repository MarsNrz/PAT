<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\dataAlat;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\Log;

class DataAlatController extends Controller
{
    public function index()
    {
        try {
            $data = dataAlat::all();
            return view('dataAlat', compact('data'));
        } catch (Exception $e) {
            // Tangani exception di sini, misalnya log atau kirim notifikasi
            Log::error('Error in DataAlatController@index: ' . $e->getMessage());
            return response()->view('errors.500', [], 500); // Tampilkan halaman error 500
        }
    }

    public function tambahDataAlat()
    {
        return view('tambahDataAlat');
    }

    public function insertDataAlat(Request $request)
    {
        try {
            dataAlat::create($request->all());
            return redirect()->route('Alat')->with('success', 'Data berhasil di Tambahkan');
        } catch (Exception $e) {
            // Tangani exception di sini, misalnya log atau kirim notifikasi
            Log::error('Error in DataAlatController@insertDataAlat: ' . $e->getMessage());
            return redirect()->route('Alat')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // ... Fungsi lainnya ...

    public function akunJson()
    {
        try {
            $data = dataAlat::all();
            return dataAlat::of($data)
                ->addColumn('action', function ($item) {
                    $btnEdit = '<a href="/editAlat/' . $item->id_akun . '" class="btn btn-primary">Edit</a>';
                    $btnDelete = '<a href="/deleteAlat/' . $item->id_akun . '" class="btn btn-danger">Delete</a>';
                    return $btnEdit . $btnDelete;
                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (Exception $e) {
            // Tangani exception di sini, misalnya log atau kirim notifikasi
            Log::error('Error in DataAlatController@akunJson: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
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

    public function home()
    {
        return view ('home');
    }
}