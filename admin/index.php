    <?php  require_once ("inc/admin_header.php"); ?>
    <?php  require_once ("inc/admin_sidebar.php"); ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  Welcome admin panel

                    <h3>

                        <?php

                            if(isset($_GET['del_msg'])){
                                echo $_GET['del_msg'];
                            }


                        ?>

                    </h3>
                </div>
            </div>
        </div>
    <?php  require_once ("inc/admin_footer.php"); ?>
