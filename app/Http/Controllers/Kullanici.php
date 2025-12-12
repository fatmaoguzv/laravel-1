<?php

namespace App\Http\Controllers;

use App\Models\Veri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Uye;

class Kullanici extends Controller
{
    public function girisYap()
    {
        return view('login');
    }

    public function girisYapIslemi(Request $request)
    {
        $credentials = $request->validate([
            'e_posta' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log the user in
        // Note: 'password' key in $credentials maps to 'parola' column in database model automatically if we configure it,
        // but since standard Auth expects 'password', we might need to adjust.
        // Let's check how Auth attempt works. It expects 'email' and 'password' keys usually.
        // Unusually, our column is 'parola'.
        // We need to manually match keys if they differ.
        if (Auth::attempt(['e_posta' => $credentials['e_posta'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Girdiğiniz bilgiler hatalı.',
        ])->onlyInput('e_posta');
    }

    public function uyeOl()
    {
        return view('register');
    }

    public function magazaGoster()
    {
        return view('shop');
    }

    public function anasayfaGoster()
    {
        // $veriler = Veri::all(); // Tüm kayıtları çek
        $veriler = Veri::latest()->get();
        return view('index', compact('veriler')); // Bu sayfaya Veri modelindeki tüm kayıtları gönder
    }

    public function bilgilerimGoster()
    {
        return view('bilgilerim');
    }

    public function uyeKaydet(Request $request)
    {
        $request->validate([
            'ad' => 'required',
            'soyad' => 'required',
            'e_posta' => 'required|email|unique:uyeler,e_posta',
            'parola' => 'required|min:6',
            'parolatekrar' => 'required|same:parola',
        ], [
            'e_posta.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'parolatekrar.same' => 'Parolalar eşleşmiyor.',
            'parola.min' => 'Parola en az 6 karakter olmalıdır.',
        ]);

        $uye = new Uye();
        $uye->ad = $request->ad;
        $uye->soyad = $request->soyad;
        $uye->e_posta = $request->e_posta;
        $uye->parola = Hash::make($request->parola);
        $uye->yetki = 0;
        $uye->save();

        return redirect('/giris-yap')->with('mesaj', 'Üye kaydı başarılı. Şimdi giriş yapabilirsiniz.');
    }
}

