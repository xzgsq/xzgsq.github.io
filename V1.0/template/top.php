<?php include("include/top.php");?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo getValue("title")?>-By DeDeYun</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta charset="utf8">
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet">
<link href="./static/css/datedropper.css" rel="stylesheet">
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.js"></script>
<script src="./static/js/datedropper.min.js"></script>
<script src="./static/js/main.js"></script>
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
          <li class="active">
            <a href="./"><span class="glyphicon glyphicon-user"></span> 后台首页</a>
          </li>
  <li><a href="/DeDeYun/address.php"><span class="glyphicon glyphicon-home"></span> 地址查询</a></li>
    <li><a href="/DeDeYun/QQpwd.php"><span class="glyphicon glyphicon-fire"></span> 老密查询</a></li>
	 <li><a href="/DeDeYun/update.php"><span class="glyphicon glyphicon-retweet"></span> 检测更新</a></li>
          <li><a href="admin.php?mod=logout"><span class="glyphicon glyphicon-log-out"></span> 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
   <div class="container" style="padding-top:70px;">
<div class="container-fluid">
<div class="row-fluid">
<br />
<div class="col-sm-12 col-lg-4">
<div class="panel panel-danger">
<div class="panel-heading">
<h3 class="panel-title">基本统计信息</h3>
</div>
<div class="panel-body">
<table class="table table-hover">
<tbody>
<tr><td>本月来访PV</td><td><?php echo getmonthpv(date("Y"),date("n"));?></td></tr>
<tr><td>本月来访UV</td><td><?php echo getmonthuv(date("Y"),date("n"));?></td></tr>
<tr><td>今日来访PV</td><td><?php echo getdaypv(date("Y"),date("n"),date("j"));?></td></tr>
<tr><td>今日来访UV</td><td><?php echo getdayuv(date("Y"),date("n"),date("j"));?></td></tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-sm-12 col-lg-4">
<?php include("template/pie.php");?>
</div>
<div class="col-sm-12 col-lg-4">
<div class="well well-sm" style="text-align:center;">
本系统从<?php echo getValue("date");?>开始运行。<br /><a href="index.php" style="text-decoration:none;">首页</a>&nbsp;|&nbsp;<a data-toggle="modal" data-target="#myModal" style="text-decoration:none;">设置</a>&nbsp;|&nbsp;<a title="使用说明" data-container="body" data-toggle="popover" data-placement="bottom" data-content="只需让用户访问您的网站 IP将自动记录！" style="text-decoration:none;">帮助</a>&nbsp;|&nbsp;<a href="admin.php?mod=logout" style="text-decoration:none;">注销</a>
</div>
<form action="admin.php" method="GET" role="form">
<div class="input-group">
<span class="input-group-addon">查询日期</span>
<input type="text" class="form-control" id="date" name="date" style="background-color:#fff;">
<span class="input-group-btn"><button class="btn btn-default" type="submit">查询</button></span>
</div>
</form>
</div>
</div>
</div>
</div>