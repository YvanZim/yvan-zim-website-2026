<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowHtmlController extends Controller
{

    public function __invoke(String $slug)
    {
        $path = resource_path('views/static/' . $slug . '.blade.php');

        if (file_exists($path)) {
            return view('static.' . $slug);
        } else {
            abort(404);
        }
    }
}
