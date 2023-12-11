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
        // Validasi request untuk data tanpa file 'Fotoprofil' dan 'Fotoktm'
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Buat instansiasi model dataAkun dan isi propertinya dari request
        $user = new dataAkun();
        $user->nama_lengkap = $validatedData['nama_lengkap'];
        $user->nim = $validatedData['nim'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
    
        // Simpan model ke dalam database
        $user->save();
    
        // Redirect ke halaman 'akun' dengan pesan sukses
        return redirect()->route('akun')->with('success', 'Data berhasil ditambahkan');
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

    if (!$user) {
        return redirect()->route('akun')->with('error', 'Data tidak ditemukan');
    }

    return view('editDataAkun', compact('user'));
}

   
public function updateAkun(Request $request, $id_akun)
{
    $user = dataAkun::find($id_akun);
    if (!$user) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    $validatedData = $request->validate([
        'nama_lengkap' => 'required',
        'nim' => 'required|numeric',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user->nama_lengkap = $validatedData['nama_lengkap'];
    $user->nim = $validatedData['nim'];
    $user->email = $validatedData['email'];
    $user->password = $validatedData['password'];

    $user->save();

    return redirect()->route('editDataAkun', $id_akun)->with('success', 'Data berhasil diperbarui');
}

}





