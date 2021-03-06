<?php 

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ma_dat_cho1Controller extends Controller {
	public function index(Request $request){	
		$data = $request->all();
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
		 	$datcho->So_ghe = $request->soghe;
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
		 	$data = new MaDatCho();
		 	$data->ma_dat_cho = $id_booking ;
		 	return json_encode($data);
			
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

	public function xem_ma_dat_cho(){
		$input = Input::only('ma-dat-cho');
		$ma = $input['ma-dat-cho'];
		$thongtin = chi_tiet_chuyen_bayModel::where('ma_dat_cho',$ma)->get()->toArray();
		$tongtien = dat_choModel::Select('Tong_tien')->where('Ma',$ma)->get();
		$data = new Thong_tin;
		$data->tongtien = $tongtien[0]->Tong_tien;
		$data->changbay = $thongtin;
		return json_encode($data);
	}

	public function hoan_tat_dat_cho(Request $request){
		if ($request->has('data')){
		$id = $request->data;
		$chodadat = dat_choModel::where('Ma',$id)->update(array('Trang_thai'=>"1"));
		echo "Thanh cong";
		}
		else
		echo "fail";
	}	
}
class Thong_tin{
	public $tongtien="";
	public $changbay = array();
}
class MaDatCho{
	public $ma_dat_cho;
}


