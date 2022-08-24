<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index(){
        $Jurusan=Jurusan::all();

        $data=['jurusan'=>$Jurusan];

        return $data;
    }

    public function create(Request $request){
        $Jurusan=new Jurusan();
        $Jurusan->Nama_Jurusan=$request->Nama_Jurusan;
        $Jurusan->save();

        return "Data Tersimpan";
    }

    public function update (Request $request, $id){
        $Jurusan=Jurusan::Find($id);
        $Jurusan->Nama_Jurusan=$request->Nama_Jurusan;
        $Jurusan->save();

        return "Data Terupdate";
    }

    public function delete($id){
        $Jurusan=Jurusan::Find($id);
        $Jurusan->delete();

        return "Data Terhapus";
    }

    public function detail($id){
        $Jurusan=Jurusan::Find($id);

        return $Jurusan;
    }
}