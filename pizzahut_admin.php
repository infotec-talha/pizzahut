<?php
include_once 'header.php';
include_once 'functions.php';
session_start();
if(isset($_SESSION['login_user'])){
$user_name=$_SESSION['login_user']["user_name"];

}
 else {
    header("location:login.php");
}
?>
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
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
								<?php   ?>
<!--//                                                                        $link= databaseCon();
//									$sql = mysqli_query($link, "SELECT * FROM orders;");
//									while($row = mysqli_fetch_array($sql)){
//                                                                        echo '<li><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>-->
                                    </li>';
									
									
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                 <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-question-answer"></i> Tickets</a>
                            <div class="collapsible-body">
                                <ul>
<!--								<li><a href="all-tickets.php">All Tickets</a>
                                </li>-->
								<?php
//									$sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets;");
//									while($row = mysqli_fetch_array($sql))
//                                    echo '<li><a href="all-tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                   // </li>';
									
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>			
            <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Users</a>
            </li>				
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Food Menu</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <p class="caption">Add, Edit or Remove Menu Items.</p>
          <div class="divider"></div>
		  <form class="formValidate" id="formValidate" method="post" action="menu-router.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
<!--                <h4 class="header">Order Food</h4>-->
              </div>
              <div>
				<table id="data-table-admin" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th><?=" "." "?></th>
                        <th><?=" "." "?></th>
                        <th>Item Price/Piece</th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
                                $link= databaseCon();
				$result = mysqli_query($link, "SELECT * FROM products");
				while($row = mysqli_fetch_array($result))
				{      $product_id=$row["id"];
					echo '<tr>';
					echo '<td><input  value="'.$row["name"].'"  name="'.$row['id'].'"><div class="errorTxt'.$row["id"].'"></div></td>';
                                        $product_detail=mysqli_query($link, "SELECT * FROM product_details where product_id=$product_id");
                                        while($row1= mysqli_fetch_assoc($product_detail)){
					echo '<td><div class="input-field col s12 "><input value="'.$row1['size'].'" id="'.$row1['id'].'">';
					echo'<input value="'.$row1["price"].'" id="'.$row1["id"].'_price" name="'.$row1['id'].'_price" type="text" data-error=".errorTxt'.$row1["id"].'"><div class="errorTxt'.$row1["id"].'"></div></td>';
                                        }
					echo'</tr>';
				}
				?>
                    </tbody>
</table>
              </div>
			  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
			</form>
          <form class="formValidate" id="formValidate1" method="post" action="admin_product_upload.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Add Item</h4>
              </div>
<!--              <div>
<table>
                    <thead>
                      <tr>
                        <th data-field="id">Name</th>
                        <th data-field="name">Item Price/Piece</th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
//					echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';
//					echo '<input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';					
//					echo '<td><div class="input-field col s12 "><label for="price" class="">Price</label>';
//					echo '<input id="price" name="price" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';                   
//					echo '<td></tr>';
				?>
                    </tbody>
</table>
              </div>-->
			  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit"><a href="admin_product_upload.php" class="text-white">Add</a>
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
			</form>			
            <div class="divider"></div>
            
          </div>
        </div>
        </div>


<?php include_once 'footer.php';