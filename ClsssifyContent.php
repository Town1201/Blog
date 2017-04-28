<?php

	include "config.php";
    require_once 'dbfunc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
            .panel-group{max-height:770px;overflow: auto;}
            .leftMenu{margin:10px;margin-top:5px;}
            .leftMenu .panel-heading{font-size:14px;padding-left:20px;height:36px;line-height:36px;color:white;position:relative;cursor:pointer;}/*转成手形图标*/
            .leftMenu .panel-heading span{position:absolute;right:10px;top:12px;}
            .leftMenu .menu-item-left{padding: 2px; background: transparent; border:1px solid transparent;border-radius: 6px;}
            .leftMenu .menu-item-left:hover{background:#C4E3F3;border:1px solid #1E90FF;}
    </style>
</head>
<body>  
    <nav class = "nav nav-tabs" role = "navigation">  
        <div class="navbar-header">  
            <a class="navbar-brand">blog</a>  
        </div>  
        <ul class="nav navbar-nav">  
        <?php
        session_start();
        $UserAccount = $_SESSION['UserAccount'];
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
            
               if ($UserAccount!=0) {
                
                $connUser = connectDB();
                $resultUser = mysql_query("SELECT * FROM T_Users WHERE UsersAccount=$UserAccount");
                $resArrUser = mysql_fetch_assoc($resultUser);
                $UserName = $resArrUser['UsersName'];               
                
                
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
    <div style="width: 1000px" class="center-block">
    <div class="col-md-2">
                <div class="panel-group table-responsive" role="tablist">
                    <div class="panel panel-primary leftMenu">
                       
                        <div class="panel-heading" id="collapseListGroupHeading1" data-toggle="collapse" data-target="#collapseListGroup1" role="tab" >
                            <h4 class="panel-title">
                                博客分类
                            </h4>
                        </div>
                        
                        <div id="collapseListGroup1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="collapseListGroupHeading1">
                            <ul class="list-group">
                                <li class="list-group-item">
                                
                                <button class="menu-item-left">
                                <?php 
                                $var=0;
                                    echo "<a href='ClsssifyContent.php?BlogClassify=$var'>全部</a>";
                                 ?>
                                    
                                </button>
                              </li>
                              <li class="list-group-item">
                                
                                <button class="menu-item-left">
                                <?php 
                                $var=1;
                                    echo "<a href='ClsssifyContent.php?BlogClassify=$var'>随笔</a>";
                                 ?>
                                    
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left" data-target="user.php">
                                <?php 
                                $var=2;
                                    echo "<a href='ClsssifyContent.php?BlogClassify=$var'>IT</a>";
                                ?>
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                 <?php 
                                 $var=3;
                                    echo "<a href='ClsssifyContent.php?BlogClassify=$var'>摄影</a>";
                                 ?>
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                 <?php 
                                 $var=4;
                                    echo "<a href='ClsssifyContent.php?BlogClassify=$var'>生活</a>";
                                 ?>
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                 <?php 
                                 $var=5;
                                    echo "<a href='ClsssifyContent.php?BlogClassify=$var'>家具</a>";
                                 ?>
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                 <?php 
                                 $var=6;
                                    echo "<a href='ClsssifyContent.php?BlogClassify=$var'>旅游</a>";
                                 ?>
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                 <?php 
                                 $var=7;
                                    echo "<a href='ClsssifyContent.php?BlogClassify=$var'>战争</a>";
                                 ?>
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                 <?php 
                                 $var=8;
                                    echo "<a href='ClsssifyContent.php?BlogClassify=$var'>趣事</a>";
                                 ?>
                                </button>
                              </li>
                            
                            </ul>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-10" style="margin-top: 30px;">
                        <?php 
                            $BlogClassify = $_GET['BlogClassify'];
                            $conn = connectDB();
                            if ($BlogClassify == 0) {
                                $res = mysql_query("SELECT * FROM T_Blogs");  
                                $resCount = mysql_num_rows($res);  
                                echo "
                                <h2 class='text-center'>全部</h2>
                            ";
                            for ($i=0; $i < $resCount; $i++) { 
                                $resArr = mysql_fetch_assoc($res);
                                $BlogID = $resArr['BlogsID'];
                                $BlogTitle = $resArr['BlogsTitle'];
                                $BlogDate = $resArr['BlogsDate'];

                                echo "
                                <div class='clearfix'>
                                <h4 style='float:left'><a style='display:inline' href='content.php?id=$BlogID&&UserAccount=$UserAccount' class='nav nav-tabs'>$BlogTitle</a></h4>
                                <h4 style='float:right;''><a style='display:inline; width:130px;'' class='nav nav-tabs navbar-right'>$BlogDate</a></h4>
                                </div>";
                         
                                }                           
                            }else{
                            $res = mysql_query("SELECT * FROM T_Blogs WHERE BlogsClassify=$BlogClassify");
                            $resCount = mysql_num_rows($res);
                            
                            switch ($BlogClassify) {
                            case '1':
                                $BlogClassify = '随笔';
                                break;
                            case '2':
                                $BlogClassify = 'IT';
                                break;
                            case '3':
                                $BlogClassify = '摄影';
                                break;
                            case '4':
                                $BlogClassify = '生活';
                                break;
                            case '5':
                                $BlogClassify = '家具';
                                break;
                            case '6':
                                $BlogClassify = '旅游';
                                break;
                            case '7':
                                $BlogClassify = '战争';
                                break;
                            case '8':
                                $BlogClassify = '趣事';
                                break;
                            }
                            echo "
                                <h2 class='text-center'>$BlogClassify</h2>
                            ";
                            for ($i=0; $i < $resCount; $i++) { 
                                $resArr = mysql_fetch_assoc($res);
                                $BlogID = $resArr['BlogsID'];
                                $BlogTitle = $resArr['BlogsTitle'];
                                $BlogDate = $resArr['BlogsDate'];

                                echo "
                                <div class='clearfix'>
                                <h4 style='float:left'><a style='display:inline' href='content.php?id=$BlogID&&UserAccount=$UserAccount' class='nav nav-tabs'>$BlogTitle</a></h4>
                                <h4 style='float:right;''><a style='display:inline; width:130px;'' class='nav nav-tabs navbar-right'>$BlogDate</a></h4>
                                </div>";
                         
                            }
                            
                            }
                         ?>
                    </div>
                </div>
            </div>
            </div>
</body>
</html>