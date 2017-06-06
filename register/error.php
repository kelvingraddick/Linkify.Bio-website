<?php
	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
    $message = $_GET['message'];
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
	<?php include $_SERVER['DOCUMENT_ROOT'].'/css/main.php'; ?>
</head>
<body>
	<?php
        include $_SERVER['DOCUMENT_ROOT'].'/utility/google_analytics.php';
        include $_SERVER['DOCUMENT_ROOT'].'/header.php';
    ?>
	<div class="container">
        <div class="title" style="margin-top: 30px;"><i class="fa fa-error" aria-hidden="true"></i> Opps! There was an error with registration! Please go back and try again.</div>
        Message: <?php echo $message; ?><br /><br />
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
</body>
</html>
