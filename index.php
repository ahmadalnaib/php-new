<?php require_once('layouts/header.php');




$st=$pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');
$st->execute();
$posts=$st->fetchAll(PDO::FETCH_ASSOC);



 ?>


 <div>
 	<?php foreach($posts as $post): ?>
      <h1><?php echo $post['title']; ?></h1>
      <P><?php echo $post['message']; ?></P>

     <a href="edit.php?id=<?php echo $post['id']; ?>">edit</a>
     <form action="delete.php" method="post">
     	<input type="hidden" name="id" value="<?php echo $post['id'] ?>">
     	<button type="submit">delete</button>
     </form>
   
 	<?php endforeach; ?>
 </div>





<?php require_once('layouts/footer.php') ?>