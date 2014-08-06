<?php
$bduss="BDUSS=WJ1NGhpYUMwalVzbEc2LU8yfmJMRFlBOFRUVmpKYW1vbFdraVBjUk1GaWFBd2xVQVFBQUFBJCQAAAAAAAAAAAEAAAB";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, "http://c.tieba.baidu.com/c/c/forum/sign");
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, 'Content-Type: application/x-www-form-urlencoded','User-Agent: Fucking iPhone/1.0 BadApple/99.1');
curl_setopt(CURLOPT_COOKIE, $bduss);
$temp = array(
			'BDUSS' => $bduss,
			'_client_id' => '03-00-DA-59-05-00-72-96-06-00-01-00-04-00-4C-43-01-00-34-F4-02-00-BC-25-09-00-4E-36',
			'_client_type' => '4',
			'_client_version' => '1.2.1.17',
			'_phone_imei' => '540b43b59d21b7a4824e1fd31b08e9a6',
			'fid' => $fid,
			'kw' => $kw,
			'net_type' => '3',
			'tbs' => getTbs()
		);
		$x = '';
		foreach($temp as $k=>$v) {
			$x .= $k.'='.$v;
		}
		$temp['sign'] = strtoupper(md5($x.'tiebaclient!!!'));
		curl_setopt(CURLOPT_POST, 1);
		curl_setopt(CURLOPT_POSTFIELDS, http_build_query($temp));
		echo curl_exec($ch);

function getTbs(){
	$bduss="BDUSS=WJ1NGhpYUMwalVzbEc2LU8yfmJMRFlBOFRUVmpKYW1vbFdraVBjUk1GaWFBd2xVQVFBQUFBJCQAAAAAAAAAAAEAAAB";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, "http://c.tieba.baidu.com/c/c/forum/sign");
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, 'Content-Type: application/x-www-form-urlencoded','User-Agent: Fucking iPhone/1.0 BadApple/99.1');
curl_setopt(CURLOPT_COOKIE, $bduss);
		$x = json_decode(curl_exec($ch),true);
		return $x['tbs'];
	}
?>