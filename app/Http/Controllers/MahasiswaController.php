<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index(){
        try {
            return DataTables::of(Mahasiswa::query())->make();
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        
        }
        // $Mahasiswa=Mahasiswa::all();

        // $data=['mahasiswa'=>$Mahasiswa];

        // return $data;
    }

    public function create(Request $request){
        $Mahasiswa=new Mahasiswa();
        $Mahasiswa->NIM=$request->NIM;
        $Mahasiswa->Nama=$request->Nama;
        $Mahasiswa->Alamat=$request->Alamat;
        $Mahasiswa->save();

        return response()->json([
            'message' => 'Data telah ditambahkan'
        ]);
    }

    public function update (Request $request, $id){
        $Mahasiswa=Mahasiswa::Find($id);
        $Mahasiswa->NIM=$request->NIM;
        $Mahasiswa->Nama=$request->Nama;
        $Mahasiswa->Alamat=$request->Alamat;
        $Mahasiswa->save();

        return response()->json([
            'message' => 'Data telah diupdate'
        ]);
    }

    public function delete($id){
        $Mahasiswa=Mahasiswa::Find($id);
        $Mahasiswa->delete();

        return response()->json([
            'message' => 'Data telah dihapus'
        ]);
    }

    public function detail($id){
        $Mahasiswa=Mahasiswa::Find($id);

        return response()->json([
            'status' => 'success',
            'data' => $Mahasiswa
        ]);
    }
}