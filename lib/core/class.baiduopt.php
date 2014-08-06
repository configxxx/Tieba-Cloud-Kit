<?php header("Content-Type: text/html;charset=utf-8");
//=========
$bduss="WJ1NGhpYUMwalVzbEc2LU8yfmJMRFlBOFRUVmpKYW1vbFdraVBjUk1GaWFBd2xVQVFBQUFBJCQAAAAAAAAAAAEAAAB";
function _client_sign($tieba){
    $cookie = "BDUSS=WJ1NGhpYUMwalVzbEc2LU8yfmJMRFlBOFRUVmpKYW1vbFdraVBjUk1GaWFBd2xVQVFBQUFBJCQAAAAAAAAAAAEAAAB";
    $BDUSS = "WJ1NGhpYUMwalVzbEc2LU8yfmJMRFlBOFRUVmpKYW1vbFdraVBjUk1GaWFBd2xVQVFBQUFBJCQAAAAAAAAAAAEAAAB";
    if(!$BDUSS) return array(-1, '找不到 BDUSS Cookie', 0);
    $ch = curl_init('http://c.tieba.baidu.com/c/c/forum/sign');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'User-Agent: Mozilla/5.0 (SymbianOS/9.3; Series60/3.2 NokiaE72-1/021.021; Profile/MIDP-2.1 Configuration/CLDC-1.1 ) AppleWebKit/525 (KHTML, like Gecko) Version/3.0 BrowserNG/7.1.16352'));
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    $array = array(
        'BDUSS' => $BDUSS,
        '_client_id' => '03-00-DA-59-05-00-72-96-06-00-01-00-04-00-4C-43-01-00-34-F4-02-00-BC-25-09-00-4E-36',
        '_client_type' => '4',
        '_client_version' => '1.2.1.17',
        '_phone_imei' => '540b43b59d21b7a4824e1fd31b08e9a6',
        'fid' => $tieba['fid'],
        'kw' => urldecode($tieba['unicode_name']),
        'net_type' => '3',
        'tbs' => get_tbs($uid),
    );
    $sign_str = '';
    foreach($array as $k=>$v) $sign_str .= $k.'='.$v;
    $sign = strtoupper(md5($sign_str.'tiebaclient!!!'));
    $array['sign'] = $sign;
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array));
    $sign_json = curl_exec($ch);
    curl_close($ch);
    $res = @json_decode($sign_json, true);
    if(!$res) return array(1, 'JSON 解析错误', 0);
    if($res['user_info']){
        $exp = $res['user_info']['sign_bonus_point'];
        return array(2, "签到成功，经验值上升 {$exp}", $exp);
    }else{
        switch($res['error_code']){
            case '340010':      // 已经签过
            case '160002':
            case '3':
                return array(2, $res['error_msg'], 0);
            case '1':           // 未登录
                return array(-1, "ERROR-{$res[error_code]}: ".$res['error_msg'].' （Cookie 过期或不正确）', 0);
            case '160004':      // 不支持
                return array(-1, "ERROR-{$res[error_code]}: ".$res['error_msg'], 0);
            case '160003':      // 零点 稍后再试
            case '160008':      // 太快了
                return array(1, "ERROR-{$res[error_code]}: ".$res['error_msg'], 0);
            default:
                return array(1, "ERROR-{$res[error_code]}: ".$res['error_msg'], 0);
        }
    }
}

_client_sign("chrome");
?>
