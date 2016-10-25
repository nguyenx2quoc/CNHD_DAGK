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
		$soghedadat = dat_choModel::Select('So_ghe')->Where('Ma',$id)->get()->toArray();
		$chuyenbaycapnhat = chi_tiet_chuyen_bayModel::Select('ma_chuyen_bay','hang','muc')->where('ma_dat_cho',$id)->get()->toArray();
		
		$i = 0;
		for (; $i < count($chuyenbaycapnhat); $i++)
		{
			$soghecu = chuyen_bayModel::Select('So_luong_ghe')->whereRaw('Ma = ? AND Hang = ? AND Muc = ?',[$chuyenbaycapnhat[$i]['ma_chuyen_bay'],$chuyenbaycapnhat[$i]['hang'],$chuyenbaycapnhat[$i]['muc']])->get()->toArray();
			$somoi = (int)$soghecu[0]['So_luong_ghe'] - (int)$soghedadat[0]['So_ghe'];
			$capnhatghe = chuyen_bayModel::whereRaw('Ma = ? AND Hang = ? AND Muc = ?',[$chuyenbaycapnhat[$i]['ma_chuyen_bay'],$chuyenbaycapnhat[$i]['hang'],$chuyenbaycapnhat[$i]['muc']])->update(array('So_luong_ghe'=>$somoi));
		}
		return true;
	}	
}
class Thong_tin{
	public $tongtien="";
	public $changbay = array();
}

