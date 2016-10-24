<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class hanh_khachController extends Controller {

	public function index(Request $request){		
			if ($request->has('data'))
			return $this->them_hanh_khach();
		return $this->xem_danh_sach_hanh_khach();
	}

	public function them_hanh_khach(){
		echo "hello";
		$data = new hanh_khachModel();
		$data->ma_dat_cho = "A";
		$data->danh_xung="B";
		$data->ho="C";
		$data->ten="D";
		$data->save();
	}

	public function xem_danh_sach_hanh_khach(){
		$fromdata = hanh_khachModel::all()->tojSon();
		return $fromdata;
	}
}

