<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class hanh_khachController extends Controller {

	public function index(Request $request){		
	}

	public function them_hanh_khach(Request $request){
		$songuoi = $request->songuoi;
		$ma = $request->madatcho;
		$i = 0;
		for (; $i < $songuoi; $i++)
		{
			$data = new hanh_khachModel;
			$data->ma_dat_cho = $ma;
			$data->danh_xung = $request->{'danhxung'.$i};
			$data->ho = $request->{'ho'.$i};
			$data->ten = $request->{'ten'.$i};
			$data->save();
		}
	}

	public function xem_danh_sach_hanh_khach(){
		$fromdata = hanh_khachModel::all()->tojSon();
		return $fromdata;
	}
}

