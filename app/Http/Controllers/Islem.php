<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Islem extends Controller
{
    public function topla($sayi1, $sayi2)
    {
        return view('total', [
            'sayi1' => $sayi1,
            'sayi2' => $sayi2
        ]);
    }
}
