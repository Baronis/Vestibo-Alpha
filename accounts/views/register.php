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
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>php-login-advanced</title>
    <style type="text/css">
        
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 10px;
        }
        label {
            position: relative;
            vertical-align: middle;
            bottom: 1px;
        }
        input[type=text],
        input[type=password],
        input[type=submit],
        input[type=email] {
            display: block;
            margin-bottom: 15px;
        }
        input[type=checkbox] {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
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
?>

<!-- show registration form, but only if we didn't submit already
<?php if (!$registration->registration_successful && !$registration->verification_successful) 
{ ?>
<?php// echo WORDING_REGISTRATION_USERNAME; ?>
<?php// echo WORDING_REGISTRATION_EMAIL; ?>
<?php// echo WORDING_REGISTRATION_PASSWORD; ?>
<?php// echo WORDING_REGISTRATION_PASSWORD_REPEAT; ?>
<?php// echo WORDING_REGISTRATION_CAPTCHA; ?>
<?php// echo WORDING_REGISTER; ?>
<?php 
} ?>-->

<a href="../entrar.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>
</body>
</html>

