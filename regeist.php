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
	<div style="margin-top: 200px;">
		<h1 class="text-center">Blog</h1>
	</div>
	<div style="width: 600px;" class="center-block">
		<div style="width: 330px; float: left;">
			<h3>新用户注册</h3>
			<form action="addUsers.php" method="post">
				<div class="input-group">
				<input type="text" name="UserAccount" class="form-control" placeholder="账号" aria-describedby="basic-addon2">
				<input type="text" name="UserName" class="form-control" placeholder="昵称" aria-describedby="basic-addon2">
				<input type="text" name="UserPwd" class="form-control" placeholder="密码" aria-describedby="basic-addon2">
				<input type="text" name="UserPwdCheck" class="form-control" placeholder="确认密码" aria-describedby="basic-addon2">
				<input type="text" name="UserSex" class="form-control" placeholder="性别" aria-describedby="basic-addon2">
				<input type="text" name="UserPhone" class="form-control" placeholder="电话" aria-describedby="basic-addon2">
				<input type="text" name="UserAge" class="form-control" placeholder="年龄" aria-describedby="basic-addon2">
				</div>
				<div class="input-group">
				<input type="text" name="UserMail"  class="form-control" placeholder="邮箱" aria-describedby="basic-addon2">
				<span class="input-group-addon" id="basic-addon2">@example.com</span>
				</div>
				<button type="submit" class="btn btn-primary center-block" style="width: 300px;">提交</button>
			</form>
		</div>
		<div style="width: 270px; float: left;margin-top: 13px; margin-bottom: 30px;">
			<h4 class="text-center" style="margin-top: 60px;">已有账号，<a href="signin.php">请登录</a></h4>
		</div>
		<div>
			<h4 class="text-center">使用第三方账号登录</h4>
		</div>
		<div>
			<img style="margin-left: 50px; margin-top: 70px;" src="img/qq.png" alt="">
			<img style="margin-left: 25px; margin-top: 70px;" src="img/sina.png" alt="">
			<img style="margin-left: 25px; margin-top: 70px;" src="img/facebook.png" alt="">
		</div>
	</div>
</body>
</html>