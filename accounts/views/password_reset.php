<?php include('_header.php'); ?>

<?php if ($login->passwordResetLinkIsValid() == true) { ?>
<meta http-equiv="refresh" content="1;url=../passwordreset2.php">
<?php echo WORDING_NEW_PASSWORD; ?>
<?php echo WORDING_NEW_PASSWORD_REPEAT; ?>
<?php echo WORDING_SUBMIT_NEW_PASSWORD; ?>
<?php 
} 
else 
{ 
?>
<meta http-equiv="refresh" content="1;url=../passwordreset.html">
<?php echo WORDING_REQUEST_PASSWORD_RESET; ?>
<?php echo WORDING_RESET_PASSWORD; ?>
<?php } ?>

<a href="index.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>

<?php include('_footer.php'); ?>
