
<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>

<?php

if(!isset($_GET['replay_id']) || $_GET['replay_id']== NULL){

    header("location:inbox.php");
}else{
    $view_id = $_GET['replay_id'];
}

if($_SERVER["REQUEST_METHOD"] == 'POST'){

    $to = $fm->validation($_POST['toEmail']);
    $from = $fm->validation($_POST['email']);
    $subject = $fm->validation($_POST['subject']);
    $massage = $fm->validation($_POST['massage']);

    $fname = mysqli_real_escape_string($db->link,$to);
    $lname = mysqli_real_escape_string($db->link,$from);
    $usrEmail = mysqli_real_escape_string($db->link,$subject);
    $userTextarea = mysqli_real_escape_string($db->link,$massage);

    $sendMail = mail($to,$subject,$massage,$from);

    if($sendMail){
        echo "mail send successfully";
    }else{
        echo "mail not send";
    }
}


?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Page</h2>
        <div class="block">
            <form action=" " method="post">
                <table class="form">

                    <?php
                    $show_post = "select * from tbl_contact where id=$view_id";
                    $show_post_run = $db->select($show_post);

                    $get_data= $show_post_run->fetch_assoc();

                    ?>
                    <tr>
                        <td>
                            <label>to</label>
                        </td>
                        <td>
                            <input type="text" readonly name="toEmail" value="<?php echo $get_data['email'];?>" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>form</label>
                        </td>
                        <td>
                            <input type="email" name="email" placeholder="Enter Your Email" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>subject</label>
                        </td>
                        <td>
                            <input type="text"  name="subject" placeholder="Enter Subject" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>massage</label>
                        </td>
                        <td>
                            <textarea name="massage" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="send" />
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
