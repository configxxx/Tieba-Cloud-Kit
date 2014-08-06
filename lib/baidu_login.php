<?php header("Content-Type: text/html;charset=utf-8");
$baidu = new baidu($_POST['baidu_name'],$_POST['baidu_password']);
$data = $baidu->request('http://pan.baidu.com/api/list?channel=chunlei&clienttype=0&web=1&num=100&page=1&dir=%2F','http://pan.baidu.com');
echo $data;
class baidu{
 private $cookie = '';  
 private $username = '';
 private $password = '';
 const COOKIE_DIR = 'temp';   //cookie存放目录
 const COOKIE_VALIDATE = 604800; //cookie有效期,默认为7天
 const SECRET_KEY = 'hAFS6as8askNBVSuiealkkw'; //密钥用于加密cookie文件名，防止保存的cookie路径被猜测
 private function http_request($url, $post_data, $referef,$header = true){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  if ($post_data != ""){
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  }
  if ($referef != ""){
   curl_setopt($ch, CURLOPT_REFERER, $referef);
  }
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_HEADER, $header);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31");
  if ($this->cookie != ""){
   curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
  }
  $data = curl_exec($ch);
  curl_close($ch);
  if ($header){
   preg_match_all('/Set-Cookie:((.+)=(.+))$/m ', $data, $cookies);
   if(is_array($cookies) && count($cookies) > 1 && count($cookies[1]) > 0){
    foreach($cookies[1] as $i => $k){
     $cookieinfos = explode(";", $k);
     if(is_array($cookieinfos) && count($cookieinfos) > 1){
      $this->cookie .= $cookieinfos[0];
      $this->cookie .= "; ";
     }
    }
   } 
  }
  return $data;
 }
 private function login(){
  //生成一个cookie
  $ret = $this->http_request("https://passport.baidu.com/v2/api/?getapi&class=login&tpl=mn&tangram=true", "", "");
  //获取token并保存cookie
  $ret = $this->http_request("https://passport.baidu.com/v2/api/?getapi&class=login&tpl=mn&tangram=true", "", "");
  preg_match_all('/login_token='(.+)'/', $ret, $tokens);
  $login_token = $tokens[1][0];
  //登陆并保存cookie
  $post_data = array();
  $post_data['username'] = $this->username;
  $post_data['password'] = $this->password;
  $post_data['token'] = $login_token;
  $post_data['charset'] = "UTF-8";
  $post_data['callback'] = "parent.bd12Pass.api.login._postCallback";
  $post_data['index'] = "0";
  $post_data['isPhone'] = "false";
  $post_data['mem_pass'] = "on";
  $post_data['loginType'] = "1";
  $post_data['safeflg'] = "0";
  $post_data['staticpage'] = "https://passport.baidu.com/v2Jump.html";
  $post_data['tpl'] = "mn";
  $post_data['u'] = "http://www.baidu.com/";
  $post_data['verifycode'] = "";
  $ret = $this->http_request("http://passport.baidu.com/v2/api/?login", $post_data, "https://passport.baidu.com/v2/?login&tpl=mn&u=http%3A%2F%2Fwww.baidu.com%2F");
  //记录下所有cookie
  $this->writeCookie();  
 }
 private function writeCookie(){
  if(!file_exists(self::COOKIE_DIR)){
   @mkdir(self::COOKIE_DIR) && touch(self::COOKIE_DIR.'/index.html');
  }
  $filename = self::COOKIE_DIR.'/'.md5($this->username.self::SECRET_KEY);
  file_put_contents($filename, $this->cookie);
 }
 public function baidu($username,$password){
  $this->username = $username;
  $this->password = $password;
  $filename = self::COOKIE_DIR.'/'.md5($this->username.self::SECRET_KEY);
  if ((@filemtime($filename)+ self::COOKIE_VALIDATE > time()) && ($cookie = file_get_contents($filename))!= ''){
  //如果cookie在有效期内且不为空
   $this->cookie = $cookie;
  }else {
   $this->login();
  }
 }
 /** www.111Cn.net
  * 请求页面
  * @param string $url  ：页面地址
  * @param string $referef ：引用页面
  * @param string $post_data ：post数据,如果填写则为post方式否则为get方式
  * 返回页面数据
  */
 public function request($url,$referef = '',$post_data = ''){
  return $this->http_request($url,$referef,$post_data,false);
 }
}
?>
