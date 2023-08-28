<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class Notif extends Controller
{
    public function sendWhatsApp(Request $request)
    {

        $otp = mt_rand(100000, 999999);
        $apiKey = "b5991fddbad1729718b2fc7f86cff354c8ffe9bb";
        $recipient = "083820073252"; // atau $recipient = "Group Chat Name";
        $message = "JANGAN MEMBERITAHU KODE RAHASIA INI KE SIAPAPUN. WASPADA TERHADAP KASUS PENIPUAN! Kode Verifikasi untuk daftar di website : ".$otp;

        $url = 'https://starsender.online/api/sendText?message=' . rawurlencode($message) . '&tujuan=' . rawurlencode($recipient . '@s.whatsapp.net');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'apikey: ' . $apiKey
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
    public function otp()
    {

    $user= Auth::user();
      return view('auth.otp',compact('user'));
    }
    public function verifyOtp(Request $request)
    {
        $inputOtp = $request->input('otp'); // Ambil nilai OTP yang diinput oleh pengguna
        $storedOtp = Session::get('otp'); // Ambil nilai OTP yang tersimpan dalam sesi

        if ($inputOtp == $storedOtp) {
            // OTP cocok, lakukan tindakan selanjutnya, seperti verifikasi akun
            // Misalnya, tandai status akun sebagai terverifikasi (status = 1)
            $user = Auth::user(); // Retrieve the authenticated user
            $user->status = 1; // Update the user's status

            $user->save(); // Save the changes

            return redirect()->route('index')->with('success', 'OTP verification successful');
        } else {
            // OTP tidak cocok, kembalikan pengguna ke halaman verifikasi dengan pesan kesalahan
            return back()->withInput()->withErrors(['otp' => 'Kode yang anda masukan salah, silahkan cek kembali']);
        }
    }
    public function resendOtp(Request $request)
{
    $nomor = auth::user()->nomor;
    // Generate new OTP
    $newOtp = mt_rand(100000, 999999);

    // Update the OTP in the session
    Session::put('otp', $newOtp);

    $apiKey = "b5991fddbad1729718b2fc7f86cff354c8ffe9bb";
    $recipient = $nomor; // atau $recipient = "Group Chat Name";
    $message = "JANGAN MEMBERITAHU KODE RAHASIA INI KE SIAPAPUN. WASPADA TERHADAP KASUS PENIPUAN! Kode Verifikasi untuk daftar di website : " . $newOtp;

    $url = 'https://starsender.online/api/sendText?message=' . rawurlencode($message) . '&tujuan=' . rawurlencode($recipient . '@s.whatsapp.net');

    $response = Http::withHeaders(['apikey' => $apiKey])->post($url);
    return redirect()->route('otp')->with('success', 'OTP has been resent');
}

}
