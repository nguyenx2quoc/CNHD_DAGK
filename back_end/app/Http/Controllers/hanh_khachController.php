<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class hanh_khachController extends Controller {

	public function index(Request $request){		
	}

	public function them_hanh_khach(Request $request){
		$ma = $request->madatcho;
		
		if ($request->islienlac == "true")
		{
		$dienthoai = $request->dienthoai;
		$email1 = $request->email1;
		$email2 = $request->email2;
		$danhxungll = $request->danhxung;
		$holl = $request->ho;
		$tenll = $request->ten;
		$dienthongtin = dat_choModel::Where('Ma',$ma)->update(array('Dien_thoai'=>$dienthoai,'Email1'=>$email1,'Email2'=>$email2,'Danh_xung'=>$danhxungll,'Ho'=>$holl,'Ten'=>$tenll));
		}
		else {
			$data = new hanh_khachModel;
			$data->ma_dat_cho = $ma;
			$data->danh_xung = $request->danhxung;
			$data->ho = $request->ho;
			$data->ten = $request->ten;
			$data->save();	
			$islienlac = $request->islienlac;
		}
	}

	public function xem_danh_sach_hanh_khach(){
		$data = new Trave();
		$fromdata = hanh_khachModel::all()->tojSon();
		$data->trave = $fromdata;
		return json_encode($data);;
	}
}
class Trave{
	public $trave;
}

