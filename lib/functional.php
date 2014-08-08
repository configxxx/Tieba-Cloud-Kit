<?php header("Content-Type: text/html;charset=utf-8");

class json_code{
	public static function icon_to_utf8($s) {
		if(is_array($s)) 
		{
		    foreach($s as $key => $val) 
		    {
		    	$s[$key] = icon_to_utf8($val);
		  	}
		}else{
		    $s = json_code::ct2($s);
		  	return $s;
		}
	}
	public static function ct2($s){
	    if(is_numeric($s))
	    {
	        return intval($s);
	    }else{
	        return iconv("GBK","UTF-8",$s);
	    }
	}
}

function html_analysis($value)
{
	$tieba=array();
	$regex_ba_list='/"\/f\?kw=.*?"title="(.*?)"/';
	$regex_ba_data='/balvid="([0-9]+)"/i';
	$regex_='/"\/f\?kw=.*?"/';
	for ($i=0; $i < count($value); $i++) { 
		$value[$i] = str_replace("\t", '', $value[$i]);
		$value[$i] = str_replace("\r", '', $value[$i]);
		$value[$i] = str_replace("\n", '', $value[$i]);
		$value[$i] = str_replace(' ', '', $value[$i]);
	    $value[$i] = trim($value[$i]);
	    preg_match_all($regex_ba_list,$value[$i],$list);
	    preg_match_all($regex_ba_data,$value[$i],$balvid);
	}
	for ($k=0; $k < count($list[0]); $k++) { 
		$tieba[$k] = array('utf8_name' =>$list[1][$k],
						'url'=>urlencode(mb_convert_encoding($list[1][$k], 'gb2312', 'utf-8')),
						'balvid'=>$balvid[1][$k]);
	}
	return $tieba;
}

//From tck_user_bind table
function uiget_tiebaname($username)
{
	$sql = 'SELECT * FROM `tck_user_bind` WHERE username="'.$username.'"';
	$count = database::con($sql,$username);
	return $count[4];
}
function uiget_tiebaemail($username)
{
	$sql = 'SELECT * FROM `tck_user_bind` WHERE username="'.$username.'"';
	$count = database::con($sql,$username);
	return $count[5];	
}
function uiget_tiebamobile($username)
{
	$sql = 'SELECT * FROM `tck_user_bind` WHERE username="'.$username.'"';
	$count = database::con($sql,$username);
	return $count[6];
}
function uiget_touxiang($username)
{
	$sql = 'SELECT * FROM `tck_user_bind` WHERE username="'.$username.'"';
	$count = database::con($sql,$username);
	return $count[7];
}
function get_cookie($username)
{
	$sql = 'SELECT * FROM `tck_user_bind` WHERE username="'.$username.'"';
	$count = database::con($sql,$username);
	return $count[2];
}
?>
