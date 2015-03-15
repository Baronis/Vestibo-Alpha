<?php

// check for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once('libraries/password_compatibility_library.php');
}

require_once('config/config.php');
require_once('translations/pt_BR.php');
require_once('libraries/PHPMailer.php');
require_once('classes/Login.php');

$login = new Login(); //IMPORTANT

// the user has just successfully entered a new password
// so we show the index page = the login page
if ($login->passwordResetWasSuccessful() == true && $login->passwordResetLinkIsValid() != true) {
    include("views/not_logged_in.php");
} else {
    // show the request-a-password-reset or type-your-new-password form
    include("passwordreset.html");
}
