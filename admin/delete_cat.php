<!--delete catagory start-->




<?php require_once ("../config/config.php")?>
<?php require_once ("../lib/Database.php")?>
<?php require_once ("../helpers/formate.php")?>
<?php
$db = new Database();
$fm = new formate();


?>


<?php

        if(!isset($_GET['del_cat_id']) || $_GET['del_cat_id']==NULL){
            echo "data not found";
        }else{
            $del_id = $_GET['del_cat_id'];
        }


        $delete_query="DELETE FROM tbl_cat WHERE id=$del_id";
        $del_run = $db->delete($delete_query);

        if($del_run){

            header("location:catlist.php");
        }


?>
<!--delete catagory end-->