<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 11/30/15
 * Time: 6:44 PM
 */


class UpdateGame extends Table{


    public function __construct(Site $site)
    {
        parent::__construct($site, "SteampunkedGame");

    }


    public function NotifyPlayer($userId, $user2){

        $sql = <<<SQL
SELECT token FROM  gcm
where username=?
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userId));

        $gcmIds = array();
        foreach($statement as $row) {
           // echo $row['token'];
            $gcmIds[] = $row['token'];
        }

// Open connection
        $url = 'https://android.googleapis.com/gcm/send';
        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

// Create the HTTP header
        $apiKey = "AIzaSyCrHfhrz_l-z8P2av4Hptd-zqVyhgBf8AY";
        $headers[0] = 'Authorization: key=' . $apiKey;
        $headers[1] = 'Content-Type: application/json';
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);

// Message to send and ID's are POST data
        $data['message'] = 'turn';

        $fields['registration_ids'] = $gcmIds;
        $fields['data'] = $data;
        //echo '<pre>';
       // print_r($fields);

        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

// Execute HTTP post
        $result = curl_exec($ch);
       // print_r($result);
       //// echo '</pre>';

// Close connection
        curl_close($ch);
    }







    public function NotifyMe($userId){

        $sql = <<<SQL
SELECT * FROM  $this->tableName
where playerOneId=? OR playerTwoId=?
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userId,$userId));

        $result = array();  // Empty initial array
        foreach ($statement as $row) {
            $result[] = new Game($row);
        }

        foreach ($result as $g) {
            $user1 = $g->getPlayerOne();
            $user2  = $g->getPlayerTwo();
            if($user1!==$userId){
                $this->NotifyPlayer($user1, $user2);
            }
            if($user2!==$userId){
                $this->NotifyPlayer($user2, $user1);
            }

        }
    }






    public function SetGame($userId,$game){


    $sql = <<<SQL
UPDATE $this->tableName
SET game=?
where playerOneId=? OR playerTwoId=?
SQL;

    $statement = $this->pdo()->prepare($sql);
    if ($statement->execute(array($game ,$userId,$userId))) {

        $this->NotifyMe($userId);
        $message = "success";
        return $message;

    } else {
        return null;
    }
}

}
