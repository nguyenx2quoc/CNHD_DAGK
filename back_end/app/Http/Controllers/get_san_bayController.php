<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Request;
class get_san_bayController extends Controller {

	public function index(Request $request){		
		if(Input::has('san-bay-di'))
      	  	return $this->get_san_bay_den();
      	return $this->get_san_bay(); 
		
    	
	}

	public function get_san_bay_den(){
	    $input = Input::only('san-bay-di');
		$sanbaydi = $input['san-bay-di'];
		$dataread = san_bay_denModel::Select('san_bay_den')->Where('san_bay_di',$sanbaydi)->get()->toArray();
		$data = array();
		$i = 0;
		for (; $i < count($dataread); $i++){
			$tempdata = san_bayModel::Where('ten',$dataread[$i]['san_bay_den'])->get()->toArray();
			array_push($data,$tempdata[0]);		
		}
		return $this->encode_sanbay_json($data);
	}

	public function get_san_bay(){
		$data = san_bayModel::all()->toArray();
		return $this->encode_sanbay_json($data);		
	}
	
	private function encode_sanbay_json(Array $a){
		$data = array();
		$i = 0;
		for (; $i < count($a); $i++)
		{
			$isexist = false;
			$tempkv = new KhuVuc();
			$tempkv->khuvuc = $a[$i]['khu_vuc'];
			if ($i==0)
			{
				array_push($data, $tempkv);
			}
			else
			{
				$j = 0;
				for (; $j < count($data); $j++ )
				{
					if ($data[$j]->khuvuc == $tempkv->khuvuc)
						{
							$isexist = true;
							break;
						}
				}
				if ($isexist == false)
				{
					array_push($data, $tempkv);
				}
			}
		}
		$i = 0;
		for (; $i < count($a); $i++){
			$tempsb = new SanBay();
			$tempsb->ten = $a[$i]['ten'];
			$tempsb->ma = $a[$i]['ma'];
			$j = 0;
			for (;$j < count($data); $j++)
			{
				if ($data[$j]->khuvuc == $a[$i]['khu_vuc'])
					array_push ($data[$j]->sanbay, $tempsb);
			}
		}
		$returndata = new Data();
		$returndata->Sb = $data;
		return json_encode($returndata);
	}

}
class KhuVuc{
	public $khuvuc = "";
    public $sanbay  =array();
}
class SanBay{
	public $ten = "";
    public $ma  ="";
}
class Data{
	public $Sb;
}
