
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<nav class = "nav nav-tabs" role = "navigation">  
        <div class="navbar-header">  
            <a class="navbar-brand">blog</a>  
        </div>  
        <ul class="nav navbar-nav">  
            <li class="active"><a href="index.php">首页</a></li>  
            <li><a href="#">相册</a></li>  
            <li><a href="#">同城</a></li>  
            <li><a href="#">周边</a></li>               
            <li role="presentation" class="dropdown">
	   				 	<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	      			更多 <span class="caret"></span></a>
		    				<ul class="dropdown-menu">
		      				<li>
		      					<a href="">1</a>
		      					<a href="">2</a>
		      					<a href="">3</a>
		      				</li>
		    				</ul>
  					</li>  
        </ul>
        <ul class="nav nav-tabs navbar-right" >
        	<li><a href="signIn.php">sign in</a></li>
        	<li><a href="regeist.php">sign up</a></li>
        	
        </ul>  
    </nav>
	<div style="margin-top: 200px;">
		<h1 class="text-center">Blog</h1>
	</div>
	<div style="width: 400px;" class="center-block">
		<form action="signInCheck.php" method="post">
			<h3 class="text-center">登录</h3>
				<div class="input-group">

				<input type="text" name="UserAccount" class="form-control" placeholder="账号" aria-describedby="basic-addon2">
				<input name="UserPwd" class="form-control" type="password" placeholder="密码" aria-describedby="basic-addon2">
				</div>
				<?php 
				error_reporting(E_ALL^E_NOTICE^E_WARNING);
					if ($_GET['errorNum'] == 156) {
						echo "
							<h6 style='color:red' class='text-center'>账号或密码错误</h6>
						";
					}
				 ?>
				
				<button type="submit" class="btn btn-primary center-block" style="width: 300px; margin-top: 10px;">登录</button>
		 </form>
		<div style="margin-top: 30px">
			<h6 class="text-center">使用第三方账号登录</h6>
		</div>
		<div>
			<img style="margin-left: 75px; margin-top: 30px;" src="img/qq.png" alt="">
			<img style="margin-left: 50px; margin-top: 30px;" src="img/sina.png" alt="">
			<img style="margin-left: 50px; margin-top: 30px;" src="img/facebook.png" alt="">
		</div>
		
	</div>
</body>
</html>