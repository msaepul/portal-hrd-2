<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //login valid?

        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            if ($user->level === 1) {
                session(['cabang' => $user->cabang, 'dept' => $user->dept, 'id' => $user->id]);
                return redirect('dashboard');
            } elseif ($user->level === 2) {
                return redirect('/');
            }
        }

        return back()->withErrors('password')->with('failed', 'Email atau Password Salah !!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function showregisterform()
    {
        return view('register');
    }

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8',
    //     ]);

    //     // Generate OTP
    //     $otp = mt_rand(100000, 999999);

    //     // Simpan OTP dalam session
    //     Session::put('otp', $otp);

    //     // Kirim OTP ke nomor telepon pengguna (misalnya melalui layanan WhatsApp)

    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->status = 0; // Menyimpan status akun, misalnya 0 untuk belum diverifikasi
    //     $user->save();

    //     Auth::login($user);

    //     return redirect()->route('otp');
    // }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $nomor= $request->nomor;

        // Generate OTP
        $otp = mt_rand(100000, 999999);

        // Simpan OTP dalam session
        Session::put('otp', $otp);

        // Kirim OTP ke nomor telepon pengguna (misalnya melalui layanan WhatsApp)
        $apiKey = "b5991fddbad1729718b2fc7f86cff354c8ffe9bb";
        $recipient = $nomor; // atau $recipient = "Group Chat Name";
        $message = "JANGAN MEMBERITAHU KODE RAHASIA INI KE SIAPAPUN. WASPADA TERHADAP KASUS PENIPUAN! Kode Verifikasi untuk daftar di website : " . $otp;

        $url = 'https://starsender.online/api/sendText?message=' . rawurlencode($message) . '&tujuan=' . rawurlencode($recipient . '@s.whatsapp.net');

        $response = Http::withHeaders(['apikey' => $apiKey])->post($url);

        if ($response->successful()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->nomor = $request->nomor;
            $user->password = Hash::make($request->password);
            $user->status = 0; // Menyimpan status akun, misalnya 0 untuk belum diverifikasi
            $user->level = 2; // akses pelamar
            $user->save();

            Auth::login($user);

            return redirect()->route('otp');
        } else {
            return back()->withInput()->withErrors(['message' => 'Failed to send OTP']);
        }
    }

}
