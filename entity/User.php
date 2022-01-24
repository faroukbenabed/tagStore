<?php

class User
{
    private $id;
    private $name;
    private $lastName;
    private $email;
    private $pw;
    private $signUpDate;

    function __construct()
    {

    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPw()
    {
        return $this->pw;
    }

    /**
     * @param mixed $pw
     */
    public function setPw($pw)
    {
        $this->pw = $pw;
    }

    /**
     * @return mixed
     */
    public function getSignUpDate()
    {
        return $this->signUpDate;
    }

    /**
     * @param mixed $signUpDate
     */
    public function setSignUpDate($signUpDate)
    {
        $this->signUpDate = $signUpDate;
    }
/// End Getters & Setters
    public function post($firstname,$lastname,$email,$password)
    {
        //require ('inc/db_connection.php');
        $conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');
        $date=date("Y-m-d h:i:s");
        $req = $conn->prepare('Insert into user values(null,"'.$firstname.'","'.$lastname.'","'.$email.'","'.$password.'","'.$date.'",null,10,0)');
        $user = $req->execute();
        $id=$conn->lastInsertId();
        $req = $conn->prepare("Insert into user_progress values($id,0,0,0)");
        $req->execute();
        return $user;
    }



}