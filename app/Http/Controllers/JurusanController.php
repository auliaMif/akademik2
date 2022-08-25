<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class JurusanController extends Controller
{
    public function index(){
        try {
            return DataTables::of(Jurusan::query())->make();
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        
        }
        // $Jurusan=Jurusan::all();

        // $data=['jurusan'=>$Jurusan];

        // return $data;
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