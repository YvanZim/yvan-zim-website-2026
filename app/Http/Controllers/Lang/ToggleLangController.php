<?php

namespace App\Http\Controllers\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToggleLangController extends Controller
{
    public function __invoke(Request $request, $lang){
        $request->session()->put('locale', $lang);
        return 1;
    }
}
