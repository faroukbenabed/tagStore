<?php

class product
{
private $id;
private $quantity;
private $name;
private $description;
private $price;
private $coins;

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
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCoins()
    {
        return $this->coins;
    }

    /**
     * @param mixed $coins
     */
    public function setCoins($coins)
    {
        $this->coins = $coins;
    }
/// End Getters & Setters
    public function post($quantity,$name,$description,$price,$coins)
    {
        //require ('inc/db_connection.php');
        $conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');
        $req = $conn->prepare('Insert into product values(null,'.$quantity.',"'.$name.'","'.$description.'",'.$price.','.$coins.',null,null)');





        return $req->execute();
        }




}