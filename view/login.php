<?php

require ("../inc/db_connection.php");

if(isset($_POST["signin"])){

    $email= $_POST["email"] ;
    $Password = $_POST["password"];


    $sql = "SELECT * FROM user WHERE email ='$email' and pw= '$Password'";
    $data= $conn->prepare($sql);
    $exec_result=2;


    if($data->execute() && $data->rowCount()>0) {

        $exec_result=1;
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["user"]=$data->fetch();
        if(!empty($_POST["remember"])){
            setcookie("email",$email,time()+ 10*365*24*60*60);
            setcookie("ident",$Password,time()+10*365*24*60*60);
        }
        else{
            setcookie("email","");
            setcookie("token","");
            setcookie("ident","");

        }


           header ("location:index.php?email=$email") ;

    }
    else{$exec_result=0;

    }

}
require("../view/header.php");
?>
<div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 50%;margin-top: 2%">
    <div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 80%; height: 50%;">
<div class="" style="width: 80%">
<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <?php if(isset($exec_result) && $exec_result=0){?>
        <small color="red">Check your memory and try again !</small>
    <?php }?>
    </div>
    <div class="form-check">
        <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" name="signin"class="btn btn-primary">Sign In</button>
</form>
</div>
    </div>
    </div>
