<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LokasiKerja;
use DataTables;

class LokasiKerjaController extends Controller
{
    public function index()
    {
    	$elolokasikerja = LokasiKerja::paginate(5);

    	return view('LokasiKerja.index', compact('elolokasikerja'));
    }

    public function data(DataTables $datatables)
    {
        $elolokasikerja = LokasiKerja::all();

        return DataTables::of($elolokasikerja)
                ->addColumn('action', function($query){
                    return '<center><a onclick="edit('.$query->id.')" class="edit_button btn btn-sm btn-warning btn-circle" id="edit">Ubah</a> <a onclick="delete_data('.$query->id.')" class="btn btn-sm btn-danger">Hapus</a></center>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function singledata($id)
    {
    	return $elolokasikerja = LokasiKerja::where('id', '=', $id)->firstOrFail();
    }

    public function store(Request $request)
    {
    	$lokasi_kerja_id 	= $request->lokasi_kerja_id;
    	$lokasi_kerja_nama 	= $request->lokasi_kerja_nama;

        $checkdata = LokasiKerja::where('lokasi_kerja_nama', '=', $lokasi_kerja_nama)->first();

        if($lokasi_kerja_id == NULL && $lokasi_kerja_nama == NULL || $lokasi_kerja_id == NULL || $lokasi_kerja_nama == NULL){
            return response()->json('Validasi', 200);
        }else{
            if(!empty($checkdata)){
                return response()->json('Failed', 200);
            }else{            
                $elolokasikerja = LokasiKerja::create(['lokasi_kerja_id' => $lokasi_kerja_id, 'lokasi_kerja_nama' => $lokasi_kerja_nama]);

                return response()->json('Success', 200);
            }
        }
    }

    public function update(Request $request)
    {
    	$id 				= $request->id;
    	$lokasi_kerja_id 	= $request->lokasi_kerja_id;
    	$lokasi_kerja_nama 	= $request->lokasi_kerja_nama;

    	return $elolokasikerja = LokasiKerja::where('id', $id)->update(['lokasi_kerja_id' => $lokasi_kerja_id, 'lokasi_kerja_nama' => $lokasi_kerja_nama]);
    }

    public function destroy($id)
    {
    	return $elolokasikerja = LokasiKerja::destroy($id);
    }
}
