<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LokasiKerja;
use App\UnitKerja;
use DataTables;
use DB;

class UnitKerjaController extends Controller
{
    public function index()
    {
    	$elolokasikerja = LokasiKerja::all();

    	return view('UnitKerja.index', compact('elolokasikerja'));
    }

    public function data(DataTables $datatables)
    {
    	$elounitkerja 	= DB::table('unit_kerja')
    						->join('lokasi_kerja', 'unit_kerja.lokasi_kerja_id', '=', 'lokasi_kerja.lokasi_kerja_id')
    						->select('unit_kerja.*', 'lokasi_kerja.lokasi_kerja_id', 'lokasi_kerja.lokasi_kerja_nama')
    						->get();

    	return DataTables::of($elounitkerja)
                ->addColumn('action', function($query){
                    return '<center><a onclick="edit('.$query->id.')" class="edit_button btn btn-sm btn-warning btn-circle" id="edit">Ubah</a> <a onclick="delete_data('.$query->id.')" class="btn btn-sm btn-danger">Hapus</a></center>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function singledata($id)
    {
    	return $elounitkerja = UnitKerja::where('id', '=', $id)->firstOrFail();
    }

    public function store(Request $request)
    {
    	$unit_kerja_id 		= $request->unit_kerja_id;
    	$unit_kerja_nama	= $request->unit_kerja_nama;
    	$lokasi_kerja_id 	= $request->lokasi_kerja_id;

    	return $elounitkerja = UnitKerja::create(['unit_kerja_id' => $unit_kerja_id, 'unit_kerja_nama' => $unit_kerja_nama, 'lokasi_kerja_id' => $lokasi_kerja_id]);
    }

    public function update(Request $request)
    {
    	$id 				= $request->id;
    	$unit_kerja_id 		= $request->unit_kerja_id;
    	$unit_kerja_nama 	= $request->unit_kerja_nama;
    	$lokasi_kerja_id 	= $request->lokasi_kerja_id;

    	return $elounitkerja = UnitKerja::where('id', $id)->update(['unit_kerja_id' => $unit_kerja_id, 'unit_kerja_nama' => $unit_kerja_nama, 'lokasi_kerja_id' => $lokasi_kerja_id]);
    }

    public function destroy($id)
    {
    	return $elounitkerja = UnitKerja::destroy($id);
    }
}
