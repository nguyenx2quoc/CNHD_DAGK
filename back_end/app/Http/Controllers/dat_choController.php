<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class dat_choController extends Controller {
	public function index(Request $request){	
		if ($request->has('ma_chuyen_bay_ve'))
			return $this->make_id_2($request);
		return $this->make_id_1();
			
	}

	public function make_id_1(){
		$id_booking = "";
		 	do{
		 		$isexist = false;
		 		$id_booking = $this->make_auto_id();
		 		$fromdata = dat_choModel::all()-> toArray();
		 		$i = 0;
		 		for (;$i < count($fromdata); $i ++){
		 			if ($id_booking == $fromdata[$i]['Ma'])
		 			{
		 				$isexist = true;
		 				break;
		 			}
		 		}
		 	}
		 	while ($isexist == true);
		 	$datcho = new dat_choModel;
		 	$datcho->Ma = $id_booking;
		 	$datcho->Thoi_gian_dat = date("Y-m-d H:i:s");
		 	$datcho->Tong_tien = "4000000";
		 	$datcho->Trang_thai = "0";
		 	$datcho->save();
		 	$chitiet = new chi_tiet_chuyen_bayModel();
		 	$chitiet->ma_dat_cho = $id_booking;
		 	$chitiet->ma_chuyen_bay = "AB123";
		 	$chitiet->ngay = date("Y-m-d");
		 	$chitiet->hang = "Y";
		 	$chitiet->muc = "C";
		 	$chitiet->loai = "di";
		 	$chitiet->so_ghe = "4";
		 	$chitiet->save();
		 	return $id_booking;
	}

	public function make_id_2(Request $request){
		$id_booking = "";
		 	do{
		 		$isexist = false;
		 		$id_booking = $this->make_auto_id();
		 		$fromdata = dat_choModel::all()-> toArray();
		 		$i = 0;
		 		for (;$i < count($fromdata); $i ++){
		 			if ($id_booking == $fromdata[$i]['Ma'])
		 			{
		 				$isexist = true;
		 				break;
		 			}
		 		}
		 	}
		 	while ($isexist == true);
		 	$datcho = new dat_choModel;
		 	$datcho->Ma = $id_booking;
		 	$datcho->Thoi_gian_dat = date("Y-m-d H:i:s");
		 	$datcho->Tong_tien = "4000000";
		 	$datcho->Trang_thai = "0";
		 	$datcho->save();
		 	$chitiet = new chi_tiet_chuyen_bayModel();
		 	$chitiet->ma_dat_cho = $id_booking;
		 	$chitiet->ma_chuyen_bay = "AB123";
		 	$chitiet->ngay = date("Y-m-d");
		 	$chitiet->hang = "Y";
		 	$chitiet->muc = "C";
		 	$chitiet->loai = "di";
		 	$chitiet->so_ghe = "4";
		 	$chitiet->save();
		 	$chitiet2 = new chi_tiet_chuyen_bayModel();
		 	$chitiet2->ma_dat_cho = $id_booking;
		 	$chitiet2->ma_chuyen_bay = $request->ma_chuyen_bay_ve;
		 	$chitiet2->ngay = date("Y-m-d");
		 	$chitiet2->hang = "Y";
		 	$chitiet2->muc = "C";
		 	$chitiet2->loai = "ve";
		 	$chitiet2->so_ghe = "4";
		 	$chitiet2->save();
		 	return $id_booking;
	}

	private function make_auto_id(){
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    		$count = mb_strlen($chars);

    		for ($i = 0, $result = ''; $i < 6; $i++) {
        		$index = rand(0, $count - 1);
        		$result .= mb_substr($chars, $index, 1);
    		}

    		return $result;
	}	
}

