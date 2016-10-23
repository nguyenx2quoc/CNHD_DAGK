<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Request;
class danh_sach_chuyen_bayController extends Controller {

	public function index(Request $request){		
		if(Input::has('ngay-ve'))
      	  	return $this->get_chuyen_bay_hai_chieu();
      	return $this->get_chuyen_bay_mot_chieu(); 
		
    	
	}

	public function get_chuyen_bay_mot_chieu(){
		$input = Input::only('san-bay-di','san-bay-den','ngay-di','so-ghe');
		$sanbaydi = $input['san-bay-di'];
		$sanbayden = $input['san-bay-den'];
		$ngaydi = $input['ngay-di'];
		$soghe = $input['so-ghe'];
		$fromdata = chuyen_bayModel::whereRaw('Noi_di = ? AND Noi_den = ? AND Ngay = ? AND So_luong_ghe >=?',[$sanbaydi,$sanbayden,$ngaydi,$soghe])->get()->toArray();
		$content = $this->encode_chuyenbay1chieu_json($fromdata);
		return response($content, 200)->header('Content-Type', 'application/json');
	}

	private function encode_chuyenbay1chieu_json(Array $a){
		$returndata = array();
		$i = 0;
		for (; $i < count($a); $i++)
		{
			$isexist = false;
			$tempcb = new ChuyenBay();
			$tempcb->ma = $a[$i]['Ma'];
			$tempcb->noidi = $a[$i]['Noi_di'];
			$tempcb->noiden = $a[$i]['Noi_den'];
			$tempcb->ngaydi = $a[$i]['Ngay'];
			$tempcb->gio = $a[$i]['Gio'];
			if ($i==0)
			{
				array_push($returndata, $tempcb);
			}
			else
			{
				$j = 0;
				for (; $j < count($returndata); $j++ )
				{
					if ($returndata[$j]->ma == $tempcb->ma)
						{
							$isexist = true;
							break;
						}
				}
				if ($isexist == false)
				{
					array_push($returndata, $tempcb);
				}
			}
		}
		$i = 0;
		for (; $i < count($a); $i++){
			$tempvmb = new VeMayBay();
			$tempvmb->hang = $a[$i]['Hang'];
			$tempvmb->muc = $a[$i]['Muc'];
			$tempvmb->gia = $a[$i]['Gia'];
			$j = 0;
			for (;$j < count($returndata); $j++)
			{
				if ($returndata[$j]->ma == $a[$i]['Ma'])
					array_push ($returndata[$j]->ve, $tempvmb);
			}
		}
		return json_encode($returndata);
	}

	public function get_chuyen_bay_hai_chieu(){
		$input = Input::only('san-bay-di','san-bay-den','ngay-di','ngay-ve','so-ghe');
		$sanbaydi = $input['san-bay-di'];
		$sanbayden = $input['san-bay-den'];
		$ngaydi = $input['ngay-di'];
		$soghe = $input['so-ghe'];
		$ngayve = $input['ngay-ve'];
		$fromdatadi = chuyen_bayModel::whereRaw('Noi_di = ? AND Noi_den = ? AND Ngay = ? AND So_luong_ghe >=?',[$sanbaydi,$sanbayden,$ngaydi,$soghe])->get()->toArray();
		$fromdatave = chuyen_bayModel::whereRaw('Noi_di = ? AND Noi_den = ? AND Ngay = ? AND So_luong_ghe >=?',[$sanbayden,$sanbaydi,$ngayve,$soghe])->get()->toArray();
		$content = $this->encode_chuyenbay2chieu_json($fromdatadi,$fromdatave);
		return response($content, 200)->header('Content-Type', 'application/json');
	}

	private function encode_chuyenbay2chieu_json(Array $a, Array $b){
		$returndata = array();
		$returndata2 = array();
		$result = array();
		$i = 0;
		for (; $i < count($a); $i++)
		{
			$isexist = false;
			$tempcb = new ChuyenBay();
			$tempcb->ma = $a[$i]['Ma'];
			$tempcb->noidi = $a[$i]['Noi_di'];
			$tempcb->noiden = $a[$i]['Noi_den'];
			$tempcb->ngaydi = $a[$i]['Ngay'];
			$tempcb->gio = $a[$i]['Gio'];
			if ($i==0)
			{
				array_push($returndata, $tempcb);
			}
			else
			{
				$j = 0;
				for (; $j < count($returndata); $j++ )
				{
					if ($returndata[$j]->ma == $tempcb->ma)
						{
							$isexist = true;
							break;
						}
				}
				if ($isexist == false)
				{
					array_push($returndata, $tempcb);
				}
			}
		}
		$i = 0;
		for (; $i < count($a); $i++){
			$tempvmb = new VeMayBay();
			$tempvmb->hang = $a[$i]['Hang'];
			$tempvmb->muc = $a[$i]['Muc'];
			$tempvmb->gia = $a[$i]['Gia'];
			$j = 0;
			for (;$j < count($returndata); $j++)
			{
				if ($returndata[$j]->ma == $a[$i]['Ma'])
					array_push ($returndata[$j]->ve, $tempvmb);
			}
		}
		$i = 0;
		for (; $i < count($b); $i++)
		{
			$isexist = false;
			$tempcb = new ChuyenBay();
			$tempcb->ma = $b[$i]['Ma'];
			$tempcb->noidi = $b[$i]['Noi_di'];
			$tempcb->noiden = $b[$i]['Noi_den'];
			$tempcb->ngaydi = $b[$i]['Ngay'];
			$tempcb->gio = $b[$i]['Gio'];
			if ($i==0)
			{
				array_push($returndata2, $tempcb);
			}
			else
			{
				$j = 0;
				for (; $j < count($returndata2); $j++ )
				{
					if ($returndata2[$j]->ma == $tempcb->ma)
						{
							$isexist = true;
							break;
						}
				}
				if ($isexist == false)
				{
					array_push($returndata2, $tempcb);
				}
			}
		}
		$i = 0;
		for (; $i < count($b); $i++){
			$tempvmb = new VeMayBay();
			$tempvmb->hang = $b[$i]['Hang'];
			$tempvmb->muc = $b[$i]['Muc'];
			$tempvmb->gia = $b[$i]['Gia'];
			$j = 0;
			for (;$j < count($returndata2); $j++)
			{
				if ($returndata2[$j]->ma == $b[$i]['Ma'])
					array_push ($returndata2[$j]->ve, $tempvmb);
			}
		}
		array_push($result, $returndata);
		array_push($result, $returndata2);
		return json_encode($result);
	}
}
class ChuyenBay{
	public $ma = "";
	public $noidi = "";
	public $noiden = "";
	public $ngaydi = "";
	public $gio = "";
	public $ve = array();
}
class VeMayBay{
	public $hang = "";
	public $muc = "";
	public $gia = "";
}
