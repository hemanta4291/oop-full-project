
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


            $usrEmail = $fm->validation($_POST['userMail']);

            $usrEmail = mysqli_real_escape_string($db->link,$usrEmail);

            if(!filter_var($usrEmail, FILTER_VALIDATE_EMAIL)){
                echo "indalid email";
            }else {

                $login_q = "select * from tbl_user where email='$usrEmail' limit 1";
                $run_q = $db->select($login_q);

                if ($run_q) {
                    $value = $run_q->fetch_assoc();
                    $uerId = $value['id'];
                    $uerName = $value['usr_name'];


                    $sub = substr($usrEmail,2,5);
                    $ran = rand(5748,8974);
                    $newPass = "$sub$ran";
                    $mdPass = md5($newPass);

                    $update_q = "update tbl_user set pass='$mdPass' where id=$uerId";
                    $update_run = $db->update($update_q);


                    $to = "$usrEmail";
                    $form = "hkr@gmail.com";
                    $headers = "From: $form\n";
                    $headers.= 'MIME-Version: 1.0';
                    $headers.= 'Content-type: text/html; charset=iso-8859-1';
                    $subject = "Your Password";
                    $message = "Your Username is :".$uerName."And New Password is :".$newPass."please login here";

                    $emailSend = mail($to, $subject, $message, $headers);

                    if($emailSend){
                        echo "email successfully done";
                    }else{
                        echo "email not successfully done";
                    }



                } else {
                    echo "email not exit";

                }

            }
        }

        ?>


        <form action="" method="post">
            <h1>Recover Password</h1>
            <div>
                <input type="text" placeholder="Enter Your valid Email"  name="userMail"/>
            </div>
            <div>
                <input type="submit" value="Log in" />
            </div>
        </form><!-- form -->
        <div class="button">
            <a href="login.php">login</a>
        </div><!-- button -->
        <div class="button">
            <a href="#">Training with live project</a>
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>