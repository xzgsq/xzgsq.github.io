<?php
error_reporting(0);
function updateConfig($link,$name,$value){
	$sql='update config set value="'.$value.'" where name="'.$name.'"';
	if(mysqli_query($link,$sql)){
		global $check;
		$check++;
	}
}
$dbhost=$_POST["dbhost"];
$user=$_POST["user"];
$pass=$_POST["pass"];
$dbname=$_POST["dbname"];
$title=$_POST["title"];
$admin=$_POST["admin"];
$pass1=$_POST["pass1"];
$pass2=$_POST["pass2"];
$apikey=$_POST["apikey"];
$sql=file_get_contents("include/sql.sql");
$info="";
$check=0;
$file=fopen("include/install.txt","r");
fclose($file);
if(!$file){$ifOk=1;}
else{$ifOk=0;}
if($ifOk==1){
	if($dbhost=="" and $user=="" and $pass=="" and $dbname=="" and $title=="" and $admin=="" and $pass1=="" and $pass2=="" and $apikey==""){
		$info="";
	} else {
		if($dbhost=="" or $user=="" or $pass=="" or $dbname=="" or $title="" or $admin=="" or $pass1=="" or $pass2=="" or $apikey==""){
			$info="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>输入的信息不全！</div>";
		} else {
			if($pass1<>$pass2){
				$info="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>两次输入的密码不一致</div>";
			} else {
				$conn = mysqli_connect($dbhost,$user,$pass,$dbname);
				if(!$conn){
					$info="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>数据库连接错误！</div>";
				} else {
					$a=explode(";",$sql);
					foreach($a as $b){
						$c=$b.";";
						mysqli_query($conn,$c);
					}
					$file=fopen("include/install.txt","w+");
					fwrite($file,"installed");
					fclose($file);
					$config=file_get_contents("include/config.php");
					$file=fopen("include/config.php","w+");
					$arr=array("prohost"=>$dbhost,"prouser"=>$user,"propass"=>$pass,"prodbname"=>$dbname);
					$config=strtr($config,$arr);
					fwrite($file,$config);
					fclose($file);
					updateConfig($conn,"title",$title);
					updateConfig($conn,"admin",$admin);
					updateConfig($conn,"pass",md5($pass1));
					updateConfig($conn,"apikey",$apikey);
					updateConfig($conn,"date",date("Y年n月j日"));
					mysqli_close($conn);
					if($check==5){
						$info="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert'>&times;</a>安装成功！<a href='index.php' style='text-decoration:none;'>前往首页</a></div>";
					} else {
						$info="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>发生未知错误，请稍后重试！</div>";
					}
				}
			}
		}
	}
} else {
	$info="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'>&times;</a>您已安装了该程序，若要重复安装，请删除include文件夹里的install.txt文件。</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>织梦云社工程序-安装 来自织梦云-云柒 Qq2509882429</title>
<!-- 请尊重作者原版权 Qq2509882429 删此处si全家！!-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid" id="content">
<div class="row-fluid">
<div class="span12">
<br />
<form method="POST" action="install.php" class="bs-example bs-example-form" role="form">
<fieldset>
<center><legend>安装程序</legend></center>
<div class="input-group">
<span class="input-group-addon">数据库地址</span>
<input type="text" class="form-control" id="dbhost" name="dbhost">
</div>
<br />
<div class="input-group">
<span class="input-group-addon">数据库用户名</span>
<input type="text" class="form-control" id="user" name="user">
</div>
<br />
<div class="input-group">
<span class="input-group-addon">数据库密码</span>
<input type="text" class="form-control" id="pass" name="pass">
</div>
<br />
<div class="input-group">
<span class="input-group-addon">数据库名</span>
<input type="text" class="form-control" id="dbname" name="dbname">
</div>
<br />
<div class="input-group">
<span class="input-group-addon">网站标题</span>
<input type="text" class="form-control" id="title" name="title">
</div>
<br />
<div class="input-group">
<span class="input-group-addon">管理员用户名</span>
<input type="text" class="form-control" id="admin" name="admin">
</div>
<br />
<div class="input-group">
<span class="input-group-addon">管理员密码</span>
<input type="password" class="form-control" id="pass1" name="pass1">
</div>
<br />
<div class="input-group">
<span class="input-group-addon">确认密码</span>
<input type="password" class="form-control" id="pass2" name="pass2">
</div>
<br />
<div class="input-group">
<span class="input-group-addon">百度apikey</span>
<input type="text" class="form-control" id="apikey" name="apikey">
<span class="input-group-btn"><a class="btn btn-default" href="http://apistore.baidu.com/apiworks/servicedetail/114.html" target="_blank" role="button">去申请</a></span>
</div>
<br />
<div style="text-align:center;">
<div class="btn-group" id="bt">
<button type="submit" class="btn btn-success">安装</button>
<button type="reset" class="btn btn-info">重填</button>
</div>
</div>
</fieldset>
</form>
<br />
<?php echo $info;?>
<div style="text-align:center;">
&copy;&nbsp;<?php echo date("Y");?>&nbsp;Powered by <a href="http://www.qqsuu.cn/" target="_blank" style="text-decoration:none;">织梦云</a>
</div>
</div>
</div>
</div>

</body>
</html>