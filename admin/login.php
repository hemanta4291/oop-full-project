
<?php require_once ("../lib/session.php");

 session::logainsession();

?>

<?php require_once ("../config/config.php")?>
<?php require_once ("../lib/Database.php")?>
<?php require_once ("../helpers/formate.php")?>
<?php
$db = new Database();
$fm = new formate();

?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

        <?php

            if($_SERVER["REQUEST_METHOD"] == 'POST'){


                $usrName = $fm->validation($_POST['username']);
                $usrPass = $fm->validation($_POST['password']);
                $mduserpass = md5($usrPass);

                $usrCheck = mysqli_real_escape_string($db->link,$usrName);
                $usrcheckPass = mysqli_real_escape_string($db->link,$mduserpass);

                $login_q = "select * from tbl_user where usr_name='$usrCheck' AND pass='$usrcheckPass'";
                $run_q = $db->select($login_q);

                if($run_q==true){
                    $value =mysqli_fetch_array($run_q );
                    $run_rows = mysqli_num_rows($run_q);

                    if($run_rows>0){
                        session::set("login",true);
                        session::set("user", $value["usr_name"]);
                        session::set("userid", $value["id"]);
                        session::set("userrole", $value["role"]);
                        header("location:index.php");
                    }else{
                        echo "no result found";
                    }
                }else{
                    echo "user name or password not match";
                    var_dump($run_q);

                }


            }

        ?>


		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
        <div class="button">
            <a href="forget_password.php">forget password</a>
        </div><!-- button -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>