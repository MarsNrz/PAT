<?php

namespace App\Http\Controllers;

use App\Models\keluhan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class KeluhanController extends Controller
{
    public function keluhan()
    {
        $data = keluhan::all();
        return view('dataKeluhan', compact('data'));
    }

    public function getDataKeluhan(Request $request)
    {
        if ($request->ajax()) {
            $data = keluhan::latest()->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="'.route('editDataAkun', $row->id_keluhan).'" class="edit btn btn-success">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" class="delete btn btn-danger" data-id="'.$row->id_keluhan.'">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function tambahDataKeluhan()
    {
        return view ('tambahDataKeluhan');
    }

    public function insertDataKeluhan(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'deskripsi_keluhan' => 'required',
                'id_akun' => 'required',
            ]);

            $data = new Keluhan();
            $data->deskripsi_keluhan = $validatedData['deskripsi_keluhan'];
            $data->id_akun = $validatedData['id_akun'];

            $data->save();

            // Logging informasi
            Log::channel('single')->info('Keluhan ditambahkan: ' . $data->deskripsi_keluhan);

            return redirect()->route('keluhan')->with('success', 'Data berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            Log::error('Validation error: ' . json_encode($e->errors()));
            return redirect()->back()->with('error', 'Validasi gagal');
        } catch (\Exception $e) {
            // Log exception jika diperlukan
            Log::error('Exception occurred: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }
    }

    public function editDataKeluhan($id_keluhan)
    {
        $data = keluhan::find($id_keluhan);

        if (!$data) {
            return redirect()->route('keluhan')->with('error', 'Data tidak ditemukan');
        }

        return view('editDataKeluhan', compact('data'));
    }

    public function updateDataKeluhan(Request $request, $id_keluhan)
    {
        try {
            $data = keluhan::find($id_keluhan);

            if (!$data) {
                return redirect()->back()->with('error', 'Data tidak ditemukan');
            }

            $validatedData = $request->validate([
                'deskripsi_keluhan' => 'required',
                'id_akun' => 'required',
            ]);

            $data->deskripsi_keluhan =$validatedData['deskripsi_keluhan'];
            $data->id_akun = $validatedData['id_akun'];

            $data->save();

            // Logging informasi
            Log::channel('single')->info('Keluhan diperbarui: ' . $data->deskripsi_keluhan);

            return redirect()->route('keluhan')->with('success', 'Data berhasil di Update');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            Log::error('Validation error: ' . json_encode($e->errors()));
            return redirect()->back()->with('error', 'Validasi gagal');
        } catch (\Exception $e) {
            // Log exception jika diperlukan
            Log::error('Exception occurred: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }
    }
    public function deleteDataKeluhan(Request $request, $id_keluhan)
    {
        try {
            // Log untuk memeriksa apakah metode ini dipanggil
            Log::info('Menghapus data untuk ID: ' . $id_keluhan);

            $data = keluhan::find($id_keluhan);

            if ($data) {
                // Logging informasi
                Log::channel('single')->info('Keluhan dihapus: ' . $data->deskripsi_keluhan);

                $data->delete();

                return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
            } else {
                return response()->json(['success' => false
                , 'message' => 'Data tidak ditemukan']);
            }
        } catch (\Exception $e) {
            // Log exception jika diperlukan
            Log::error('Exception occurred: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan']);
        }
    }
    
}