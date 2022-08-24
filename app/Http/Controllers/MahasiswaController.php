<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $Mahasiswa=Mahasiswa::all();

        $data=['mahasiswa'=>$Mahasiswa];

        return $data;
    }

    public function create(Request $request){
        $Mahasiswa=new Mahasiswa();
        $Mahasiswa->NIM=$request->NIM;
        $Mahasiswa->Nama=$request->Nama;
        $Mahasiswa->Alamat=$request->Alamat;
        $Mahasiswa->save();

        return "Data Tersimpan";
    }

    public function update (Request $request, $id){
        $Mahasiswa=Mahasiswa::Find($id);
        $Mahasiswa->NIM=$request->NIM;
        $Mahasiswa->Nama=$request->Nama;
        $Mahasiswa->Alamat=$request->Alamat;
        $Mahasiswa->save();

        return "Data Terupdate";
    }

    public function delete($id){
        $Mahasiswa=Mahasiswa::Find($id);
        $Mahasiswa->delete();

        return "Data Terhapus";
    }

    public function detail($id){
        $Mahasiswa=Mahasiswa::Find($id);

        return $Mahasiswa;
    }
}