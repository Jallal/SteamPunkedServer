<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 3/5/15
 * Time: 6:32 PM
 */

class User {
    private $Id;        ///< ID for this user.xml in the user.xml table
    private $username;    ///< User-supplied ID
    private $password;      ///< What we call you by



    public function __construct($row) {
        $this->Id = $row['Id'];
        $this->username = $row['username'];
        $this->password = $row['password'];

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }





}