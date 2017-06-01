<?php
	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	//include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
	$database_connection = connect_to_database();
	//$detect = new Mobile_Detect; 
    $username = $_GET['username'];
    $result = mysqli_query($database_connection, "SELECT * FROM `users` WHERE username = '$username'");
	if (!$result) { echo 'Could not find user by the username specified.'; }
	$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $username.' - '.$site_name; ?></title>
	<meta name="description" content="<?php echo clean_quotes($username.' - '.$site_name); ?>">
	<meta name="robots" content="index, follow">
	<meta property="fb:app_id" content="361862767338317" />
	<meta property="og:description" content="<?php echo clean_quotes($username.' - '.$site_name); ?>" />
	<meta property="og:image" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$site_image; ?>" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:title" content="<?php echo clean_quotes($username.' - '.$site_name); ?>" />
	<meta property="og:url" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
	<meta property="og:site_name" content="<?php echo $username.' - '.$site_name; ?>" />
    <meta property="article:author" content="<?php echo $username.' - '.$site_name; ?>" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@100kelvins">
	<meta name="twitter:creator" content="@100kelvins">
	<meta name="twitter:title" content="<?php echo clean_quotes($username.' - '.$site_name); ?>">
	<meta name="twitter:description" content="<?php echo clean_quotes($username.' - '.$site_name); ?>">
	<meta name="twitter:image:src" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$site_image; ?>">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/css/main.php'; ?>
</head>
<body>
	<?php 
        include $_SERVER['DOCUMENT_ROOT'].'/utility/google_analytics.php';
        include $_SERVER['DOCUMENT_ROOT'].'/header.php'; 
    ?>
	<div class="container">
        <div class="row">
			<div class="col-xs-12 col-md-12 widget">
                <?php echo $username; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 banner_ad">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Default Ad -->
				<ins class="adsbygoogle"
				     style="display:block"
				     data-ad-client="ca-pub-2031179174794311"
				     data-ad-slot="3693145434"
				     data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'; ?>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55fc175bc50d68dc" async="async"></script>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
</body>
</html>
