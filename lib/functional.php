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

function html_analysis($html_sources)
{
	foreach ($html_sources as $value) {
		preg_match('/<tr><td>.*?<ahref="\/f\?kw=.*?"title="(.*?)"/', $html_sources,$matches);
	}
	return $matches;
}
?>
