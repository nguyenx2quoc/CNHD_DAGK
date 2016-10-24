<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class chang_bayController extends Controller {
	public function index(Request $request){
		if ($request->has('data'))
			return $this->them_chuyen_bay();
		return $this->xem_danh_sach_chuyen_bay();
	}

	public function them_chuyen_bay(){
		echo "hello";
		$data = new chuyen_bayModel();
		$data->Ma = "A";
		$data->Noi_di="B";
		$data->Noi_den="C";
		$data->Ngay="2016-10-22";
		$data->Gio = "09:00:00";
		$data->Hang="Y";
		$data->Muc="C";
		$data->So_luong_ghe="50";
		$data->Gia="1000000";
		$data->save();
	}

	public function xem_danh_sach_chuyen_bay(){
		$fromdata = chuyen_bayModel::all()->tojSon();
		return $fromdata;
	}
}

