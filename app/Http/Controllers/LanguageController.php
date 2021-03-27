<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    public function set_language($locale)
    {
        Cookie::queue(Cookie::make('locale',$locale,3600));

        return back();
    }
}
