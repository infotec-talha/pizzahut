<?php
include_once 'functions.php';
if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    
         if(is_uploaded_file($_FILES['userImage']['tmp_name'])){
         $check = getimagesize($_FILES["userImage"]["tmp_name"]);
         $image_data=addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
         $image_type=$check['mime'];
         $id=$_POST['product_id'];
         $update_image=update_image_database($image_data,$image_type,$id);
         if($update_image==true)
         $html="<p class='alert-success'>product image successfully updated in database!</p>";
     else 
         $html="<p class='alert-danger'>product image is not updated in database!</p>";
     
}
}
}
?>
<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>
<link href="css/imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
<label>Upload Image File:</label><br/>
<input name="userImage" type="file" class="inputFile" />
<br/>
<label>Product Id:</label>
<input name="product_id" required type="number" />
<input type="submit" value="Submit" class="btnSubmit" />
</form>
<?php if(isset($html)) echo $html;?>
</BODY>
</HTML>