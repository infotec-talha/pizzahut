<?php
include_once 'header.php';
include_once 'functions.php';
$link= databaseCon();
$sql="select * from orders";
$result= executeQuery($link,$sql);
if(isset($_POST["id"]))
{
    $id=$_POST["id"];
    $status=$_POST["status"];
     $sql = "UPDATE orders SET status='$status' where id=$id;";
$link= databaseCon();
$result= executeQuery($link,$sql);
$sql="select * from orders";
$result= executeQuery($link,$sql);
}
	
		?>

<div id="work-collections" class="seaction">
			<div class="row">
                <div>
                    
                    <h4 class="header">List</h4>
                    <ul id="issues-collection" class="collection">
					<?php while($row= mysqli_fetch_assoc($result)) {$status=$row["status"]?>
						<li class="collection-item avatar">
                              <i class="mdi-content-content-paste red circle"></i>
                              <span class="collection-header">Order No.<?=$row['id']?></span>
                              <p><strong>Date:</strong> <?=$row['date']?></p>
                              <p><strong>Payment Type:</strong></p>							  
                              <p><strong>Status:</strong><?=$status?> </p>
							
                              <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                           <?php if($status != 'Delivered'){ ?>
                              <form action="pizzahut_admin.php" method="post">
                                                                                <input type="hidden" value="<?=$row["id"]?>" name="id">
										<input type="hidden" value="Delivered" name="status">
                                                                                
										<input type="hidden" value="'.$row['payment_type'].'" name="payment_type">
                                                                               
                                                                                    	
										<button class="btn waves-effect waves-light right submit" type="submit" name="action">Delivered
                                              <i class="mdi-content-clear right"></i> 
										</button>
                                                                  
										</form>
                              <?php }?>
                              </li>
                             
						<li class="collection-item">
                            <div class="row">
							<p><strong>Name: </strong></p>
							<p><strong>Address: </strong></p>
							<p><strong>Contact: </strong></p>	
							<p><strong>Email: </strong></p>		
							<p><strong>Note: </strong></p>								
                            </li>							
							}
						
							<li class="collection-item">
                            <div class="row">
                            <div class="col s7">
                           <p class="collections-title"><strong></strong></p>
                            </div>
                            <div class="col s2">
                            <span>Pieces</span>
                            </div>
                            <div class="col s3">
                            <span>Rs.<?=$total=$total ?? '0'?> </span>
                            </div>
                            </div>
                            </li>
						
								<li class="collection-item">
                                        <div class="row">
                                            <div class="col s7">
                                                <p class="collections-title"> Total</p>
                                            </div>
                                            <div class="col s2">
											<span> </span>
                                            </div>
                                            <div class="col s3">
                                                <span><strong>Rs.<?=$total=$total ?? '0'?></strong></span>
                                            </div>										
							
						
										</form>
								
								</div></li>
					
					<?php }?>
					</ul>






</div>
</div>
</div>


