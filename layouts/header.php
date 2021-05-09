<?php
session_start();
require_once('config/db.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<?php include'successmsg.php' ;?>

	<ul>
		<?php if(!isset($_SESSION['logged_in'])): ?>
		<li><a href="login.php">Login</a></li>

		<?php else: ?>
			 <li><a href="#"><?php echo $_SESSION['user_name']; ?></a></li>
    <li><a href="logout.php">Logout</a></li>
<?php endif; ?>
	</ul>
