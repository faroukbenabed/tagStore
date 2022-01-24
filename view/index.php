<?php



require("header.php");
$conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');

$sql = "SELECT * FROM event";
$data= $conn->prepare($sql);
$data->execute();
$events=$data->fetchAll();
if(isset($_GET['cat'])){
    $cat_id=$_GET['cat'];
    $sql = "SELECT * FROM product where category=$cat_id order by category";
}else{
$sql = "SELECT * FROM product order by category";
}
$data= $conn->prepare($sql);
$data->execute();
$products=$data->fetchAll();
if(!isset($_GET['cat'])){
?>

<div class="container-fluid " style="height: 25%">
    <marquee class="rounded">
       <?php foreach ($events as $event ) {
       ?>
        <div class="container" style="width: 90%; height: 2%; margin-top: 0%; background-color: indianred">

        </div>
        <div class="container-fluid" style="width: 90%; height: 90%;">
            <ul class="list-unstyled">
                <li class="media">
                    <img class="mr-3" src="<?php echo $event['img'];?>" height="200" alt="Generic placeholder image">
                    <div class="media-body" >
                        <h5 class="mt-0 mb-1"><?php echo $event["name"];?></h5>
                        <?php echo $event["description"];?>

                    </div>
                </li>
            </ul>
        </div>
        <?php }?>
    </marquee>
</div>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Welcome <?php if(isset($user)){echo $user["name"];} ?> to your store, Tagstore.</h1>
        <p class="lead">You don't need to go anywhere, stick here and set up your gear.</p>
    </div>
</div>
<?php 
//// Progresss 
$id=$_SESSION['user']['id'];
$sql = "SELECT * FROM user_progress where user=$id";
$data= $conn->prepare($sql);
$data->execute();
$progress=$data->fetch();
$bonus_points=0;
if($progress["points_streak"]==30){
    $bonus_points+=50;

    $updateData=$conn->prepare("update user_progress set points_streak=0 where user=$id");
    $updateData->execute();
}
if($progress["link_sharing"]==10){
    $bonus_points+=100;
    $updateData=$conn->prepare("update user_progress set link_sharing=0 where user=$id");
    $updateData->execute();
}
if($progress["purchased_products"]==10){
    
    $bonus_points+=200;

    $updateData=$conn->prepare("update user_progress set purchased_products=0 where user=$id");
    $updateData->execute();
}
    if($bonus_points>0){
    $updateData=$conn->prepare("update user set points=points+$bonus_points where email='$email'");
    $updateData->execute();
        $bonus_points=0;
}

?>
<div class="container" style="height: 50%;">
    <h3>Your Progress</h3>
<ul class="list-unstyled">
  <li class="media">
    <!--<img class="mr-3" src=".../64x64" alt="Generic placeholder image">-->
    <div class="media-body">
      <h5 class="mt-0 mb-1">Points steak <?php echo $progress["points_streak"]?>/30 <small>| To get 50 points</small></h5>
      
      <div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $progress["points_streak"]/30*100?>%" aria-valuenow="<?php echo $progress["points_streak"]/30*100?>" aria-valuemin="0" aria-valuemax="100"><?php echo $progress["points_streak"]/30*100?>%</div>
</div>

    </div>
  </li>
  <li class="media my-4">
    <!--<img class="mr-3" src=".../64x64" alt="Generic placeholder image">-->
    <div class="media-body">
      <h5 class="mt-0 mb-1">Link sharing <?php echo $progress["link_sharing"]?>/10 <small>| To get 100 points</small></h5>
      
      <div class="progress">
  <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $progress["link_sharing"]/10*100?>%" aria-valuenow="<?php echo $progress["link_sharing"]/10*100?>" aria-valuemin="0" aria-valuemax="100"><?php echo $progress["link_sharing"]/10*100?>%</div>
</div>

    </div>
  </li>
  <li class="media">
    <!--<img class="mr-3" src=".../64x64" alt="Generic placeholder image">-->
    <div class="media-body">
      <h5 class="mt-0 mb-1">Purchasing products <?php echo $progress["purchased_products"]?>/10 <small>| To get 200 points</small></h5>
      
      <div class="progress">
  <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $progress["purchased_products"]/10*100?>%" aria-valuenow="<?php echo $progress["purchased_products"]/10*100?>" aria-valuemin="0" aria-valuemax="100"><?php echo $progress["purchased_products"]/10*100?>%</div>
</div>

    </div>
  </li>
</ul>

</div>





<?php }?>


<div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 80%;margin-top:5%">



    
  <?php if(count($products)>0){?>
  
 
  


    <table>
        <tr>
        <?php
        
        $i=1;
        foreach ($products as $product ) {

            ?>
        <td><div class="card" style="width: 18rem; max-height: 600px; height: 600px;">
                <div style="height: 50%;">
                <img class="card-img-top" src="<?php echo $product['img'];?>" alt="Card image cap" style="max-height: 300px;">
                </div>
                    <div class="card-body" style="height: 50%">
                    <h5 class="card-title" style="height: 15%"><?php echo $product['name'];?></h5>
                    <p class="card-text" style="height: 40%; overflow: auto;"><?php echo $product['description'];?></p>

                    <p class="card-text" style="height: 10%;"><b><?php echo $product['price'];?> Dt</b> | <b><?php echo $product['price'];?> TC</b></p>
                    <a href="product_detail.php?id=<?php echo $product['id']; ?>" class="btn btn-warning">See more.</a>&nbsp;&nbsp;<!--<a href="#" class="btn btn-warning">Add to panel</a>-->
                    </div>

            </div></td>

        <?php
            if($i % 4 ==0){echo "</tr><tr>";}
            $i++;
        }
        ?>
    </table>
    <?php }else{?>

        <div class="jumbotron">
  <h1 class="display-4">Ahaaaaa</h1>
  <p class="lead">Unfortunately we don't have any product in stock for this category.</p>
  <hr class="my-4">
  <p>So you can collect more points before the next re-stock, and get ready form more surprises.</p>
  <a class="btn btn-warning btn-lg" href="index.php" role="button">Back to home.</a>
</div>
    <?php } ?>

    <!-- Content here -->

</div>

<?php include("footer.php");?>