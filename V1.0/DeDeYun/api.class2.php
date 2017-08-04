<?php
/*
	Author:小照 & 织梦云-云柒 DeDeYUn
	外部查询api接口
*/
include_once ("common.php");
if(isset($_GET['my'])=='query'){
	if(!$ip=defense($_GET['ip'])){
		$arr = array('msg'=>'请输入IP继续操作！');
		echo json_encode($arr);
		exit();
	}
	$content = get_curl('http://www.hao7188.com/ip/'.$ip.'.html');
	$ip1=getSubstr($content,'本站数据：','</li>');
	$ip2=getSubstr($content,'参考数据1：','</li>');
	$ip3=getSubstr($content,'参考数据2：','</li>');
	$ip4=getSubstr($content,'参考数据3：','</li>');
	$ip5=getSubstr($content,'参考数据4：','</li>');
	$ip6=getSubstr($content,'参考数据5：','</li>');
	$ip7=getSubstr($content,'参考数据6：','</li>');
	if(strstr($content,'提示：没有找到当前IP')){
		$arr = array('test'=>'001','msg'=>'提示：没有找到当前IP: <a href="">'.$ip.'</a> 信息，请您重新查询.（可以更新到今天日期）','explain'=>'说明：本IP: <a href="">'.$ip.'</a> 数据来自于互联网多个数据来源，尽可能确保准确，但由于极少数ip段属于全省或全国范围内动态分配机制，难以精确定位，查出的结果仅供参考,敬请留意。');
		echo json_encode($arr);
		exit();
	}else{
		$arr = array('test'=>'002','name'=>$name,'result_1'=>$ip1,'result_2'=>$ip2,'result_3'=>$ip3,'result_4'=>$ip4,'result_5'=>$ip5,'result_6'=>$ip6,'result_7'=>$ip7);
		echo json_encode($arr);
		exit();
	}
}elseif(isset($_GET['num'])=='ipnum'){
	$get_ipnum=get_curl('http://www.hao7188.com/ip/192.168.1.1.html');//定义一个IP防止错误
	$ipnum_html=getSubstr($get_ipnum,'<div class="N_new_list">','</div>');
	echo $ipnum_html;
}
?>