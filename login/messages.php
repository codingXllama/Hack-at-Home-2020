<?php
ini_set( "display_errors", 0); //Disable all 
error_reporting(0); // Disable all errors.
?>
<?php  if (count($errors) > 0) : ?>
  <div class="msg">
  	<?php foreach ($errors as $error) : ?>
  	  <span><?php echo $error ?></span>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
