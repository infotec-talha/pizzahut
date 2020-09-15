<?php
    require_once "db.php";
    $sql = "SELECT * FROM products"; 
    $result = mysqli_query($conn, $sql);
?>
<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<?php
	while($row = mysqli_fetch_assoc($result)) {
            
	
//      $sql = "SELECT imageType,imageData FROM output_images WHERE imageId=" . $_GET['image_id'];
		//$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		//$row = mysqli_fetch_array($result);
		//header("Content-type: " . $row["imageType"]);
       // echo $row["imageData"];
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
//		header("location:imageView.php?image_id=".$row["imageId"])
            ?> 
                    <br/>

<?php		
	}
    mysqli_close($conn);
?>
</BODY>
</HTML>
