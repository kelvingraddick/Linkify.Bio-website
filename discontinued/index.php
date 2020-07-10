<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	$database_connection = connect_to_database();
    $description = 'Quickly provide multiple links in a social bio or ad through a single link!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $site_name; ?></title>
	<meta name="description" content="<?php echo clean_quotes($description); ?>">
	<meta name="robots" content="index, follow">
	<meta property="fb:app_id" content="361862767338317" />
	<meta property="og:description" content="<?php echo clean_quotes($description); ?>" />
	<meta property="og:image" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$site_image; ?>" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:title" content="<?php echo clean_quotes($site_name); ?>" />
	<meta property="og:url" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
	<meta property="og:site_name" content="<?php echo $site_name; ?>" />
    <meta property="article:author" content="<?php echo $site_name; ?>" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@KGcodes">
	<meta name="twitter:creator" content="@KGcodes">
	<meta name="twitter:title" content="<?php echo clean_quotes($site_name); ?>">
	<meta name="twitter:description" content="<?php echo clean_quotes($description); ?>">
	<meta name="twitter:image:src" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$site_image; ?>">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/css/main.php'; ?>
</head>
<body style="background-color: white;">
	<?php 
        include $_SERVER['DOCUMENT_ROOT'].'/components/google_analytics.php';
        include $_SERVER['DOCUMENT_ROOT'].'/banner.php'; 
        include $_SERVER['DOCUMENT_ROOT'].'/header.php'; 
    ?>
    <div class="row jumbotron">
        <div class="col-xs-1 col-md-2"></div>
        <div class="col-xs-10 col-md-8 jumbotron_overlay">
            <div class="jumbotron_overlay_title">
                <h1>Thank you for using Linkify.Bio!</h1>
            </div>
        </div>
    </div>
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 features">
                It is with a heavy heart that I inform you Linkify.Bio is not currently supported and <b>will be discontineud in the next few months</b>.
                <br /><br />
                Hi; I'm Kelvin Graddick. I developed Linkify.Bio back in 2017 when I needed a much <b>prettier/better option for a landing page from my social media accounts</b>.<br />
                I think I succeeded in making Linkify.Bio easy to setup/use (no need to enter email), free, and that looked great for your links.
                <br /><br />
                As the next few years rolled by my time went to other projects leaving this service to fail behind the other options.
                Once Facebook shut down support for "login with Instagram" in June 2020, it makes this service harder to use.
                <br /><br />
                Since I cannot support this service anymore and <b>make it valuable for users</b>, I've decided to shut it down in the next few months.<br />
                Please use other great, well-supported options like <b><a href="https://www.linktr.ee.com" target="_blank">LinkTree</a></b> and <b><a href="https://www.later.com" target="_blank">Later</a></b>.
                <br /><br />
                As always, thank you for using this service and for the support!
                <br /><br />
                Feel free to <b>connect with me and learn about my newer projects</b>:<br />
                🔥 Website | <a href="https://www.kg.codes" target="_blank">www.KG.codes</a></b><br />
                📷 Instagram | <a href="https://www.instagram.com/kg.codes/" target="_blank">@KG.codes</a></b><br />
                🐦 Twitter | <a href="https://www.twitter.com/kgcodes/" target="_blank">@KGcodes</a></b><br />
                📺 YouTube | <a href="https://www.youtube.com/channel/UCfv7SNcMWwn8QANjD7AgY5w?sub_confirmation=1" target="_blank">KG.codes channel</a></b><br />
                <br /><br />
                Coded with ❤️ by <a href="https://www.kg.codes" alt="KG.codes" target="_blank">KG.codes</a>
			</div>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
</body>
</html>
