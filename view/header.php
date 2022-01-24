<?php
if (session_status() === PHP_SESSION_NONE) {session_start();}
if(isset($_GET["u"])){
    $_SESSION["host_user"]=$_GET["u"];

}
$conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');
if(isset($_SESSION["email"])){

$email=$_SESSION["email"];
$sql = "SELECT * FROM user WHERE email ='$email'";
$data= $conn->prepare($sql);
$data->execute();
$user=$data->fetch();
}
$date=date("Y-m-d");
function dateDiff($date1, $date2)
{
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}
if(isset($_POST["getPoint"])){
    $updateData=$conn->prepare("update user set points=points+10,last_point_date='$date' where email='$email'");
    $updateData->execute();
    $id=$_SESSION['user']['id'];
if(dateDiff($user['last_point_date'],$date)==1){
    
    $updateData=$conn->prepare("update user_progress set points_streak=points_streak+1 where user=$id");
    $updateData->execute();
}else{
    $updateData=$conn->prepare("update user_progress set points_streak=0 where user=$id");
    $updateData->execute();
}
    header('Location: index.php');
}
if(isset($_POST["logout"])){
    session_destroy();

    header('Location: index.php');
}
require($_SERVER['DOCUMENT_ROOT']."/tagstore/inc/config.php");


$sql = "SELECT * FROM category";
$data= $conn->prepare($sql);
$data->execute();
$categories=$data->fetchAll();

$cat=array();
foreach($categories as $category){
$cat[$category["id"]]=$category["name"];
    
}
?>
    <title>TagStore</title>
    <link rel="icon" href="<?php echo $PREFIX_URL;?>/img/tagstoreicon.png">
<meta charset="UTF-8" />
<script>
    function clipboard() {
        /* Get the text field */
        var copyText = document.getElementById("invite");
        var url = document.getElementById("inviteurl");
        /* Select the text field */
         /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
        url.select();
        document.execCommand('copy');

        /* Alert the copied text */
        alert("Copied the text: " + url.value);
    }
</script>
<nav class="navbar sticky-top navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="<?php echo $PREFIX_URL;?>/img/tagstorew.png" height="50" class="d-inline-block align-top" alt="">

    </a>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php for($i=1;$i<count($cat);$i++){?>
                    <a class="dropdown-item" href="index.php?cat=<?php echo $i;?>"><?php echo $cat[$i];?></a>
                <?php }?>
                
              <!--  <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
        </li>
        <?php if(isset($_SESSION["email"]) && $_SESSION["email"]=="admin@admin.com"){ ?>
        <li class="nav-item dropdown">
            <a class="nav-link " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                +
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="product_form.php">Product</a>
                
              <!--  <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
        </li>
        <?php }?>
    </ul>
    </div>



        <?php

        if(isset($_SESSION["email"]) && date($user["last_point_date"])<$date || !isset($_SESSION["email"]) ){


?>
    <form <?php if(isset($_SESSION['email'])){?> action="" method="post" <?php }?>  class="form-inline" style="margin-right: 0.5% !important;">
        <?php if(!isset($_SESSION['email'])){?>
        <a href="login.php" style="text-decoration: none;">
            <?php }?>
        <button class="btn btn-outline-warning" type="<?php if(isset($_SESSION['email'])){ echo 'submit';}else{echo "button";}?>" name="getPoint">Get today`s coins</button>
            <?php if(!isset($_SESSION['email'])){?>
        </a>
                <?php }?>
        </form>
    <?php }
        if(isset($_SESSION["email"])){
        ?>

    <form class="form-inline" style="margin-right: 0.5% !important;">
    <button type="button" class="btn btn-warning">
        TS Coins <span class="badge badge-light"><?php if(isset($_SESSION["email"])){echo $user["points"];}else{echo "0";}?></span>
        <span class="sr-only">unread messages</span>
    </button>
    </form>
            <form class="form-inline" style="margin-right: 0.5% !important;">
            <button type="button" id="invite"  class="btn btn-warning" onclick="clipboard();">
                Invite :
                <input style="height: 20px;" id="inviteurl" value="http://localhost/tagstore/view/index?u=<?php echo $user['id'];?>">
                <span class="sr-only">Get your invitation link</span>
            </button>
        </form>
    <?php } ?>
    <!--<form class="form-inline" style="margin-right: 0.5% !important;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
    </form>-->
    <?php if(!isset($_SESSION["user"])){?>
    <form>
    <a href="login.php" style="text-decoration: none;">
        <button class="btn btn-outline-warning" type="button" name="login">Log In</button>
    </a>
    </form>
    <?php }else{?>
        <form action="" method="post">
            <button class="btn btn-outline-warning" type="submit" name="logout">Log Out</button>
        </form>
    <?php }?>
</nav>
