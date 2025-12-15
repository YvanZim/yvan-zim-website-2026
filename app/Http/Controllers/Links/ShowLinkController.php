<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowLinkController extends Controller
{
    public function __invoke(Request $request, $lang = null)
    {
        return view('links.index');
    }
}
