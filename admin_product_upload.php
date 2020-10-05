<?php
include_once 'header.php';
include_once 'functions.php';   
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $name="'".$_POST['name']."'";
    $price="'".$_POST['price']."'";
    $size="'".$_POST['size']."'";
    $type="'".$_POST['type']."'";
    $description="'".$_POST['description']."'";
    
if(isset($_POST["submit"])) {
    if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        $image_data=addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
        $image_type=$check['mime'];
        $product_insert= product_insert($name, $price, $size, $type, $image_data, $description, $image_type);
        if($product_insert!==false)
        {
        $html="<p class='alert-success'>product  successfully inserted in database!</p>";
        }
    }
}
}
?>


    <form name="frmImage" action="admin_product_upload.php" method="post" enctype="multipart/form-data"  class="frmImageUpload">
   
        <div class="form-group col">
  Select image to upload: 
  <input type="file" class="inputinputFile" name="fileToUpload">
  </div>
  
    <div>
  <lable for="product">Product Name:</lable>
   <input type="text" name="name">
    </div>
    <div>
   <lable for="price">Product Price:</lable>
   <input type="text" name="price">
    </div>
    <div>
   <lable for="size">Product size:</lable>
   <input type="text" name="size">
    </div>
    <div>
   <lable for="type">Product type:</lable>
   <input type="text" name="type">
    </div>
   <div>
   <lable for="description">Product description:</lable>
  <textarea class="form-control" rows="5" name="description"></textarea>
   </div>
    <div>
  <input type="submit" value="insert product" name="submit" class="btnSubmit">
    </div>
</form>
<?php if(isset($html)) echo $html;?>
<?php include_once 'footer.php';
