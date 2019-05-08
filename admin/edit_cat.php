<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>


<?php


if(!isset($_GET['edi_cat_id']) || $_GET['edi_cat_id']== NULL){

    header("location:catlist.php");
}else{
    $edit_id = $_GET['edi_cat_id'];
}


?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Category</h2>
        <div class="block copyblock">

            <?php

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $catname = $_POST["catname"];

                $usrCheck = mysqli_real_escape_string($db->link,$catname);

                if(!empty($usrCheck)){
                    $insert_q = "update tbl_cat set name='$catname' where id=$edit_id";
                    $inser_run = $db->update($insert_q);

                    if($inser_run==true){
                        echo "catagory update successfull";
                    }else{
                        echo "not coorent";
                    }
                }else{
                    echo "felid not empty";
                }
            }
            ?>



            <form action=" " method="post">
                <table class="form">
                    <tr>
                        <?php

                            $myedit_show = "select * from tbl_cat where id=$edit_id order by id desc ";
                            $run_q = $db->select($myedit_show);
                            if($run_q==true){

                                $get_value = $run_q->fetch_assoc(); ?>
                                <td>
                                    <input type="text" name="catname" value="<?php echo $get_value['name']; ?>" placeholder="Enter Category Name..." class="medium" />
                                </td>
                            <?php } ?>

                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php  require_once ("inc/admin_footer.php"); ?>
