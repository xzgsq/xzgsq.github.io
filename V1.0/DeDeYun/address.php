<?php
include_once ("common.php");
$ip=defense($_POST['ip']);//编辑框需要显示所以放在这里
?>

<html lang="zh-cn">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title>精确地址查询 By DeDeYun!</title>
        
       
  <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
    <script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
    <script src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
  <--![endif]-->
       
        <script type="text/javascript">function getValue(obj, str) {
                var input = window.document.getElementById(obj);
                input.value = str;
            }</script>
    </head>
    
    <body>
	<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">织梦云社工管理中心</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="/admin.php"><span class="glyphicon glyphicon-user"></span> 后台首页</a>
          </li>
  <li class="active"><a href="/DeDeYun/address.php"><span class="glyphicon glyphicon-home"></span> 地址查询</a></li>
    <li><a href="/DeDeYun/QQpwd.php"><span class="glyphicon glyphicon-fire"></span> 老密查询</a></li>
	 <li><a href="/DeDeYun/update.php"><span class="glyphicon glyphicon-retweet"></span> 检测更新</a></li>
          <li><a href="admin.php?mod=logout"><span class="glyphicon glyphicon-log-out"></span> 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
   <div class="container" style="padding-top:70px;">
        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right" role="tablist">
                    <li role="presentation" class="active">
                        <a href="index.php">IP 查询</a></li>
                    <li role="presentation">
                        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=2509882429&amp;site=qq&amp;menu=yes">联系我们</a></li>
                </ul>
                <h3 class="text-muted" align="left">IP精确位置查询</h3></div>
            <hr>
            <h3 class="form-signin-heading">输入IP地址</h3>
            <div class="form-sign">(不要带http://）
				<form method="post" action="?"><input type="hidden" name="my" value="query">
					<input type="text" class="form-control" name="ip" value="<?=$ip?>" placeholder="请输入IP地址"><br>
					<input type="Submit" class="btn btn-primary btn-block" name="submit" value="确定查询">
				</form>
					<br>
					<hr>
<?php
if(isset($_POST['my'])=='query'){
	if(!$ip){msg('请输入IP操作！','DeDeYun/address.php');}
	
	$content = get_curl('http://www.hao7188.com/ip/'.$ip.'.html');
	$ip1=getSubstr($content,'本站数据：','</li>');
	$ip2=getSubstr($content,'参考数据1：','</li>');
	$ip3=getSubstr($content,'参考数据2：','</li>');
	$ip4=getSubstr($content,'参考数据3：','</li>');
	$ip5=getSubstr($content,'参考数据4：','</li>');
	$ip6=getSubstr($content,'参考数据5：','</li>');
	$ip7=getSubstr($content,'参考数据6：','</li>');
	if(strstr($content,'提示：没有找到当前IP')){
	echo '
<ul class="list-group" style="text-align:left;">
	<li class="list-group-item">
		<p> 提示：没有找到当前IP: <a href="">'.$ip.'</a> 信息，请您重新查询.（可以更新到今天日期）</p>
	</li>
	<li class="list-group-item">
		<p>说明：本IP: <a href="">'.$ip.'</a> 数据来自于互联网多个数据来源，尽可能确保准确，但由于极少数ip段属于全省或全国范围内动态分配机制，难以精确定位，查出的结果仅供参考,敬请留意。</p>
	</li>
	
</ul>
	';
	}else{
	echo '
<ul class="list-group" style="text-align:left;">
	<li class="list-group-item">
		<p> 本站数据：'.$ip1.'</p>
	</li>
	<li class="list-group-item">
		<p> 参考数据：'.$ip2.'</p>
	</li>
	<li class="list-group-item">
		<p> 参考数据：'.$ip3.'</p>
	</li>
	<li class="list-group-item">
		<p> 地理位置：'.$ip4.'</p>
	</li>
	<li class="list-group-item">
		<p> 地理位置：'.$ip5.'</p>
	</li>
	<li class="list-group-item">
		<p> 地理位置：'.$ip6.'</p>
	</li>
	<li class="list-group-item">
		<p> 地理位置：'.$ip7.'</p>
	</li>
	<li class="list-group-item">
		<p>最后更新日期：<font color="green">'.$date.'</font> --------------//
		<br>已上数据由织梦云提供！请勿非法获取他人信息！</p>
	</li>
	
</ul>
	';
	}
}

?>
				<div class="panel panel-default">
					<div class="panel-heading" style="color: #777;"> 最近查询的IP</div>
					<div class="panel-body">
					<ul class="N_new_list">
						<?php
						$get_ipnum=get_curl('http://www.hao7188.com/ip/192.168.1.1.html');//定义一个IP防止错误
						$ipnum_html=getSubstr($get_ipnum,'<div class="N_new_list">','</div>');
						echo $ipnum_html;
						?>
					</ul>
					</div>
				</div>
               
                <p style="text-align:center">
                    <br>© Powered by
                    <a href="/">DeDeYun</a>!</p>
			</div>
        </div>
	 </div>
    </body>

</html>