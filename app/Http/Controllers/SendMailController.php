<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SendMailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>"required|max:255",
            'email'=>"required"
        ])->validate();

        $name = $request->input('name');
        $email = $request->input('email');

        $user = new \stdClass();
        $user->name = $name;
        $user->email = $email;
        
        Mail::to($user->email)->send(new SendMailUser($user));
    }
}
