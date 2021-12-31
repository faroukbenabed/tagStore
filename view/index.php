<?php



require("header.php");
$conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');

$sql = "SELECT * FROM event";
$data= $conn->prepare($sql);
$data->execute();
$events=$data->fetchAll();
$sql = "SELECT * FROM product";
$data= $conn->prepare($sql);
$data->execute();
$products=$data->fetchAll();
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
<div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 80%">
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

                    <p class="card-text" style="height: 10%;"><?php echo $product['price'];?> Dt | <?php echo $product['price'];?> TC</p>
                    <a href="product_detail.php" class="btn btn-warning">See more.</a>&nbsp;&nbsp;<a href="#" class="btn btn-warning">Add to panel</a>
                    </div>

            </div></td>

        <?php
            if($i % 4 ==0){echo "</tr><tr>";}
            $i++;
        }
        ?>
    </table>

    <!-- Content here -->
    <ul class="list-unstyled">
        <li class="media">
            <img class="mr-3" src=".../64x64" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 mb-1">List-based media object</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </li>


    </ul>
</div>
