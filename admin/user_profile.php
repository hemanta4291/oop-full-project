
<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>

<?php

    $getses_id = session::get('userid');
    $getses_role = session::get('userrole');


?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Post</h2>

        <h3><?php


            if(($_SERVER["REQUEST_METHOD"])== "POST") {

                $user_name = $_POST["user_name"];
                $email = $_POST["email"];
                $details = $_POST["details"];


                $user_name = mysqli_real_escape_string($db->link, $user_name);
                $email = mysqli_real_escape_string($db->link, $email);
                $details = mysqli_real_escape_string($db->link, $details);



                if ($user_name == '' || $email == ''  || $details == '') {
                    echo "felid not empty";
                }else{
                        $insert_q = "update tbl_user 
                                    set 
                                    usr_name='$user_name',
                                    email='$email',
                                    details='$details'
                                     where 
                                    id=$getses_id  and role='$getses_role'";

                        $inser_run = $db->update($insert_q);

                        if ($inser_run == true) {
                            echo "update successfull";
                        } else {
                            echo "not update";
                        }

                    }

            }
            ?></h3>
        <div class="block">
            <form action=" " method="post">
                <table class="form">

                    <?php

                    $show_post = "select * from tbl_user where id=$getses_id and role='$getses_role'";
                    $show_post_run = $db->select($show_post);

                    if($show_post_run){

                        while($get_single_post = $show_post_run->fetch_assoc()){ ?>



                            <tr>
                                <td>
                                    <label>username</label>
                                </td>
                                <td>
                                    <input type="text" name="user_name" value="<?php echo $get_single_post["usr_name"]; ?>"  placeholder="Enter Post Title..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>email</label>
                                </td>
                                <td>
                                    <input name="email" value="<?php echo $get_single_post["email"]; ?>" type="email" id="date-picker" />
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Details</label>
                                </td>
                                <td>
                                    <input name="details" value="<?php echo $get_single_post["details"]; ?>" type="text" />
                                </td>
                            </tr>

                        <?php  } } ?>


                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="update" />
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
