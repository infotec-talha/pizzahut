<?php
include_once 'header.php';
include_once 'functions.php';
session_start();
if(isset($_SESSION['login_user'])){
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
        $product_insert= product_insert($name, $type, $image_data, $description, $image_type);
        $product_id=mysqli_insert_id($link);
        if($product_insert!==false)
        {
        $html="<p class='alert-success'>product  successfully inserted in database!</p>";
        }
    }
}
}
}
 else 
   header("location:login.php"); 

?>
<aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
				 <div class="col col s8 m8 l8">
                   <form class="form-inline my-2 my-md-0" action="logout.php" method="post">
                   <input type="hidden" name="action" value="logout">
      <button type="submit" class="btn btn-primary btn-sm" >logout</button>
               </form>
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $user_name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"></p>
                </div>
            </div>
            </li>
<!--            <li class="bold active"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Food Menu</a>
            </li>-->
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="all-orders.php">All Orders</a>
                                </li>
								
<!--//                                                                        $link= databaseCon();
//									$sql = mysqli_query($link, "SELECT * FROM orders;");
//									while($row = mysqli_fetch_array($sql)){
//                                                                        echo '<li><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>-->
                                    
									
									
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                 
								
									
									
                                </ul>
                            
                     
               
        </aside>

    <form name="frmImage" action="admin_product_upload.php" method="post" enctype="multipart/form-data"  class="frmImageUpload">
   <div class="row">
       <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <label for="name">Select image to upload:</label>
             <input type="file" class="inputinputFile" name="fileToUpload">
         </div>
  
  <div class="form-group col-4"></div>
    <div class="form-group col-4"></div>
         <div class="form-group col-4">
  <lable for="product">Product Name:</lable>
   <input type="text" name="name">
    </div>
    <div class="form-group col-4"></div>
    <div class="form-group col-4"></div>
    <div class="form-group col-4">
        <lable for="price">Product Price:</lable>
        <input type="text" name="price">
    </div>
    
    <div class="form-group col-4"></div>
    <div class="form-group col-4"></div>
    <div class="form-group col-4">
   <lable for="size">Product size:</lable>
   <input type="text" name="size">
    </div>
      <div class="form-group col-4"></div>
      <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <lable for="type">Product type:</lable>
   <input type="text" name="type">
         </div>
  
  <div class="form-group col-4"></div>
   <div class="form-group col-4"></div>
   <div class="form-group col-4">
   <lable for="description">Product description:</lable>
  <textarea class="form-control" rows="5" name="description"></textarea>
   </div>
   <div class="form-group col-4"></div>
   <div class="form-group col-4"></div>
    <div class="form-group col-4">
  <input type="submit" value="insert product" name="submit" class="btnSubmit">
    </div>
   </div>
</form>
<?php if(isset($html)) echo $html;?>
<?php include_once 'footer.php';
