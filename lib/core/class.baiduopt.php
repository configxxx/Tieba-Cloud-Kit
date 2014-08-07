<?php header("Content-Type: text/html;charset=utf-8");
/**
* Sign core 
* Base on kk sign
* fix up function _zhidao_sign
*/
require_once(dirname(dirname(__FILE__)).'\functional.php');

class baiduopt
{
	public static function get_userinfo($cookie_){
		$cookie = $cookie_;
		if(!$cookie) return array('no' => 4);
		$tbs_url = 'http://tieba.baidu.com/f/user/json_userinfo';
		$ch = curl_init($tbs_url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Referer: http://tieba.baidu.com/'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		$tbs_json = curl_exec($ch);
		curl_close($ch);
		return json_decode(json_code::icon_to_utf8($tbs_json), true);
	}
	public static function zhidao_sign($cookie,$stoken)
	{
		$ch = curl_init('http://zhidao.baidu.com/submit/user');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'cm=100509&stoken='.$stoken);
		$result = curl_exec($ch);
		curl_close($ch);
		return @json_decode($result);
	}
	public static function wenku_sign($cookie)
	{
		$ch = curl_init('http://wenku.baidu.com/task/submit/signin');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 BIDUBrowser/2.x Safari/537.31'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		$result = curl_exec($ch);
		curl_close($ch);
		return @json_decode($result);
	}
}
?>