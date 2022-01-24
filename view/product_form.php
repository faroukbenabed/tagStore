<?php
require($_SERVER['DOCUMENT_ROOT']."/tagstore/view/header.php");
?>
<?php
include($_SERVER['DOCUMENT_ROOT']."/tagstore/entity/product.php");
$p=new product();
$conn = new PDO("mysql:host=localhost;dbname=tagstore", 'root', '');
$sql = "SELECT * FROM manufactory";
    $data= $conn->prepare($sql);
    $data->execute();
    $manufactories=$data->fetchAll();


    $sql = "SELECT * FROM category";
    $data= $conn->prepare($sql);
    $data->execute();
    $categories=$data->fetchAll();

if(isset($_POST["save"])) {

$target_dir = "../img/";
$imgupload= "".$target_dir.basename($_FILES["img"]["name"]); 
move_uploaded_file($_FILES["img"]["tmp_name"], $imgupload);
$img=($imgupload!="img/")?$imgupload:null;

    $query_result = $p->post($_POST["quantity"], $_POST["label"], $_POST["description"], $_POST["price"], $_POST["coins"],$img,$_POST["category"],$_POST["color"],$_POST["reference"],$_POST["manufactory"]);
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
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Label</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="label" name="label" placeholder="Enter label">
        <small id="label" class="form-text text-muted">Set your product label.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Reference</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="label" name="reference" placeholder="Enter label">
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
    <div class="form-group">
    <label for="exampleInputEmail1">Color</label>
    <select name="color"class="custom-select">
    
    <option selected>--</option>
    <?php 
    for($i=0;$i<count(CSS_COLOR_NAMES);$i++){

    
    ?>
    <option value="<?php echo CSS_COLOR_NAMES[$i];?>"><?php echo CSS_COLOR_NAMES[$i];?></option>
    <?php }?>
    </select>
    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
    <select name="category"class="custom-select">
    
    <option selected>--</option>
    <?php foreach($categories as $category){?>
    <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
    <?php }?>
    </select>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Manufactory</label>
    <select name="manufactory"class="custom-select">
    
    <option selected>--</option>
    <?php foreach($manufactories as $manufactory){?>
    <option value="<?php echo $manufactory['id'];?>"><?php echo $manufactory['name'];?></option>
    <?php }?>
    </select>
    </div>
    <div class="form-group">
    <div class="custom-file">
  <input type="file" name="img" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
    </div>

    <button type="submit" class="btn btn-warning" name="save">Submit</button>
</form>
</div>
</div>


