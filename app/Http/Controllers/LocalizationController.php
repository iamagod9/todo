<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function setLang($lang)
    {
        session()->put('locale', $lang);
        return back();
    }
}
