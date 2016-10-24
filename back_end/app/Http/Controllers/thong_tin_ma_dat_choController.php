<?php 

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class thong_tin_ma_dat_choController extends Controller {
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
		$id = $request->madatcho;
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

