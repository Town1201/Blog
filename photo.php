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
	<link rel="stylesheet" href="css/photoStyle.css">
	<script src="js/picture.js"></script>
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

    <div style="width:1000px" class="center-block">
    <form action="loadImg.php" method="post"
enctype="multipart/form-data">
<div class="center-block" style="margin-left: 16px;">
<input style="float: left;" class="btn btn-default" type="file" name="file" id="file" /> 
<input style="float: left;" class="btn btn-default center-block" type="submit" name="submit" value="上传" />
</div>
</form>
    	<div class="container">
    		<div class="box">
    			<?php
				$dir = "./picture/";  	
				$var = 0;
				if (is_dir($dir)){
					if ($dh = opendir($dir)){
						while (($file = readdir($dh))!= false){
						$filePath = $dir.$file;
						if ($var < 2) {
							$var++;
							continue;
						}
						echo "<div class='content'><img  src='".$filePath."'/></div>  ";
						}
					closedir($dh);
					}
				}
				?>
				
    		</div>
    	</div>
    	 
    </div>

</body>
</html>