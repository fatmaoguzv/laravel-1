<?php

namespace App\Http\Controllers;

use App\Models\Veri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Uye;

class Kullanici extends Controller
{
    public function girisYap()
    {
        return view('login');
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
        $veriler = $request->all();

        if ($veriler['parola'] !== $veriler['parolatekrar']) {
            return "Parolalar eşleşmiyor!";
        }

        $uye = new Uye();
        $uye->ad = $veriler['ad'];
        $uye->soyad = $veriler['soyad'];
        $uye->e_posta = $veriler['e_posta'];
        $uye->parola = Hash::make($veriler['parola']);
        $uye->yetki = 0;
        $uye->save();

        return "Üye kaydı başarılı.";
    }
}

