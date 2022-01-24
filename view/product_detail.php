<?php
    require("header.php");
    $conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');
    
    $email=$_SESSION["email"];
    $sql = "SELECT * FROM user WHERE email ='$email'";
    $data= $conn->prepare($sql);
    $data->execute();
    $user=$data->fetch();


    $sql = "SELECT * FROM product where id=".$_GET["id"];
    $data= $conn->prepare($sql);
    $data->execute();
    $product=$data->fetch();
    
    $sql = "SELECT * FROM image_object where object=".$_GET["id"];
    $data= $conn->prepare($sql);
    $data->execute();
    $product_images=$data->fetchAll();

    $sql = "SELECT * FROM manufactory where id=".$product['manufactory'];
    $data= $conn->prepare($sql);
    $data->execute();
    $manufactory=$data->fetch();
    if(isset($_POST['ppay']) || isset($_POST['tspay'])){
        $type=(isset($_POST['ppay']))?"dt":"ts";
        $pay=(isset($_POST['ppay']))?"price":"coin";
        $pay_type=(isset($_POST['ppay']))?"ppay":"tspay";
       if(($pay=="price" && $user["solde"]>=$product["price"]) || ($pay=="coin" && $user["points"]>=$product["coin"])){
        $date=date("Y-m-d h:i:s");
        $sql = "Insert into order_t values (null,".$_SESSION["user"]["id"].",'".$date."','En cours',null,0,'".$type."') ";
    $data= $conn->prepare($sql);
    $data->execute();
    $order_id=$conn->lastInsertId();

    $sql = "Insert into order_item values (null,".$product['id'].",1,".$order_id.") ";
    $data= $conn->prepare($sql);
    $data->execute();

    $req = $conn->prepare('update order_t set price=price+'.$product[$pay].' where id='.$order_id);
    $update_query=$req->execute();

    $req = $pay=(isset($_POST['ppay']))?$conn->prepare('update user set solde=solde-'.$product["price"].' where id='.$_SESSION["user"]["id"]):$conn->prepare('update user set points=points-'.$product["coin"].' where id='.$_SESSION["user"]["id"]);
    $update_query=$req->execute();


    ////Progress
    $id=$_SESSION["user"]["id"];
    $updateData=$conn->prepare("update user_progress set purchased_products=purchased_products+1 where user=$id");
    $updateData->execute();
    

    
    $sql = "SELECT * FROM user WHERE id = ".$_SESSION["user"]["id"];
    $data= $conn->prepare($sql);
    $data->execute();
    $_SESSION["user"]=$data->fetch();
    echo '<script>
        window.location.href="product_detail.php?e=2&id='.$_GET["id"].'";
    </script>';

    }else{
        echo '<script>
        window.location.href="product_detail.php?e=1&id='.$_GET["id"].'";
    </script>';
    }
    unset($_POST["ppay"],$_POST["tspay"]);

    echo"<script>document.location='product_detail.php?id='".$product["id"].";</script>";
    
    }

    
    
?>

<div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 80%;height: 40%;">

        <div class="container"style="margin-top: 10%;">
            <div class="row" style="height: 100%" >
                <div class="col-md-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php 
                            if(count($product_images)>0){
                            $i=0;
                            foreach ($product_images as $image ) {?>
                            <div class="carousel-item <?php if ($i==0){ ?>active<?php } ?>">
                                <img class="d-block w-100" src="<?php echo $image['url']?>" alt="First slide">
                            </div>
                            <?php 
                        $i++;    
                        }
                            }else{
                            ?>
                            <img class="d-block w-100" src="<?php echo $product['img']?>" alt="First slide">
                            <?php }?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-8 border-bottom border-warning">
                   <div>
                       <h4><?php echo $product["reference"];?> | <?php echo $product["name"];?></h4>
                        <br>Manufactory : <b><?php echo $manufactory["name"]; ?></b><br>
                        <?php echo $product["description"];?>
                        
                        
                   </div>
                   <div>
                    
                   <form <?php if(isset($_SESSION['email'])){?> action="" method="post" <?php }?>  class="form-inline" style="margin-right: 0.5% !important;">
        <?php if(!isset($_SESSION['email'])){?>
        <a href="login.php" style="text-decoration: none;">
            <?php }?>
        <button class="btn btn-outline-warning" type="<?php if(isset($_SESSION['email'])){ echo 'submit';}else{echo "button";}?>" name="tspay">Buy : <?php echo $product['coin'];?> Ts</button>
            <?php if(!isset($_SESSION['email'])){?>
        </a>
                <?php }?>
        </form>

        <form <?php if(isset($_SESSION['email'])){?> action="" method="post" <?php }?>  class="form-inline" style="margin-right: 0.5% !important;">
        <?php if(!isset($_SESSION['email'])){?>
        <a href="login.php" style="text-decoration: none;">
            <?php }?>
        <button class="btn btn-outline-warning" type="<?php if(isset($_SESSION['email'])){ echo 'submit';}else{echo "button";}?>" name="ppay">Buy : <?php echo $product['price'];?> Dt</button>
            <?php if(!isset($_SESSION['email'])){?>
        </a>
                <?php }?>
        </form>

                   </div>
                </div>

            </div>
        </div>
        
           


            <div  class="alert alert-<?php if(isset($_GET['e'])&&$_GET['e']==2){echo 'success';}else if(isset($_GET['e'])&&$_GET['e']==1){echo 'warning';}?> alert-dismissible fade <?php if(isset($_GET['e'])&& ($_GET['e']==1 || $_GET['e']==2)){echo 'show';}?>" role="alert" style="margin-top: 3%;">
            <?php if(isset($_GET['e'])&&$_GET['e']==2){echo '<strong>Sooo gooood!</strong> You should get your product as soon as we shipped for you.';
            }else if(isset($_GET['e'])&&$_GET['e']==1){echo '<strong>Oh noo!</strong> You should get the needed number of coins.';}?>
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    </div>