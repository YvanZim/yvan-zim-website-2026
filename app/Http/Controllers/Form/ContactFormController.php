<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\EnquireMail;

class ContactFormController extends Controller
{
     public function __invoke(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Content
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $date = $request->input('date');
        $location = $request->input('location');
        $body = $request->input('message');

        // Send email
        Mail::to( env('ADMIN_MAIL') )->send( new EnquireMail($name, $email, $phone, $location, $date, $body) );

        return redirect()->back()->with('success', __('forms.success'));

    }   //
}
