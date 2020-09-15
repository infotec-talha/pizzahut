<?php
if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    require_once "db.php";
    $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
 
   
	$imageProperties = getimagesize($_FILES['userImage']['tmp_name']);
	
        
	$sql = "update products set image='$imgData' where id=34";
	
	$current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
	
}
}
?>
<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
<label>Upload Image File:</label><br/>
<input name="userImage" type="file" class="inputFile" />
<input type="submit" value="Submit" class="btnSubmit" />
</form>
</div>
</BODY>
</HTML>