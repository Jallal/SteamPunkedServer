<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 11/23/15
 * Time: 5:52 PM
 */

//SteampunkedGame
$login = true;
require_once "lib/site.inc.php";

if(isset($_REQUEST['username'])) {

    $game = new JoinGame($site);

    $message = $game->CheckIfThereIsAGame($_REQUEST['username'],$_REQUEST['token']);


    if($message !== null) {
        //$message = "success";
        //echo $message;
        exit;
    }else {
        $message = 'fail';
        echo $message;
    }
}

?>