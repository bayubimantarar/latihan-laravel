<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index()
	{
		return view('Kalkulator.index');
	}

	public function process(Request $request)
	{
		$angkapertama 	= $request->angkapertama;
		$angkakedua 	= $request->angkakedua;
		$method 		= $request->method;

		if($method == "Tambah"){
			$tambah = $angkapertama + $angkakedua;

			return $tambah;
		}else if($method == "Kurang"){
			$kurang = $angkapertama - $angkakedua;

			return $kurang;
		}else if($method == "Kali"){
			$kali = $angkapertama * $angkakedua;

			return $kali;
		}else if($method == "Bagi"){
			if($angkapertama == 0 || $angkakedua == 0){
				return 'Pembagi tidak boleh nol';
			}else{
				$bagi = $angkapertama / $angkakedua;

				return $bagi;
			}
		}else{
			return "Proses tidak ada";
		}
	}
}
