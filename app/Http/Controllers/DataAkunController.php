<?php

namespace App\Http\Controllers;

use App\Models\dataAkun;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
    public function deleteDataAkun($id_akun)
    {
        // Log to check if the method is being called
        \Log::info('Deleting data for ID: ' . $id_akun);
    
        $dataAkun = dataAkun::find($id_akun);
    
        if ($dataAkun) {
            $dataAkun->delete();
            return response()->json(['success' => true, 'message' => 'Data deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found']);
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            dd($e->errors());
        }

        $data = new dataAkun();
        $data->Fotoprofil = $validatedData['Fotoprofil'];
        $data->nama_lengkap = $validatedData['nama_lengkap'];
        $data->nim = $validatedData['nim'];
        $data->email = $validatedData['email'];
        $data->password =($validatedData['password']);
        $data->Fotoktm = ($validatedData['Fotoktm']);

        $data->save();

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
            'Fotoprofil' => 'required',
            'nama_lengkap' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required',
            'Fotoktm' => 'required',
        ]);
        $data->Fotoprofil = $validatedData['Fotoprofil'];
        $data->nama_lengkap = $validatedData['nama_lengkap'];
        $data->nim = $validatedData['nim'];
        $data->email = $validatedData['email'];
        $data->password = $validatedData['password'];
        $data->Fotoktm = $validatedData['Fotoktm'];

        $data->save();

        return redirect()->route('akun')->with('success', 'Data berhasil diperbarui');
    }
    public function login(){
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
    
        $user = User::where('email', $request->email);
    
        if ($user) {
            // Incorrect password
            return redirect('/login')->with('login_error', 'Invalid password. Please try again!');
        }
    
        // Incorrect email
        return redirect('/login')->with('login_error', 'Invalid email. Please try again!');
    }
}
