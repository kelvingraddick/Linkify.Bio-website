<?php
	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	$database_connection = connect_to_database();
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
        <table class="user">
            <tr>
                <td>
                    <div class="profile_image" style="background-image:url('<?php echo $user['image_url']; ?>');"></div>
                </td>
                <td>
                    <div class="vertical_divider"></div>
                </td>
                <td>
                    <div class="fullname"><?php echo $user['full_name']; ?></div>
                    <div class="username">@<?php echo $username; ?></div>
                </td>
            </tr>
		</table>
        <div class="link" onclick="location.href='http://www.100kelvins.com/music';">
            <table>
                <tr>
                    <td>
                        <img class="link_favicon" src="https://www.google.com/s2/favicons?domain=www.100kelvins.com/music/" />
                    </td>
                    <td>
                        <div class="link_divider"></div>
                    </td>
                    <td>
                        <div class="link_name">100kelvins Music</div>
                        <div class="link_url">www.100kelvins.com/music/</div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="link" onclick="location.href='http://www.twitter.com/100kelvins';">
            <table>
                <tr>
                    <td>
                        <img class="link_favicon" src="https://www.google.com/s2/favicons?domain=www.twitter.com/100kelvins" />
                    </td>
                    <td>
                        <div class="link_divider"></div>
                    </td>
                    <td>
                        <div class="link_name">Twitter (@100kelvins)</div>
                        <div class="link_url">www.twitter.com/100kelvins</div>
                    </td>
                </tr>
            </table>
        </div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
</body>
</html>
