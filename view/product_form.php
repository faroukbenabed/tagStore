<?php
require($_SERVER['DOCUMENT_ROOT']."/tagstore/view/header.php");
?>
<?php
include($_SERVER['DOCUMENT_ROOT']."/tagstore/entity/product.php");
$p=new product();
if(isset($_POST["save"])) {
    $query_result = $p->post($_POST["quantity"], $_POST["label"], $_POST["description"], $_POST["price"], $_POST["coins"]);
    if ($query_result) {
        echo '<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
  This is a danger alert—check it out!
</div>';
    }
}
?>


<div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 80%;margin-top: 2%">
    <div class="container-fluid rounded" style="border: darkcyan 3px !important; width: 60%; height: 50%;">
        <h3>Product<!-- <span class="badge badge-secondary">New</span>--></h3>
<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Label</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="label" name="label" placeholder="Enter label">
        <small id="label" class="form-text text-muted">Set your product label.</small>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" aria-describedby="description" name="description"></textarea>
        <small id="description" class="form-text text-muted">Describe your wonderful product.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Quantity</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="quantity" placeholder="Enter quantity" name="quantity">
        <small id="quantity" class="form-text text-muted">Set your product quantity in stock.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price" name="price">
        <small id="emailHelp" class="form-text text-muted">Set a price for your product in £.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Price in TS coins</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter TS price" name="coins">
        <small id="emailHelp" class="form-text text-muted">Set a price for your product in TS coins.</small>
    </div>
    <!--<div class="form-group">
        <label for="exampleInputEmail1">Product Image</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>-->

    <button type="submit" class="btn btn-warning" name="save">Submit</button>
</form>
</div>
</div>
