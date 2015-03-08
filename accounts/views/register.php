<!--<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?> -->

<?php include('_header.php'); ?>

<!-- show registration form, but only if we didn't submit already -->
<?php if (!$registration->registration_successful && !$registration->verification_successful) 
{ ?>
<?php echo WORDING_REGISTRATION_USERNAME; ?>
<?php echo WORDING_REGISTRATION_EMAIL; ?>
<?php echo WORDING_REGISTRATION_PASSWORD; ?>
<?php echo WORDING_REGISTRATION_PASSWORD_REPEAT; ?>
<?php echo WORDING_REGISTRATION_CAPTCHA; ?>
<?php echo WORDING_REGISTER; ?>
<?php 
} ?>

<a href="index.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>

<?php include('_footer.php'); ?>
<meta http-equiv="refresh" content="1;url=../entrar.php">


