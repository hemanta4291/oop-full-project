
<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Page</h2>

        <h3><?php


            if(($_SERVER["REQUEST_METHOD"])== "POST"){

                $name = $_POST["name"];
                $body_text = $_POST["body_text"];

                $nameCheck = mysqli_real_escape_string($db->link,$name);
                $bodyCheck = mysqli_real_escape_string($db->link,$body_text);


                if($name=='' || $body_text==''){
                    echo "felid not empty";
                }else{
                    $insert_q = "insert into tbl_page(title,body) values (' $nameCheck','$bodyCheck')";
                    $inser_run = $db->insert($insert_q);

                    if($inser_run==true){
                        echo "insert successfull";
                    }else{
                        echo "not coorent";
                    }
                }


            }


            ?></h3>
        <div class="block">
            <form action=" " method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="name" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name="body_text" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
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
