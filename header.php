<div class="row header">
    <div class="col-xs-4 col-md-4">
        <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/">
            <img class="header_logo_img" src="https://<?php echo $_SERVER['SERVER_NAME']; ?>/images/linkify.bio-logo.png" />
        </a>
    </div>
    <div class="col-xs-4 col-md-4 header_space"></div>
    <div class="col-xs-4 col-md-4">
        <?php
            if (strpos($_SERVER['REQUEST_URI'], "admin") == false){
                echo '<button class="header_button" onclick="location.href=\'https://'.$_SERVER['SERVER_NAME'].'/\';">Get Your Page</button>';
            }
        ?>
    </div>
</div>
