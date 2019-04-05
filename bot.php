<?php
error_reporting(0);
function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,($str[1]));
	return $str[0];
}
function login($user_id,$FuulBalance){
	$arr = array("\r","	");
	$url = "http://spin4dogecoin.cf/api/controller.php";
	$h = explode("\n",str_replace($arr,"","User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; vivo 1808 Build/O11019))";
	$body = "user_id=$user_id&FuulBalance=$FuulBalance&";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$x = curl_exec($ch);
	curl_close($ch);
	return claim($user_id,$FuulBalance);
}
function claim($user_id,$FuulBalance){
	$arr = array("\r","	");
	$url = "http://spin4dogecoin.cf/api/controller.php";
	$h = explode("\n",str_replace($arr,"","User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; vivo 1808 Build/O11019))";
	$body = "user_id=$user_id&FuulBalance=$FuulBalance&claimok=ok";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$x = curl_exec($ch); 
	curl_close($ch);
	return json_decode($x,true);
}                                                                                
echo " Pembuat : Riskis7 | YouTube : Master Hacker | Team : Bengkulu Cyber Team | Versi 1 "; 

echo "user_id :";                                 
$user_id = trim(fgets(STDIN));
echo "FuulBalance :";
$FuulBalance = trim(fgets(STDIN));
$user_id = explode($user_id)[0];
while(TRUE){
	$submit = login($user_id,$FuulBalance);
	$output = json_encode($submit);
	$balance = getStr($output,'"message":',',');
	$balance = getStr($output,'"ubal":',',');
	$claim = getStr($output,'"claimamt":',',');
	if(strpos($output,"devid")==true){
                $text = " sukses: $balance Claim : $Pembuat : Riskis7  Waktu 5 menit";
                $text1 = "\033[32m".$text."\033[0m";
            }else{
                $text =" GAGAL";
                $text1 = "\033[31m".$text."\033[0m";
        }
	echo $text1."\n";
	sleep(300);
	
}
