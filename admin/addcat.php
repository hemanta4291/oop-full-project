<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">

                   <?php

                   if($_SERVER["REQUEST_METHOD"] == "POST"){
                       $catname = $_POST["catname"];

                       $usrCheck = mysqli_real_escape_string($db->link,$catname);

                       if(!empty($usrCheck)){
                           $insert_q = "insert into tbl_cat(name) values ('$usrCheck')";
                           $inser_run = $db->insert($insert_q);

                           if($inser_run==true){
                               echo "catagory inset successfull";
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
                            <td>
                                <input type="text" name="catname" placeholder="Enter Category Name..." class="medium" />
                            </td>
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
