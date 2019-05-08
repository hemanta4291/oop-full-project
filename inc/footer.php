

<?php require_once ("config/config.php")?>
<?php require_once ("lib/Database.php")?>
<?php require_once ("helpers/formate.php")?>
<?php
$db = new Database();
$fm = new formate();

?>


</div>

<div class="footersection templete clear">
    <div class="footermenu clear">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Privacy</a></li>
        </ul>
    </div>

    <?php

    $show_post = "select * from tbl_footer";
    $show_post_run = $db->select($show_post);

    if ($show_post_run) {
        $get_single_post = $show_post_run->fetch_assoc();
    }

    ?>

    <p><?php echo $get_single_post['text'];?></p>
</div>
<div class="fixedicon clear">
    <a href="http://www.facebook.com"><img src="images/fb.png" alt="Facebook"/></a>
    <a href="http://www.twitter.com"><img src="images/tw.png" alt="Twitter"/></a>
    <a href="http://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"/></a>
    <a href="http://www.google.com"><img src="images/gl.png" alt="GooglePlus"/></a>
</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>