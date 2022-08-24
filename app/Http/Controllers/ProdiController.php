<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(){
        $Prodi=Prodi::all();

        $data=['prodi'=>$Prodi];

        return $data;
    }

    public function create(Request $request){
        $Prodi=new Prodi();
        $Prodi->Nama_Prodi=$request->Nama_Prodi;
        $Prodi->save();

        return "Data Tersimpan";
    }

    public function update (Request $request, $id){
        $Prodi=Prodi::Find($id);
        $Prodi->Nama_Prodi=$request->Nama_Prodi;

        $Prodi->save();

        return "Data Terupdate";
    }

    public function delete($id){
        $Prodi=Prodi::Find($id);
        $Prodi->delete();

        return "Data Terhapus";
    }

    public function detail($id){
        $Prodi=Prodi::Find($id);

        return $Prodi;
    }
}