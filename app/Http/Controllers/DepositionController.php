<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposition;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class DepositionController extends Controller
{
    public function index()
    {   
        $depositions = Deposition::all();
        return view('dash.depositions',compact('depositions'));
    }
    public function delete($id){
        $deposition = Deposition::find($id);
        File::delete(public_path($deposition->photo_url));
        $deposition->delete();

        return redirect()->route('depositions');
    }
    public function add(){
        return view('dash.depositions-add');
    }
    public function store(Request $req){
        $validator = Validator::make($req->all(),[
            'name'=>"required|max:255",
            'description'=>"required",
            'photo'=>'required|mimes:jpg,png|dimensions:min_width=500,min_height=500|max:2048'
        ],[
            'required'=>'O :attribute e obrigatorio',
            'mimes'=>"Formato de arquivo invalido",
            'dimensions'=>"Dimensão de imagem e no minimo 500x500 e a maxima e 1300x1300",
            "max"=>"imagem muito grande"
        ])->validate();

        if($req->file()){
            $filename = time().'_'.$req->file('photo')->getClientOriginalName();
            $path = $req->file('photo')->storeAs('uploads/depositions',$filename,'public');

            $deposition = new Deposition();

            $deposition->name = $req->input('name');
            $deposition->description = $req->input('description');
            $deposition->photo_url = '/storage/'.$path;

            $deposition->save();

            return redirect()->route('depositions');
        }
    }
    public function show($id){
        $deposition = Deposition::find($id);
        return view('dash.depositions-show',compact('deposition'));
    }
    public function edit(Request $req,$id){
        $validator = Validator::make($req->all(),[
            'name'=>"required|max:255",
            'description'=>"required",
            'photo'=>'mimes:jpg,png|dimensions:min_width=500,min_height=500|max:2048'
        ],[
            'required'=>'O :attribute e obrigatorio',
            'mimes'=>"Formato de arquivo invalido",
            'dimensions'=>"Dimensão de imagem e no minimo 500x500",
            "max"=>"imagem muito grande"
        ])->validate();

        $deposition = Deposition::find($id);

        if($deposition){
            $deposition->name = $req->input('name');
            $deposition->description = $req->input('description');
            $deposition->photo_url = $deposition->photo_url;

            if($req->hasFile('photo')){
                File::delete(public_path($deposition->photo_url));
                $filename = time().'_'.$req->file('photo')->getClientOriginalName();
                $path = $req->file('photo')->storeAs('uploads/depositions',$filename,'public');
                $deposition->photo_url = '/storage/'.$path;
            }

            $deposition->save();

            return redirect()->route('depositions');
        }
    }
}
