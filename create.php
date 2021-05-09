<?php
require_once('layouts/header.php');




$errTitle=$errEmail=$errMessage="";


if($_SERVER['REQUEST_METHOD']==='POST')
{

	$title=htmlspecialchars($_POST['title']);
	$email=htmlspecialchars($_POST['email']);
	$message=htmlspecialchars($_POST['message']);


	if(!$title){
		$errTitle="title is required";
	}
	if(!$email){
		$errEmail="email is required";
	}

	if(!$message){
		$errMessage="message is required";
	}
    


 if (!$errTitle && !$errMessage && !$errEmail) {
 	
 	$st=$pdo->prepare("INSERT INTO posts 
 		(title,email,message)
 		VALUES(:title,:email,:message)
 		");

 	$st->bindValue(':title',$title);
 	$st->bindValue(':email',$email);
 	$st->bindValue(':message',$message);
 	$st->execute();
 }
   


}


?>


	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

		<div>
			<label for="title">title</label>
			<input type="text" name="title" id="email">
			<span><?php echo $errTitle; ?></span>
		</div>
			<div>
			<label for="email">email</label>
			<input type="text" name="email" id="email">
			<span><?php echo $errEmail; ?></span>
		</div>

	

		<div>
			<label for="message">message</label>
		<textarea name="message" id="message"></textarea>
		<span><?php echo $errMessage; ?></span>
		</div>

		<button>submit</button>

		
	</form>