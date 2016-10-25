<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class chang_bayController extends Controller {
	public function index(Request $request){
		$data = new Trave();
		$fromdata = chuyen_bayModel::all()->toArray();
		$data->trave = $fromdata;
		return json_encode($data);
	}

	public function them_chuyen_bay(Request $request){
		$data = new chuyen_bayModel();
		$data->Ma = $request->ma;
		$data->Noi_di=$request->noidi;
		$data->Noi_den=$request->noiden;
		$data->Ngay=$request->ngay;
		$data->Gio = $request->gio;
		$data->Hang=$request->hang;
		$data->Muc=$request->muc;
		$data->So_luong_ghe=$request->soghe;
		$data->Gia=$request->gia;
		$data->save();
	}
}
class Trave{
	public $trave;
}

