

<?php require_once ("config/config.php")?>
<?php require_once ("lib/Database.php")?>
<?php require_once ("helpers/formate.php")?>
<?php
$db = new Database();
$fm = new formate();

?>



<!DOCTYPE html>
<html>
<head>
    <?php

        if(isset($_GET['page_id'])) {

            $get_id = $_GET['page_id'];

            $show_post = "select * from tbl_page where id=$get_id";
            $show_post_run = $db->select($show_post);

            if ($show_post_run) {
                $get_single_post = $show_post_run->fetch_assoc(); ?>
                <title><?php echo $get_single_post['title'];?></title>

           <?php } }

        /*for post*/

        else if(isset($_GET['signle_post_id'])){

            $get_id = $_GET['signle_post_id'];

            $show_post = "select * from tbl_post where id=$get_id";
            $show_post_run = $db->select($show_post);

            if($show_post_run){
                $get_single_post = $show_post_run->fetch_assoc();?>
                <title><?php echo $get_single_post['title'];?></title>

           <?php } ?>



        <?php }

        /*for post end*/


        /*for catagory*/

        else if(isset($_GET['catatory_id'])){

            $get_id = $_GET['catatory_id'];

            $show_post = "select * from tbl_cat where id=$get_id";
            $show_post_run = $db->select($show_post);

            if($show_post_run){

                $get_single_post = $show_post_run->fetch_assoc();?>
                <title><?php echo $get_single_post['name'];?></title>

            <?php } ?>



        <?php }

        /*for catagory end*/


        else{ ?>
            <title><?php echo $fm->title();?></title>
            <?php }  ?>

    <meta name="language" content="English">
    <meta name="description" content="It is a website about education">
    <meta name="keywords" content="blog,cms blog">
    <meta name="author" content="Delowar">
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider({
                effect:'random',
                slices:10,
                animSpeed:500,
                pauseTime:5000,
                startSlide:0, //Set starting Slide (0 index)
                directionNav:false,
                directionNavHide:false, //Only show on hover
                controlNav:false, //1,2,3...
                controlNavThumbs:false, //Use thumbnails for Control Nav
                pauseOnHover:true, //Stop animation while hovering
                manualAdvance:false, //Force manual transitions
                captionOpacity:0.8, //Universal caption opacity
                beforeChange: function(){},
                afterChange: function(){},
                slideshowEnd: function(){} //Triggers after all slides have been shown
            });
        });
    </script>
</head>

<body>
<div class="headersection templete clear">
    <a href="index.php">
        <div class="logo">
            <?php

                $show_post = "select * from title_slogan";
                $show_post_run = $db->select($show_post);

                if ($show_post_run) {
                    $get_single_post = $show_post_run->fetch_assoc();
                }
            ?>
            <img src="admin/<?php echo $get_single_post['logo'];?>" alt="Logo"/>
            <h2><?php echo $get_single_post['title'];?></h2>
            <p><?php echo $get_single_post['slogan'];?></p>
        </div>
    </a>
    <div class="social clear">
        <?php

        $show_post = "select * from tbl_social";
        $show_post_run = $db->select($show_post);

        if ($show_post_run) {
            $get_single_post = $show_post_run->fetch_assoc();
        }


        ?>
        <div class="icon clear">
            <a href="<?php echo $get_single_post['fa']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="<?php echo $get_single_post['ln']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="<?php echo $get_single_post['tw']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="<?php echo $get_single_post['gp']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
        </div>
        <div class="searchbtn clear">
            <form action="search.php" method="post">
                <input type="text" name="search" placeholder="Search keyword..."/>
                <input type="submit" name="submit" value="Search"/>
            </form>
        </div>
    </div>
</div>
<div class="navsection templete">

    <ul>
        <li><a

                <?php
                $path = $_SERVER['SCRIPT_FILENAME'];
                $curren = basename($path,'.php');

                    if($curren=='index'){
                         echo 'id="active"';
                    }

                ?>


                    href="index.php">Home</a></li>
        <?php
        $show_post = "select * from tbl_page";
        $show_post_run = $db->select($show_post);

        if($show_post_run){

            while ($get_single_post = $show_post_run->fetch_assoc()){ ?>
                <li><a
                          <?php

                            if(isset($_GET['page_id']) && $_GET['page_id']== $get_single_post['id']){

                                echo 'id="active"';
                            }

                          ?>

                            href="page.php?page_id=<?php echo $get_single_post['id']; ?>"><?php echo $get_single_post['title']; ?></a></li>

          <?php  } } ?>
        <li><a <?php
               if($curren=='contact_us'){
                   echo 'id="active"';
               } ?>href="contact_us.php">Contact</a></li>

    </ul>
</div>
