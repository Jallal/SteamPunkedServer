<?php
$login = false;
require_once "../lib/site.inc.php";
?>
<?php

unset($_SESSION['newuser-error']);


$nu = new NewUsers($site);


$msg = $nu->newUser(
    strip_tags($_POST['userid']),
    strip_tags($_POST['password1']),
    strip_tags($_POST['password2']));




if($msg !== null) {
    $_SESSION['newuser-error'] = $msg;
    $message = "failed creating new user";
    echo $message;
    exit;
}
$message = "success";
echo $message;
exit;