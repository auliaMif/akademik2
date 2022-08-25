<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class ProdiController extends Controller
{
    public function index(){
        try {
            return DataTables::of(Prodi::query())->make();
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        
        }
        // $Prodi=Prodi::all();

        // $data=['prodi'=>$Prodi];

        // return $data;
    }

    public function create(Request $request){
        $Prodi=new Prodi();
        $Prodi->Nama_Prodi=$request->Nama_Prodi;
        $Prodi->save();

        return response()->json([
            'message' => 'Data telah ditambahkan'
        ]);
    }

    public function update (Request $request, $id){
        $Prodi=Prodi::Find($id);
        $Prodi->Nama_Prodi=$request->Nama_Prodi;

        $Prodi->save();

        return response()->json([
            'message' => 'Data telah diupdate'
        ]);
    }

    public function delete($id){
        $Prodi=Prodi::Find($id);
        $Prodi->delete();

        return response()->json([
            'message' => 'Data telah dihapus'
        ]);
    }

    public function detail($id){
        $Prodi=Prodi::Find($id);

        return response()->json([
            'status' => 'success',
            'data' => $Prodi
        ]);
    }
}