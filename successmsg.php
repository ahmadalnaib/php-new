<?php if(isset($_SESSION['success_message'])):?>
<div class="success">
<?php echo $_SESSION['success_message'];?>
</div>
<?php unset($_SESSION['success_message']) ?>
<?php endif ?>
