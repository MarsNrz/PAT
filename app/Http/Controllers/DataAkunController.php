<?php

namespace App\Http\Controllers;

use App\Models\DataAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DataTables;

class DataAkunController extends Controller
{
    public function akun()
    {
        $data = DataAkun::all(); 
        return view('dataAkun', compact('data')); 
    }

    public function getDataAkun(Request $request)
    {
        if ($request->ajax()) {
            $data = DataAkun::latest()->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="'.route('editAkun', $row->id_akun).'" class="edit btn btn-success">Edit</a>';
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
                'Fotoprofil' => 'required',
                'nama_lengkap' => 'required',
                'nim' => 'required|numeric',
                'email' => 'required|email',
                'password' => 'required',
                'Fotoktm' => 'required',
            ]);

            $data = new DataAkun();
            $data->Fotoprofil = $validatedData['Fotoprofil'];
            $data->nama_lengkap = $validatedData['nama_lengkap'];
            $data->nim = $validatedData['nim'];
            $data->email = $validatedData['email'];
            $data->password = bcrypt($validatedData['password']);
            $data->Fotoktm = $validatedData['Fotoktm'];

            $data->save();

            // Logging informasi
            Log::channel('single')->info('Akun ditambahkan: ' . $data->nama_lengkap);

            return redirect()->route('akun')->with('success', 'Data berhasil ditambahkan');
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

    public function editAkun($id_akun)
    {
        $data = DataAkun::find($id_akun);
    
        if (!$data) {
            return redirect()->route('akun')->with('error', 'Data tidak ditemukan');
        }
    
        return view('editDataAkun', compact('data'));
    }

    public function updateDataAkun(Request $request, $id_akun)
    {
        try {
            $data = DataAkun::find($id_akun);

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
            $data->password = bcrypt($validatedData['password']);

            $data->save();

            // Logging informasi
            Log::channel('single')->info('Akun diperbarui: ' . $data->nama_lengkap);

            return redirect()->route('akun')->with('success', 'Data berhasil diperbarui');
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

    public function deleteDataAkun($id_akun)
    {
        try {
            // Log untuk memeriksa apakah metode ini dipanggil
            Log::info('Menghapus data untuk ID: ' . $id_akun);

            $dataAkun = DataAkun::find($id_akun);

            if ($dataAkun) {
                // Logging informasi
                Log::channel('single')->info('Akun dihapus: ' . $dataAkun->nama_lengkap);

                $dataAkun->delete();

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

    public function login()
    {
        return view('login');
    }

    public function loginproses(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Validate that email and password are not empty
        $request->validate([
                'email' => 'required|email',
                'password' => 'required',
           
        ], [
            'email.required' => 'Email is required!',
            'email.email' => 'Invalid email format!',
            'password.required' => 'Password is required!',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('home');
        }

        $user = DataAkun::where('email', $request->email)->first();

        if ($user) {
            // Incorrect password
            return redirect('/login')->with('login_error', 'Invalid password. Please try again!');
        }
        
        // Incorrect email
        return redirect('/login')->with('login_error', 'Invalid email. Please try again!');
        
}
}
