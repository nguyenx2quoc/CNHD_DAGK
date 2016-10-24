<?php 

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ma_dat_cho2Controller extends Controller {
	public function index(Request $request){	
		$abc = $request->all();
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
		 	$datcho->Thoi_gian_dat = date("Y-m-d H:i:s",strtotime($request->thoigiandatcho));
		 	$datcho->Tong_tien = $request->tongtien;
		 	$datcho->Trang_thai = "0";
		 	$datcho->save();
		 	$chitiet = new chi_tiet_chuyen_bayModel();
		 	$chitiet->ma_dat_cho = $id_booking;
		 	$chitiet->ma_chuyen_bay = $request->machuyenbay;
		 	$chitiet->ngay = date("Y-m-d",strtotime($request->ngaydi));
		 	$chitiet->gio = date("H:i:s",strtotime($request->giobay));
		 	$chitiet->hang = $request->hang;
		 	$chitiet->muc = $request->muc;
		 	$chitiet->loai = $request->loai;
		 	$chitiet->so_ghe = $request->soghe;
		 	$chitiet->noi_di = $request->noidi;
		 	$chitiet->noi_den = $request->noiden;
		 	$chitiet->save();
		 	$chitiet2 = new chi_tiet_chuyen_bayModel();
		 	$chitiet2->ma_dat_cho = $id_booking;
		 	$chitiet2->ma_chuyen_bay = $request->machuyenbay2;
		 	$chitiet2->ngay = date("Y-m-d",strtotime($request->ngaydi2));
		 	$chitiet2->gio = date("H:i:s",strtotime($request->giobay2));
		 	$chitiet2->hang = $request->hang2;
		 	$chitiet2->muc = $request->muc2;
		 	$chitiet2->loai = $request->loai2;
		 	$chitiet2->so_ghe = $request->soghe2;
		 	$chitiet2->noi_di = $request->noidi2;
		 	$chitiet2->noi_den = $request->noiden2;
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


