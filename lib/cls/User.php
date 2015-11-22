<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 3/5/15
 * Time: 6:32 PM
 */

class User {
    private $id;        ///< ID for this user.xml in the user.xml table
    private $userid;    ///< User-supplied ID
    private $password;      ///< What we call you by



    public function __construct($row) {
        $this->id = $row['id'];
        $this->userid = $row['userid'];
        $this->password = $row['password'];

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }





}