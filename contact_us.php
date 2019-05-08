
<?php require_once ("inc/header.php")?>


<?php

    if($_SERVER["REQUEST_METHOD"] == 'POST'){


        $fname = $fm->validation($_POST['firstname']);
        $lname = $fm->validation($_POST['lastname']);
        $usrEmail = $fm->validation($_POST['email']);
        $userTextarea = $fm->validation($_POST['textarea']);

        $fname = mysqli_real_escape_string($db->link,$fname);
        $lname = mysqli_real_escape_string($db->link,$lname);
        $usrEmail = mysqli_real_escape_string($db->link,$usrEmail);
        $userTextarea = mysqli_real_escape_string($db->link,$userTextarea);


        $error = '';

        if($fname==''){
            $error = "Frist name field is not empty";
        }else if($lname==''){
            $error = "Last name field is not empty";
        }else if($usrEmail==''){
            $error = "Email field is not empty";
        }else if(!filter_var($usrEmail, FILTER_VALIDATE_EMAIL)){
            $error = "indalid email";
        }else if($userTextarea==''){
            $error = "Text Area field is not empty";
        }else{
            $insert_q = "insert into tbl_contact(fname,lname,email,body) 
            values ('$fname','$lname','$usrEmail','$userTextarea')";
            $run_q = $db->insert($insert_q);
            if($run_q){
                $msg = "Submit Successfull";
            }else{
                $error ="not submit";
            }

        }
    }

?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>

                <p style="color: red;">

                    <?php

                        if(isset($error)){
                            echo $error;
                        }
                        if(isset($msg)){
                            echo $msg;
                        }

                    ?>

                </p>

			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="textarea"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
        <?php require_once ("inc/sidebar.php")?>
        <?php require_once ("inc/footer.php")?>
