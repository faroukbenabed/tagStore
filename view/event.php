<?php 

require("header.php");
if(isset($_POST["save"])) {

    $sql = "SELECT * FROM user";
$data= $conn->prepare($sql);
$data->execute();
$users=$data->fetchAll();

$us=array();
foreach($users as $u){
    $us[$u['id']]=$u['id'];
}
$id_u=array_rand($us);

$conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');
$sdate=date("Y-m-d H:i:s",strtotime($_POST['start-date']));
$edate=date("Y-m-d H:i:s",strtotime($_POST['start-date']));

$req = $conn->prepare('Insert into event values(null,"You are lucky","'.$sdate.'","'.$edate.'","Pick a product to get it for free hurry up",null,'.$id_u.','.$_POST['solde'].')');

$req->execute();
}

?>
<div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 80%;margin-top: 2%;height:80%">
<div  class="alert alert-success alert-dismissible fade <?php if(isset($id_u)&& $id_u!=null){echo 'show';}?>" role="alert" style="margin-top: 3%;">
            <strong>Event created!</strong> <?php if(isset($id_u)&& $id_u!=null){echo 'the random user is '.$id_u;}?>
            
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
<div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 60%; height: 50%;">
        <h3>Event<!-- <span class="badge badge-secondary">New</span>--></h3>
<form action="" method="post">
<div class="form-group">
        <label for="exampleInputEmail1">Budget</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="label" name="solde" placeholder="Enter label">
        <small id="label" class="form-text text-muted">Set budget limit.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Start time</label>
        <input type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="label" name="start-date" placeholder="Enter label">
        <small id="label" class="form-text text-muted">Set start time.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">End time</label>
        <input type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="label" name="end-date" placeholder="Enter label">
        <small id="label" class="form-text text-muted">Set end time.</small>
    </div>
    <button type="submit" class="btn btn-warning" name="save">Submit</button>

</form>
</div>
</div>

<?php 

require("footer.php");


?>