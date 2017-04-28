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
    <meta name="HandheldFriendly" content="True" />
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
            
               if (isset($_GET['UserAccount'])) {
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
    <div style="width: 1000px;" class="row center-block">
            <div class="col-md-2">
                <div class="panel-group table-responsive" role="tablist">
                    <div class="panel panel-primary leftMenu">
                        <!-- 利用data-target指定要折叠的分组列表 -->
                        <div class="panel-heading" id="collapseListGroupHeading1" data-toggle="collapse" data-target="#collapseListGroup1" role="tab" >
                            <h4 class="panel-title">
                                个人信息
                            </h4>
                        </div>
                        
                        <div id="collapseListGroup1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="collapseListGroupHeading1">
                            <ul class="list-group">
                              <li class="list-group-item">
                                
                                <button class="menu-item-left">
                                <?php 
                                    echo "<a href='userInfo.php?UserAccount=$UserAccount'>资料</a>";
                                 ?>
                                    
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left" data-target="user.php">
                                <?php 
                                    echo "<a href='user.php?UserAccount=$UserAccount'>好友</a>";
                                ?>
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                 <?php 
                                    echo "<a href='user.php?UserAccount=$UserAccount'>关注</a>";
                                 ?>
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                 <?php 
                                    echo "<a href='user.php?UserAccount=$UserAccount'>通知</a>";
                                 ?>
                                </button>
                              </li>
                            
                            </ul>
                        </div>
                    </div><!--panel end-->
                    <div class="panel panel-primary leftMenu">
                        <div class="panel-heading" id="collapseListGroupHeading2" data-toggle="collapse" data-target="#collapseListGroup2" role="tab" >
                            <h4 class="panel-title">
                                博客管理
                            </h4>
                        </div>
                        <div id="collapseListGroup2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
                            <ul class="list-group">
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                    <?php 
                                    echo "<a href='blogManage.php?UserAccount=$UserAccount'>管理</a>";
                                 ?>
                                </button>
                              </li>
                              <li class="list-group-item">
                                <button class="menu-item-left">
                                    <?php 
                                    echo "<a href='addBlogs.php?UserAccount=$UserAccount'>发布</a>";
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
                $conn = connectDB();
                $result = mysql_query("SELECT * FROM T_Blogs WHERE UsersID=$UserAccount");
                $dataCount = mysql_num_rows($result);
                
                for ($i=0; $i < $dataCount; $i++) { 
                
                    $resArr = mysql_fetch_assoc($result);
                    $BlogID = $resArr['BlogsID'];
                    $BlogTitle = $resArr['BlogsTitle'];
                    $BlogDate = $resArr['BlogsDate'];

                    print<<<EOT
                    <div class="clearfix">
                    <h4 style="float:left"><a style="display:inline" href="content.php?id=$BlogID" class="nav nav-tabs">$BlogTitle</a></h4>
                    <a href="updateBlog.php?BlogID=$BlogID" style="float:right"><button class="btn btn-default">修改</button></a>
                    <a href="deleteBlog.php?BlogID=$BlogID" style="float:right"><button class="btn btn-default">删除</button></a>
                    </div>
EOT;
                }
                ?>
            </div>
        </div>
        <!-- jQuery1.11.3 (necessary for Bo otstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.3.min.js "></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js "></script>
        <script>
        $(function(){
            $(".panel-heading").click(function(e){
                /*切换折叠指示图标*/
                $(this).find("span").toggleClass("glyphicon-chevron-down");
                $(this).find("span").toggleClass("glyphicon-chevron-up");
            });
        });
        </script>
</body>
</html>
