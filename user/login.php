<?php
$title = "分站登陆";
include "../Inc/core.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="浅蓝ちゃん">

	<title><?=$title?> - <?=$conf['title']?></title>

	<link href="../Assets/css/app.css" rel="stylesheet">
</head>

<body>
<?php
if(!empty($_POST['user']) && !empty($_POST['pwd'])){
if($_POST){
$user = $_POST['user'];
$pwd = $_POST['pwd'];

$SQL = Query("SELECT * FROM mall_users WHERE user='{$user}'");
$row = Fetch($SQL);

if($user == $row['user'] && $pwd == $row['pwd']){
$_SESSION['usered'] = $user;
$_SESSION['islogin2'] = "user";
exit('<!DOCTYPE html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert-dev.min.js"></script></head><body></body><script type="text/javascript">swal({title: "系统提示",text: "登陆成功", type: "success"},function(){ window.location.href="./index.php";});</script></body></html>');
}else{
exit('<!DOCTYPE html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert-dev.min.js"></script></head><body></body><script type="text/javascript">swal({title: "系统提示",text: "登陆失败", type: "error"},function(){ window.location.href="./login.php";});</script></body></html>');
}
}
}

if(isset($_GET['logout'])){
$_SESSION['islogin2'] = "";
exit('<!DOCTYPE html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert-dev.min.js"></script></head><body></body><script type="text/javascript">swal({title: "系统提示",text: "账号已过期", type: "success"},function(){ window.location.href="./login.php";});</script></body></html>');
}else if($_SESSION['islogin2'] == "user"){
exit('<!DOCTYPE html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert-dev.min.js"></script></head><body></body><script type="text/javascript">swal({title: "系统提示",text: "您已登陆", type: "info"},function(){ window.location.href="./";});</script></body></html>');
}
?>

<main class="content">
<div class="container-fluid p-0">
<div class="row">
<div class="col-lg-12">
     <div class="card">
		<div class="card-header">
			<center><h2 class="card-title mb-0"><?=$title?></h2></center>
		</div><hr>
		<div class="card-body">
		<form method="post" action="">
		<div class="form-group">
	  <label class="col-sm-2 control-label">分站账号</label>
	  <div class="col-lg-12"><input type="text" name="user" value="" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">分站密码</label>
	  <div class="col-lg-12"><input type="password" name="pwd" value="" class="form-control" required/></div>
	</div><br/>
	
	<div class="form-group">
	  <div class="col-lg-12"><input type="submit" value="登陆到系统" class="btn btn-primary form-control"/>
	 </div>
    <div class="mt-5 text-center">
      <p>还没有账户 ? <a href="reg.php" class="font-weight-medium text-primary"> 现在注册 </a>
     </div>
	 </form>	 
		</div>
	</div>
  </div>
</div>