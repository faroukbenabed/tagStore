<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');
$email=$_SESSION["email"];
$sql = "SELECT * FROM user WHERE email ='$email'";
$data= $conn->prepare($sql);
$data->execute();
$user=$data->fetch();
$date=date("Y-m-d");
if(isset($_POST["getPoint"])){
    $updateData=$conn->prepare("update user set points=points+10,last_point_date='$date'");
    $updateData->execute();

    header('Location: index.php');
}
require($_SERVER['DOCUMENT_ROOT']."/tagstore/inc/config.php");
?>
    <title>TagStore</title>
    <link rel="icon" href="<?php echo $PREFIX_URL;?>/img/tagstoreicon.png">

<nav class="navbar sticky-top navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="<?php echo $PREFIX_URL;?>/img/tagstorew.png" height="50" class="d-inline-block align-top" alt="">

    </a>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Accessories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Consols</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Gadgets</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                +
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="product_form.php">Product</a>
                <a class="dropdown-item" href="#">User</a>
              <!--  <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
        </li>
    </ul>
    </div>



        <?php

        if(date($user["last_point_date"])<$date){


?>
    <form class="form-inline" style="margin-right: 0.5% !important;" action="" method="post">
            <button class="btn btn-outline-warning" type="submit" name="getPoint">Get today`s coins</button>
        </form>
    <?php }?>
    <form class="form-inline" style="margin-right: 0.5% !important;">
    <button type="button" class="btn btn-warning">
        TS Coins <span class="badge badge-light"><?php echo $user["points"]?></span>
        <span class="sr-only">unread messages</span>
    </button>
    </form>
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
