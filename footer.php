<div class="row">
    <div class="col-xs-12 col-md-12 banner_ad">
        <?php
            if($mobile_detector->isMobile()) {
                include $_SERVER['DOCUMENT_ROOT'].'/components/google_adsense_mobile.php';
            } else {
                include $_SERVER['DOCUMENT_ROOT'].'/components/google_adsense_desktop.php';
            }
        ?>
    </div>
</div>
