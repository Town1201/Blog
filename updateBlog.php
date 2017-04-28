<?php 
  require_once 'dbfunc.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/tinymce/tinymce.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script>
		tinymce.init({
  		selector: 'textarea',
  		height: 710,
 	 	plugins: 'image media codesample imagetools',
  		toolbar: 'image media codesample',
 	 	image_caption: true,
  		media_live_embeds: true,
  		imagetools_cors_hosts: ['tinymce.com', 'codepen.io'],
  		content_css: [
    	'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    	'//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.css',
    	'//www.tinymce.com/css/codepen.min.css'    
  ]
});
	</script>
</head>
<body>  
    <nav class = "nav nav-tabs" role = "navigation">  
        <div class="navbar-header">  
            <a class="navbar-brand">blog</a>  
        </div>  
        <ul class="nav navbar-nav">  
        <?php
        session_start();
        $UserAccount=$_SESSION['UserAccount'];
        
        print<<<ENT

            <li><a href='index.php?UserAccount=$UserAccount'>首页</a></li>  
            <li><a href=>相册</a></li>  
            <li><a href=>同城</a></li>  
            <li><a href=>周边</a></li>               
            <li role='presentation' class='dropdown'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href= role='button' aria-haspopup='true' aria-expanded='false'>
                    更多 <span class='caret'></span></a>
                            <ul class='dropdown-menu'>
                            <li>
                                <a href=>1</a>
                                <a href=>2</a>
                                <a href=>3</a>
                            </li>
                            </ul>
                    </li>  
ENT;
         ?>
            
        </ul>
        <ul class="nav nav-tabs navbar-right" >
        <?php 
            
               if ($_SESSION['UserAccount']!=0) {
                
                $connUser = connectDB();
                $resultUser = mysql_query("SELECT * FROM T_Users WHERE UsersAccount=$UserAccount");
                $resArrUser = mysql_fetch_assoc($resultUser);
                $UserName = $resArrUser['UsersName'];               
                $UserSex = $resArrUser['UsersSex'];
                $UserAge = $resArrUser['UsersAge'];
                $UserPhone = $resArrUser['UsersPhone'];
                $UserMail = $resArrUser['UsersMail'];               
                
                
                if (!empty($UsersName)) {
                echo "
                <li><a href='signIn.php'>sign in</a></li>
                <li><a href='regeist.php'>sign up</a></li>";
                }else{
                echo "
                
                <li><img src='img/1.jpg' style='height:25px; width:25px; margin-top:10px'class='img-circle'></li>
                <li><a href='userInfo.php?UserAccount=$UserAccount' style='float:left'>$UserName</a></li>
                <li><a href='signIn.php'style='margin-right:40px;'>登出</a></li>
                ";
                }
            }else{
                echo "
                <li><a href='signIn.php'>sign in</a></li>
                <li><a href='regeist.php'>sign up</a></li>"; 
            }



         ?>
            
            
        </ul>  
    </nav>
	<div class="center-block" style="width: 1000px;">
	<form action="updateBlogsServer.php" method="post">
	<div class="input-group">
		<div class="input-group-btn open">
		<?php 
			$BlogID = $_GET['BlogID'];
			$changeConn = connectDB();
			$changeRes = mysql_query("SELECT BlogsTitle, BlogsContent, BlogsClassify FROM T_Blogs WHERE BlogsID=$BlogID");
			$changeArr = mysql_fetch_assoc($changeRes);
			$changeTitle = $changeArr['BlogsTitle'];
			$changeClassify = $changeArr['BlogsClassify'];
			$changeContent = $changeArr['BlogsContent'];
			session_start();
			$_SESSION['BlogID']=$BlogID;
			 ?>
    <select name="BlogClassify" style="float: left; display: block; width: 80px" class="form-control" onchange="selectOnchang(this)">
            <option value="1">随笔</option>
            <option value="2">IT</option>
            <option value="3">摄影</option>
            <option value="4">生活</option>
            <option value="5">家具</option>
            <option value="6">旅游</option>
            <option value="7">战争</option>
            <option value="8">趣事</option>
      </select>
      <button type="button" class="btn btn-default">标题</button>

      
      
    </div>
      <input type="text" name="BlogTitle" class="form-control" aria-label="Text input with segmented button dropdown">
      <?php 
      echo '<script type="text/javascript">window.onload=function(){var t=document.getElementsByName("BlogTitle");t[0].value="'.$changeTitle.'"}</script>';
       ?>
    </div>		
		<textarea name="BlogContent">
			<?php 
      echo $changeContent;
       ?>
		</textarea>	

		<button class="btn btn-primary" type="submit">提交</button>
		<a href="" type="button" class="btn btn-primary">取消</a>
	</div>
	</form>
</body>
</html>