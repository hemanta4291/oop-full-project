
<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>



<?php


if(session::get("userrole") !== "0"){

    echo"<script> window.location='index.php';</script>";
}

?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Page</h2>

        <h3><?php


            if(($_SERVER["REQUEST_METHOD"])== "POST"){

                $name = $fm->validation($_POST['username']);
                $role = $fm->validation($_POST['role']);
                $pass = $fm->validation($_POST['pass']);
                $email = $fm->validation($_POST['email']);
                $chekpass = md5($pass);

                $checkname = mysqli_real_escape_string($db->link,$name);
                $checkrole = mysqli_real_escape_string($db->link,$role);
                $checkpass1 = mysqli_real_escape_string($db->link, $chekpass);
                $email = mysqli_real_escape_string($db->link, $email);


               /* if( empty($name) || empty($role) || empty($pass))*/
                   if($name == "" || $role == "" || $pass == ""){
                    echo "felid not empty";
                }else{


                       $select_q = "select * from tbl_user where usr_name='$checkname' OR pass='$checkpass1' OR email='$email'";
                       $select_run = $db->select($select_q);

                       if($select_run){
                           echo "user name and password not available";
                       }else{

                               $insert_q = "insert into tbl_user(usr_name,pass,email,role) values ('$checkname','$checkpass1','$email','$checkrole')";
                               $inser_run = $db->insert($insert_q);

                               if($inser_run){
                                   echo "insert successfull";
                               }else{
                                   echo "insert not successfull";
                               }
                       }


                }


            }

            ?></h3>
        <div class="block">
            <form action="" method="post">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter Your Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="email" name="email" placeholder="Enter Your email..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Detail</label>
                        </td>
                        <td>
                            <textarea name="Detail" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Role</label>
                        </td>
                        <td>
                            <select name="role">
                                <option value="">select role</option>
                                <option value="0">admin</option>
                                <option value="1">author</option>
                                <option value="2">editor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Password</label>
                        </td>
                        <td>
                            <input type="password" name="pass" placeholder="Enter Your password..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="create" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>


<?php  require_once ("inc/admin_footer.php"); ?>
