<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/twitteroauth/load.php';
    include $_SERVER['DOCUMENT_ROOT'].'/components/twitteroauth/url.php';
	$database_connection = connect_to_database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $site_name; ?></title>
	<meta name="description" content="<?php echo clean_quotes($site_name); ?>">
	<meta name="robots" content="index, follow">
	<meta property="fb:app_id" content="361862767338317" />
	<meta property="og:description" content="<?php echo clean_quotes($site_name); ?>" />
	<meta property="og:image" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$site_image; ?>" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:title" content="<?php echo clean_quotes($site_name); ?>" />
	<meta property="og:url" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
	<meta property="og:site_name" content="<?php echo $site_name; ?>" />
    <meta property="article:author" content="<?php echo $site_name; ?>" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@100kelvins">
	<meta name="twitter:creator" content="@100kelvins">
	<meta name="twitter:title" content="<?php echo clean_quotes($site_name); ?>">
	<meta name="twitter:description" content="<?php echo clean_quotes($site_name); ?>">
	<meta name="twitter:image:src" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$site_image; ?>">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/css/main.php'; ?>
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/css/iphone.css" type="text/css">
</head>
<body>
	<?php 
        include $_SERVER['DOCUMENT_ROOT'].'/utility/google_analytics.php';
        include $_SERVER['DOCUMENT_ROOT'].'/header.php'; 
    ?>
    <div class="row jumbotron">
        <div class="col-xs-1 col-md-2"></div>
        <div class="col-xs-10 col-md-8 jumbotron_overlay">
            <div class="jumbotron_overlay_title">
                Quickly provide multiple links in a social bio or ad through a single link!
            </div>
            <div class="jumbotron_overlay_buttons">
                <button class="instagram_button" onclick="location.href='https://api.instagram.com/oauth/authorize/?client_id=4a18edf1ceff4747b2c06e38d3395b34&redirect_uri=http://linkify.bio/register/instagram.php&response_type=code';">
                    <i class="fa fa-instagram" aria-hidden="true"></i> Sign in with Instagram
                </button>
                <button class="twitter_button" onclick="location.href='<?php echo $twitter_login_url; ?>';">
                    <i class="fa fa-twitter" aria-hidden="true"></i> Sign in with Twitter
                </button>
            </div>
        </div>
        <div class="col-xs-1 col-md-2"></div>
    </div>
	<div class="container">
        <div class="row">
			<div class="col-xs-12 col-md-12">
                <div class="marvel-device iphone6 silver">
                    <div class="top-bar"></div>
                    <div class="sleep"></div>
                    <div class="volume"></div>
                    <div class="camera"></div>
                    <div class="sensor"></div>
                    <div class="speaker"></div>
                    <div class="screen">
                        <iframe style="height: 100%; width: 100%; border: none;" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/100kelvins/demo/"></iframe>
                    </div>
                    <div class="home"></div>
                    <div class="bottom-bar"></div>
                </div>
			</div>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'; ?>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55fc175bc50d68dc" async="async"></script>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
</body>
</html>
