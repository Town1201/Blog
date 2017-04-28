<?php 
require_once "dbfunc.php";
	
 ?>
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
    <nav class = "nav nav-tabs navbar-fixed-top" role = "navigation">  
        <div class="navbar-header">  
            <a class="navbar-brand">blog</a>  
        </div>  
        <ul class="nav navbar-nav">  
        <?php
        $UserAccount = $_GET['UserAccount'];
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
            error_reporting(E_ALL^E_NOTICE^E_WARNING);
            error_reporting(E_ALL &~E_NOTICE &~E_DEPRECATED);

               if ($_GET['UserAccount']) {
                $connUser = connectDB();

                $resultUser = mysql_query("SELECT * FROM T_Users WHERE UsersAccount=$UserAccount");
                $resArrUser = mysql_fetch_assoc($resultUser);
                
                $UserName = $resArrUser['UsersName'];               
                $UserSex = $resArrUser['UsersSex'];
                $UserAge = $resArrUser['UsersAge'];
                $UserPhone = $resArrUser['UsersPhone'];
                $UserMail = $resArrUser['UsersMail'];               
                session_start();
                $_SESSION['UserAccount']=$UserAccount;
                if (empty($UsersName)) {
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

    <div style="width: 1000px; margin-top: 50px" class="center-block";>
    	<!-- <div style="width: 300px; float: left;"> -->
    		<?php 
    		if (!empty($_GET['id'])) {
    			$BlogID = $_GET['id'];
    			$conn = connectDB();
    			
				$result = mysql_query("SELECT * FROM T_Blogs WHERE BlogsID=$BlogID");
				$dataCount = mysql_num_rows($result);	
				$resArr = mysql_fetch_assoc($result);
				$BlogTitle = $resArr['BlogsTitle'];
				$BlogContent = $resArr['BlogsContent'];
                $BlogDate = $resArr['BlogsDate'];
				$BlogTimes = $resArr['BlogsTimes'];
                $BlogClassify = $resArr['BlogsClassify'];
                $UserID = $resArr['UsersID'];
                $BlogTimes+=1;
                mysql_query("UPDATE T_Blogs SET BlogsTimes=$BlogTimes WHERE BlogsID=$BlogID ");
                $resUser = mysql_query("SELECT UsersName FROM T_Users WHERE UsersAccount=$UserID");
                $userArr = mysql_fetch_assoc($resUser);
                $BlogUserName = $userArr['UsersName'];
                if (empty($BlogUserName)) {
                    $BlogUserName='匿名';
                }

                switch ($BlogClassify) {
                    case '1':
                        $BlogClassify = '随笔';
                        $var = 1;
                        break;
                    case '2':
                        $BlogClassify = 'IT';
                        $var = 2;
                        break;
                    case '3':
                        $BlogClassify = '摄影';
                        $var = 3;
                        break;
                    case '4':
                        $BlogClassify = '生活';
                        $var = 4;
                        break;
                    case '5':
                        $BlogClassify = '家具';
                        $var = 5;
                        break;
                    case '6':
                        $BlogClassify = '旅游';
                        $var = 6;
                        break;
                    case '7':
                        $BlogClassify = '战争';
                        $var = 7;
                        break;
                    case '8':
                        $BlogClassify = '趣事';
                        break;
                    
                }
				
    		}
    		print<<<EOT
   				<div style="margin-top:30px;">
   					<h2 class="text-center">$BlogTitle</h2>
   				</div> 	
   				<div class="center-block" style="width:250px">
					<img src="img/1.jpg" style="height:25px; width:25px;" class="img-circle" alt="">
					<label for="">作者：</label>
					<a href="">$BlogUserName</a>
                    
                    <label for="">类别：</label>
                    <a href="ClsssifyContent.php?BlogClassify=$var">$BlogClassify</a>
   				</div>
                <div class="center-block" style="width:250px">
                    <h6><b>最后编辑于:$BlogDate
                    浏览量：$BlogTimes</b></h6>
                </div>
   				<div style="width:700px;" class="center-block">
   					<p>$BlogContent</p>
   				</div>	
EOT;

    		 ?>
    	<!-- </div> -->
    	
    </div>
</body>
</html>