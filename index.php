<?php

	include "config.php";
    require_once 'dbfunc.php';
    error_reporting(E_ALL &~E_NOTICE &~E_DEPRECATED);
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
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
    <nav class = "nav nav-tabs navbar-fixed-top" style="color: white" role = "navigation">  
        <div class="navbar-header">  
            <a class="navbar-brand">blog</a>  
        </div>  
        <ul class="nav navbar-nav">  
        <?php
        $UserAccount = $_GET['UserAccount'];
        print<<<ENT

            <li><a href='index.php?UserAccount=$UserAccount'>首页</a></li>  
            <li><a href='photo.php?UserAccount=$UserAccount'>相册</a></li>  
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
            error_reporting(E_ALL &~E_NOTICE &~E_DEPRECATED);
               if ($_GET['UserAccount']) {
                $UserAccount = $_GET['UserAccount'];
                $connUser = connectDB();
                $resultUser = mysql_query("SELECT * FROM T_Users WHERE UsersAccount=$UserAccount");
                $resArrUser = mysql_fetch_assoc($resultUser);
                $UserName = $resArrUser['UsersName'];               
                session_start();
                $_SESSION['UserAccount']=$UserAccount;
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
    <div id="myCarousel" style="margin-top: 50px;" class="carousel slide">

    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   

    <div class="carousel-inner">
        <div class="item active" style="text-align: center;">
            <img src="img/1.jpg" class="center-block" alt="First slide">
        </div>
        <div class="item">
            <img src="img/2.jpg" alt="Second slide" class="center-block">
        </div>
        <div class="item">
            <img src="img/3.jpg" alt="Third slide" class="center-block">
        </div>
    </div>
    </div> 
		<div style="width: 1000px; position: relative;" class="center-block">
            <div style="width: 700px; float: left;">
                <?php

                $conn = connectDB();
                $result = mysql_query("SELECT * FROM T_Blogs ORDER BY BlogsDate ASC");
                $dataCount = mysql_num_rows($result);
                
                for ($i=0; $i < $dataCount; $i++) { 
                
                    $resArr = mysql_fetch_assoc($result);
                    $BlogID = $resArr['BlogsID'];
                    $BlogTitle = $resArr['BlogsTitle'];
                    $BlogDate = $resArr['BlogsDate'];

                    print<<<EOT
                    <div class="clearfix">
                    <h4 style="float:left"><a style="display:inline" href="content.php?id=$BlogID&&UserAccount=$UserAccount" class="nav nav-tabs">$BlogTitle</a></h4>
                    <h4 style="float:right;"><a style="display:inline; width:130px;" href="" class="nav nav-tabs navbar-right">$BlogDate</a></h4>
                    </div>
EOT;
                }
                ?>
            </div>
            <div style="width: 300px; float: left;">
                <br>
                <?php
                error_reporting(E_ALL^E_NOTICE^E_WARNING);
                if (!$_SESSION['UserAccount']) {
                    header("Location:signIn.php");
                }
                echo "
                    <a href='addBlogs.php?UserAccount=$UserAccount'><button class='btn center-block' style='width: 250px;'>发布博客</button></a>"; 
                
                 ?>
                
                <div><h3>博客分类</h3></div>
                <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                <?php 
error_reporting(E_ALL &~E_NOTICE &~E_DEPRECATED);
                $_SESSION['UserAccount'] = $UserAccount;
                 ?>
                    <a href="<?php echo "ClsssifyContent.php?BlogClassify=".'1' ?> " role="button" class="btn btn-default">随笔</a>
                    <a href="<?php echo "ClsssifyContent.php?BlogClassify=".'2' ?> "" role="button" class="btn btn-default">IT</a>
                    <a href="<?php echo "ClsssifyContent.php?BlogClassify=".'3' ?> "" role="button" class="btn btn-default">摄影</a>
                </div>
                <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                    <a href="<?php echo "ClsssifyContent.php?BlogClassify=".'4' ?> "" role="button" class="btn btn-default">生活</a>
                    <a href="<?php echo "ClsssifyContent.php?BlogClassify=".'5' ?> "" role="button" class="btn btn-default">家具</a>
                    <a href="<?php echo "ClsssifyContent.php?BlogClassify=".'6' ?> "" role="button" class="btn btn-default">旅游</a>
                </div>
                <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                    <a href="<?php echo "ClsssifyContent.php?BlogClassify=".'7' ?> "" role="button" class="btn btn-default">战争</a>
                    <a href="<?php echo "ClsssifyContent.php?BlogClassify=".'8' ?> "" role="button" class="btn btn-default">趣事</a>
                </div>

                <div><h3>推荐阅读</h3></div>
                <?php 
                    $moreCon = connectDB();
                    $moreRes = mysql_query("SELECT BlogsTitle,BlogsTimes,BlogsID FROM T_Blogs ORDER BY BlogsTimes DESC");
                    
                    $moreCount = mysql_num_rows($moreRes);
                    if ($moreCount >= 10) {
                        $moreCount = 10;
                    }
                    for ($i=0; $i < $moreCount; $i++) { 
                        $moreArr = mysql_fetch_assoc($moreRes);
                        $moreTitle = $moreArr['BlogsTitle'];

                        $moreTimes = $moreArr['BlogsTimes'];
                        $moreID = $moreArr['BlogsID'];
                        echo "
                            <a style='width:200px; overflow:hidden;' href='content.php?id=$moreID&&UserAccount=$UserAccount'>$moreTitle</a>
                            <span style='float:right; margin-right:10px;' class='badge'>$moreTimes</span>
                            <br>
                        ";
                    }
                 ?>
            </div>
			
		</div>
    
 
</body>
</html>  
