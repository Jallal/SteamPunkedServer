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

    $quit = new Quit($site);

    $message =  $quit->QuitGame($_REQUEST['username']);


    if($message !== null) {
        //$message = "success";
        //echo $message;
        exit;
    }else {
        //$message = 'fail';
        //echo $message;
        exit;
    }
}

?>