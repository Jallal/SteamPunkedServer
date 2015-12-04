<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 11/23/15
 * Time: 5:52 PM
 */
$login = true;
require_once "lib/site.inc.php";

if(isset($_REQUEST['username']) && isset($_REQUEST['game'])) {

    $game = new NewGame($site);

    $message = $game->newGame($_REQUEST['username'],$_REQUEST['token'], $_REQUEST['game']);


    if($message !== null) {
        $message = "success";
        echo $message;
        exit;
    }else{
        $message = "fail";
        echo $message;
    }
}

?>