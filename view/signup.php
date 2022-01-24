<?php

require ("../inc/db_connection.php");
require ($_SERVER['DOCUMENT_ROOT']."/tagstore/entity/user.php");
$u = new user();
$conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');


if(isset($_POST["signup"])){


    $query_result=$u->post($_POST["firstname"],$_POST["lastname"],$_POST["email"],$_POST["password"]);
    $exec_result=2;


    if($query_result) {
    if((isset($update_query) && isset($_SESSION["host_user"])) || !isset($_SESSION["host_user"])) {
        header("location:login.php");
    }
    }
    else{$exec_result=0;

    }


}
require("../view/header.php");

if(isset($_SESSION["host_user"])) {
    $sql = "SELECT * FROM user WHERE id =".$_SESSION["host_user"];
    $data = $conn->prepare($sql);
    if($data->execute()){

        $host_user=$data->fetch();
    }
}

if(isset($query_result) && $query_result && isset($_SESSION["host_user"])){
    $req = $conn->prepare('update user set points=points+10 where id='.$_SESSION["host_user"]);
    $update_query=$req->execute();
    $id=$_SESSION['host_user'];
    $updateData=$conn->prepare("update user_progress set link_sharing=link_sharing+1 where user=$id");
    $updateData->execute();

}
?>
<div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 50%;margin-top: 2%">
    <div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 80%; height: 50%;">
        <div class="" style="width: 80%">
            <?php
            if(isset($_SESSION["host_user"])) {
                echo "You are invited by ".$host_user["name"]." ".$host_user["last_name"];
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">First name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstnameHelp" placeholder="Enter first name like 'mohamed'">
                    <small id="firstnameHelp" class="form-text text-muted">Maybe we will share your name !</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastnameHelp" placeholder="Enter last name like 'ben mohamed' again ah!">
                    <small id="lastnameHelp" class="form-text text-muted">Maybe we will share your family name also !</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
                    <small id="passwordHelp" class="form-text text-muted">This is all yours !</small>
                    <?php if(isset($exec_result) && $exec_result==0){?>
                        <small color="red">Rang dump!!</small>
                    <?php }?>

                </div>

                <button type="submit" name="signup"class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
</div>
