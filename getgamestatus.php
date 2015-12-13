<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 11/30/15
 * Time: 6:43 PM
 */
$login = true;

require_once "lib/site.inc.php";

if(isset($_REQUEST['username'])) {


    $game = new GetGameStatus($site);

    $mygame = $game->getGame($_REQUEST['username']);
    if($mygame !== null) {
        //return  $mygame;
      exit;
    }else{
        $message = 'fail';
       //return $message;
    }
}

?>
