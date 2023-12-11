<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\dataAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade
use DataTables;

class DataAkunController extends Controller
{
    public function akun()
    {
        $data = dataAkun::all(); 
        return view('dataAkun', compact('data')); 
    }

    
    

    public function getDataAkun(Request $request)
     {
         if ($request->ajax()) {
             $data = dataAkun::latest()->get();
            return Datatables::of($data)
             ->addIndexColumn()
             ->addColumn('action', function ($row) {
                $actionBtn = '<a href="'.route('editDataAkun', $row->id_akun).'" class="edit btn btn-success">Edit</a>';
                $actionBtn .= '<a href="javascript:void(0)" class="delete btn btn-danger" data-id="'.$row->id_akun.'">Delete</a>';
                return $actionBtn;
            })
            
             ->rawColumns(['action'])
             ->make(true);
        
     }
 }

    public function tambahAkun()
    {
        return view('tambahDataAkun');
    }

    public function insertAkun(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_lengkap' => 'required',
                'nim' => 'required|numeric',
                'email' => 'required|email',
                'password' =>'required|numeric',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Cetak pesan kesalahan validasi
            dd($e->errors());
        }
        
        // Buat instans model dataAkun
        $data = new dataAkun();
    
        // Isi propertinya dari request
        $data->nama_lengkap = $validatedData['nama_lengkap'];
        $data->nim = $validatedData['nim'];
        $data->email = $validatedData['email'];
    
        // Hash the password before saving it to the database
        $data->password = bcrypt($validatedData['password']);
    
        // Simpan data ke database
        $data->save();
    
        // Redirect ke halaman 'akun' dengan pesan sukses
        return redirect()->route('akun')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function editAkun($id_akun)
    {
        $data = dataAkun::find($id_akun);
    
        if (!$data) {
            return redirect()->route('akun')->with('error', 'Data tidak ditemukan');
        }
    
        return view('editDataAkun', compact('data'));
    }

    public function updateAkun(Request $request, $id_akun)
{
    $data = dataAkun::find($id_akun);

    if (!$data) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    $validatedData = $request->validate([
        'nama_lengkap' => 'required',
        'nim' => 'required|numeric',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $data->nama_lengkap = $validatedData['nama_lengkap'];
    $data->nim = $validatedData['nim'];
    $data->email = $validatedData['email'];
    $data->password = $validatedData['password'];

    $data->save();

    return redirect()->route('akun')->with('success', 'Data berhasil diperbarui');
}

public function deleteAkun(Request $request, $id_akun)
{
    \Log::info("Deleting akun with ID: " . $id_akun);

    try {
        $data = dataAkun::find($id_akun);
        if (!$data) {
            return redirect()->route('akun')->with('error', 'Data tidak ditemukan');
        }

        $data->delete(); // Use delete instead of forceDelete
        return redirect()->route('akun')->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        \Log::error('Error deleting data: ' . $e->getMessage());
        return redirect()->route('akun')->with('error', 'Terjadi kesalahan saat menghapus data');
    }
}



}





