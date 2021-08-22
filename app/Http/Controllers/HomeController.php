<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caroulsel;
use App\Models\Deposition;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $caroulsels = Caroulsel::all();
        $depositions = Deposition::all();

        return view('home',compact('caroulsels','depositions'));
    }
}
