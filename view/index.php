<?php



require("header.php");
$conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');

$sql = "SELECT * FROM event";
$data= $conn->prepare($sql);
$data->execute();
$events=$data->fetchAll();
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
        <h1 class="display-4">Fluid jumbotron</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
</div>
<div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 80%">
    <!-- Content here -->
    <ul class="list-unstyled">
        <li class="media">
            <img class="mr-3" src=".../64x64" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 mb-1">List-based media object</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </li>
        <li class="media my-4">
            <img class="mr-3" src=".../64x64" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 mb-1">List-based media object</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </li>
        <li class="media">
            <img class="mr-3" src=".../64x64" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 mb-1">List-based media object</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </li>


    </ul>
</div>
