<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caroulsel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CaroulselController extends Controller
{
    public function index(){
        $caroulsels = Caroulsel::all();
        return view('dash.caroulsels',compact('caroulsels'));
    }
    public function add(){
        return view('dash.caroulsel-add');
    }
    public function store(Request $req){
        $validator = Validator::make($req->all(),[
            'image'=>'required|mimes:jpg,png|dimensions:min_width=1300,min_height=220|max:4000'
        ],[
            'required'=>"Por favor adicione uma imagem",
            'mimes'=>"Formato da imagem invalida, validos (jpeg,jpg,png)",
            'dimensions'=>"Dimensão invalida o minimo é 1300x220",
            "max"=>"Imagem muito pesada"
        ])->validate();

        if($req->file()){
            $filename = time().'_'.$req->file('image')->getClientOriginalName();
            $path = $req->file('image')->storeAs('uploads/caroulsels',$filename,'public');
            

            $caroulsel = new Caroulsel();
            $caroulsel->photo_url = '/storage/'.$path;

            $exists = Caroulsel::count();
            if(intval($exists)==0){
                $caroulsel->status = 'active';
            }else{
                $caroulsel->status = 'none';
            }

            $caroulsel->save();

            return redirect()->route('caroulsels');
        }
    }
    public function delete($id){
        $caroulsel = Caroulsel::find($id);
        File::delete(public_path($caroulsel->photo_url));
        $caroulsel->delete();

        return redirect()->route('caroulsels');
    }
    public function changeStatus($id){
        Caroulsel::where('status','active')->update([
            'status'=>"none"
        ]);

        $caroulsel = Caroulsel::find($id);
        $caroulsel->status="active";
        $caroulsel->save();
    }
}
