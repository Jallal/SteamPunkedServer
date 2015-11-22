<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 3/22/15
 * Time: 7:52 PM
 */

class NewUsers extends Table{

    public function __construct(Site $site) {
        parent::__construct($site, "SteampunkedUser");

    }


    public function newUser($userid,$password1, $password2) {




        // Ensure the passwords are valid and equal
        if(strlen($password1) < 8) {
            echo "Passwords must be at least 8 characters long";
            return null;
        }

        if($password1 !== $password2) {
            echo "Passwords are not equal";
            return null;
        }
        // Ensure we have no duplicate user ID or email address
        $users = new Users($this->site);
        if($users->exists($userid)) {
            echo "User ID already exists. Please choose another one.";
            return null;
        }





// Add a record to the newuser table
        $sql = <<<SQL
REPLACE INTO $this->tableName(username, password)
values(?, ?)
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userid,$password1));

    }











}