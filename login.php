<?php 
require_once('layouts/header.php');






if($_SERVER['REQUEST_METHOD']=== 'POST'){

	$username=htmlspecialchars($_POST['username']);
$password=htmlspecialchars($_POST['password']);


$st=$pdo->prepare('SELECT * From users');
$st->execute();
$users=$st->fetchAll(PDO::FETCH_ASSOC);


foreach($users as $user){
	if(($user['username'] ==$username) &&($user['password']==$password)){
		$_SESSION['logged_in']=true;
		$_SESSION['user_id']=$user['id'];
		$_SESSION['user_name']=$user['username'];
		header('location:index.php');
		exit;

	} else{
		die('error username');

	}

} 

}



?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST'>
   <div>
	<label for="username">username</label>
	<input name="username" id="username">
</div>
<div>
	<label for="password">password</label>
	<input type="password" name="password">
</div>

<button>submit</button>

	</form>