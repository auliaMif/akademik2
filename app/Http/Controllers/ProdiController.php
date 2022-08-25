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
            $Prodi = Prodi::with(['prodi'])->get();
            return isset($Prodi->datatable) && $Prodi->datatable == 'true' ? DataTables::of($Prodi)->make(true) : response()->json([
                'status' => true,
                'data' => $Prodi
            ]);
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