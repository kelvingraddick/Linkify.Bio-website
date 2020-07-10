<?php
	include $_SERVER['DOCUMENT_ROOT'].'/components/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/components/common.php';
	$database_connection = connect_to_database();
    $username = $_SESSION['username'];
    $user_result = mysqli_query($database_connection, "SELECT * FROM `users` WHERE username = '$username'");
	$user = mysqli_fetch_assoc($user_result);
    if (!$user) { header('Location: https://'.$_SERVER['SERVER_NAME']); }
    $id = $user['id'];
    $username = $user['username'];
    $full_name = $user['full_name'];
    $image_url = $user['image_url'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $site_name." - Admin"; ?></title>
	<meta name="description" content="<?php echo clean_quotes($site_name." - Admin"); ?>">
	<meta name="robots" content="index, follow">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/css/main.php'; ?>
    <style> @media (min-width: 768px) { .container { width: 1400px; } } </style>
</head>
<body>
	<?php
        include $_SERVER['DOCUMENT_ROOT'].'/components/google_analytics.php';
        include $_SERVER['DOCUMENT_ROOT'].'/banner.php'; 
        include $_SERVER['DOCUMENT_ROOT'].'/header.php';
    ?>
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="title" style="margin-top: 30px;"><i class="fa fa-link" aria-hidden="true"></i> Your URL (copy and use in bio / page / etc.)</div>
                <input class="user_input" style="width: 280px;" type="text" value="linkify.bio/<?php echo $username; ?>/" onclick="<?php echo ($mobile_detector -> isiOS() ? "this.setSelectionRange(0, 9999);" : "this.focus(); this.select();"); ?>" readonly>
                <table class="user">
                    <tr>
                        <td>
                            <div class="profile_image" style="background-image:url('<?php echo $image_url; ?>');"></div>
                        </td>
                        <td><div class="vertical_divider"></div></td>
                        <td>
                            <form method="post" action="https://<?php echo $_SERVER['SERVER_NAME']; ?>/admin/user/update.php">
                                <div class="username">@<?php echo $username; ?></div>
                                <input class="user_input" type="text" name="full_name" value="<?php echo $full_name; ?>" /><br />
                                <button class="save_button">Save</button>
                            </form>
                            <button class="logout_button" onclick="location.href='https://<?php echo $_SERVER['SERVER_NAME']; ?>/admin/logout.php';">Logout</button>
                        </td>
                    </tr>
                </table>
                <?php
                    $link_results = mysqli_query($database_connection, "SELECT * FROM `links` WHERE user_id = $id AND is_enabled = 1") or die(mysql_error());
                    while($link = mysqli_fetch_array($link_results, MYSQL_ASSOC)) {
                        echo '
                        <div class="link_editable">
                            <table>
                                <tr>
                                    <td style="width: 100%;">
                                        <form id="link_update_form_'.$link['id'].'" method="post" action="https://'.$_SERVER['SERVER_NAME'].'/admin/link/update.php">
                                            <input type="hidden" name="id" value="'.$link['id'].'" />
                                            <input class="link_input" type="text" name="name" placeholder="Display name" value="'.$link['name'].'" /><br />
                                            <input class="link_input" type="text" name="url" placeholder="URL" value="'.$link['url'].'" />
                                        </form>
                                        <form id="link_delete_form_'.$link['id'].'" method="post" action="https://'.$_SERVER['SERVER_NAME'].'/admin/link/delete.php">
                                            <input type="hidden" name="id" value="'.$link['id'].'" />
                                        </form>
                                    </td>
                                    <td class="link_button" onclick="document.getElementById(\'link_update_form_'.$link['id'].'\').submit();">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    </td>
                                    <td class="link_button" onclick="document.getElementById(\'link_delete_form_'.$link['id'].'\').submit();">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </td>
                                </tr>
                            </table>
                        </div>';
                    }
                ?>
                <div class="title"><i class="fa fa-plus" aria-hidden="true"></i> Add New Link</div>
                <div class="link_editable">
                    <table>
                        <tr>
                            <td style="width: 100%;">
                                <form id="link_insert_form" method="post" action="https://<?php echo $_SERVER['SERVER_NAME']; ?>/admin/link/insert.php">
                                    <input class="link_input" type="text" name="name" placeholder="Display name" /><br />
                                    <input class="link_input" type="text" name="url" placeholder="URL" />
                                </form>
                            </td>
                            <td class="link_button" onclick="document.getElementById('link_insert_form').submit();">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 preview">
                <div class="title"><i class="fa fa-mobile" aria-hidden="true"></i> Preview</div>
                <div class="marvel-device iphone6 silver">
                    <div class="top-bar"></div>
                    <div class="sleep"></div>
                    <div class="volume"></div>
                    <div class="camera"></div>
                    <div class="sensor"></div>
                    <div class="speaker"></div>
                    <div class="screen">
                        <iframe style="height: 100%; width: 100%; border: none;" src="https://<?php echo $_SERVER['SERVER_NAME'].'/'.$username; ?>/demo/"></iframe>
                    </div>
                    <div class="home"></div>
                    <div class="bottom-bar"></div>
                </div>
            </div>
        </div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
</body>
</html>
