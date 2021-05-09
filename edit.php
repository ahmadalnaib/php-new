<?php
require_once('layouts/header.php');


$id=$_GET['id'] ?? null;
if(!$id){
	die('error');
}

$st=$pdo->prepare('SELECT * FROM posts WHERE id=:id');
$st->bindValue(':id',$id);
$st->execute();
$post=$st->fetch(PDO::FETCH_ASSOC);




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
 	
 	$st=$pdo->prepare("UPDATE posts SET title=:title,
 		                                email=:email,
 		                                message=:message 
 		                                 WHERE id=:id ");

 	$st->bindValue(':title',$title);
 	$st->bindValue(':email',$email);
 	$st->bindValue(':message',$message);
 	$st->bindValue(':id',$id);
 	$st->execute();
 	header('location:index.php');
 	exit;
 }
   


}


?>


	<form action="" method="post" enctype="multipart/form-data">

		<div>
			<label for="title">title</label>
			<input type="text" name="title" id="email" value="<?php echo $post['title'] ?>">
			<span><?php echo $errTitle; ?></span>
		</div>
			<div>
			<label for="email">email</label>
			<input type="text" name="email" id="email" value="<?php echo $post['email'] ?>">
			<span><?php echo $errEmail; ?></span>
		</div>

	

		<div>
			<label for="message">message</label>
		<textarea name="message" id="message"><?php echo $post['message']; ?></textarea>
		<span><?php echo $errMessage; ?></span>
		</div>

		<button>submit</button>

		
	</form>