<?php
include("include/config.php");
include("include/count.php");
include("include/main.php");
$referrer_array = array("baidu","谷歌","Bing","360搜索","搜狗","站内","直接访问","友链");
$time = date("G:i:s");
$ua = $_POST['ua'];
$get = $_POST['get'];
$referrer = $referrer_array[$_POST["referrer"]];
$ip = GetIpAdd();
$os = $_POST['os'];
$lang = $_POST['lang'];
$browser = $_POST['browser'];
if(filter_var($ip,FILTER_VALIDATE_IP) and $ua<>"" and $get<>"" and $referrer<>"" and $os<>"" and $lang<>"" and $browser<>""){
	$json=json_decode(GetIpJson($ip),ture);
	if($json["errMsg"]=="success" and $json["errNum"]==0){
		$add=$json["retData"];
		$sql="INSERT INTO count (year,month,day,time,get,referrer,ip,country,province,city,district,carrier,os,lang,browser,ua) VALUES ('".date('Y')."','".date('n')."','".date('j')."','".$time."','".$get."','".$referrer."','".$ip."','".$add['country']."','".$add['province']."','".$add['city']."','".$add['district']."','".$add['carrier']."','".$os."','".$lang."','".$browser."','".$ua."')";
	}else{
		$sql="INSERT INTO count (year,month,day,time,get,referrer,,ip,country,province,city,district,carrier,os,lang,browser,ua) VALUES ('".date('Y')."','".date('n')."','".date('j')."','".$time."','".$get."','".$referrer."','".$ip."','未知','未知','未知','未知','未知','".$os."','".$lang."','".$browser."','".$ua."')";
	}
	mysqli_query($conn,$sql);
}
mysqli_close($conn);
?>