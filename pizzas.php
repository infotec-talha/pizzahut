<?php
session_start();
include_once 'header.php';
include_once 'main_menu.php';
include_once 'functions.php';

$select_product=select_product("pizza");



if(isset($_POST['product_id']) && $_POST['product_id']!="")
{
$product_id="'".$_POST['product_id']."'";

$baskit=add_product($product_id);
if(empty($_SESSION["baskit_cart"])) {
    $_SESSION["baskit_cart"] = $baskit;
    
}elseif(!empty($_SESSION["baskit_cart"])){
   
    $_SESSION["baskit_cart"] = array_merge(
    $_SESSION["baskit_cart"],
    $baskit
    );
    
	

	}
    
}
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["baskit_cart"])) {
    foreach($_SESSION["baskit_cart"] as $key=>$value) {
        
      if(in_array($_POST["time"],$value)){
       unset($_SESSION["baskit_cart"][$key]);
     
      }
//      if(empty($_SESSION["baskit_cart"]))
//      unset($_SESSION["baskit_cart"]);
      } 
}
}

?>

<div  class="col-lg-3 d-none d-lg-block px-0 float-right basket-right-wrapper stiky sticky-top">
    <app-basket-right _ngcontent-pre-c6="" _nghost-pre-c8="">
        <div _ngcontent-pre-c8="" class="bg-white py-2 list-group-flush cart-div-area  px-2">
            <p _ngcontent-pre-c8="" class="text-center py-2 pt-4 typography-2 headingH1">Your Basket</p>
            <ul _ngcontent-pre-c8="" class="list-group basket-inner-area "><!----><!---->
                <li _ngcontent-pre-c8="" class="list-group-item px-4 border-0">
                    <div _ngcontent-pre-c8="" class="row ">
                        <div _ngcontent-pre-c8="" class="col-12 px-1 row">
                            <div _ngcontent-pre-c8="" class="accordion bg-white border-0 w-100" id="accordion">
                                <div _ngcontent-pre-c8="" class="card mb-0 bg-white border-0 d-block w-100 col-12 w-100 d-block px-0 px-auto ">
                                    <?php 
                                    $total=0;
                                    
                                    if(isset($_SESSION["baskit_cart"])){
                                     foreach ($_SESSION["baskit_cart"] as $product){
                                         $total+=$product['price'];
                                        
                                        
                                      ?>
                                    <form action="pizzas.php" method="post">
                                        
                                    <div _ngcontent-pre-c8="" class="col-12 row py-auto pr-0 produduct-price-section">
                                     <div _ngcontent-pre-c8="" aria-expanded="true" class="col-7 card-header bg-white border-0 px-2 collapsed py-0" data-toggle="collapse" data-target="#collapseOne0">
                                         <span _ngcontent-pre-c8="" class="product-name pl-2"> <?=$product['name']=$product['name'] ?? ""?>  </span>
                                     </div>
                                         <div _ngcontent-pre-c8="" class="col-4 px-0 text-right pr-2 product-price"> 
                                             Rs.<?=$product['price']=$product['price'] ?? ""?> 
                                         </div>
                                        <input type="hidden" name="action" value="remove">
                                        <input type="hidden" name="id" value="<?=$product['id']?>">
                                        <input type="hidden" name="time" value="<?=$product['time']?>">
                                        
                                         <div _ngcontent-pre-c8="" class="col-1 px-0 btn p-0 mt-n1">
                                             <button type="submit"  class="closeBtn opacity-25"> x </button>
                                             
                                         </div>
                                    </div>
                                    </form>
                                    <?php }}?>
                                             <div  class="col-12 py-0 mt-n1">
                                                 <div  class="card-body collapse py-0 border-0" data-parent="#accordion" id="collapseOne0">
                                                     <p  class="d-inline text-dark small product-name opacity50">Pan Small</p>
                                                 </div>
                                             </div>
                                </div></div></div></div></li><!----></ul>
                                  <div _ngcontent-pre-c8="" class="d-block mt-4">
                                   </div>
                                    <div _ngcontent-pre-c8="" class="col-12 mb-n3 p-2 py-4 basket-bottom-area">
                                                <div _ngcontent-pre-c8="" class="border mt-4 px-0 mx-0 px-auto shadow-sm w-100 border-left-0">
                                                <div _ngcontent-pre-c8="" class="col-12 row px-4 py-3">
                                                    <div class="col-6 text-left px-2 "> Subtotal </div>
                                                    <div _ngcontent-pre-c8="" class="col-6 text-right px-2"> Rs.<?=$total?>
                                                    </div>
                                                    
                                                </div>
                                                        
                                            </div>
                                        <div _ngcontent-pre-c8="" class="row h6 pb-1 text-light py-2"><!---->
                                                    <?php if(!empty($_SESSION["baskit_cart"])) { ?>
                                                    <div _ngcontent-pre-c8="" class="col-12 px-4 mt-4 "><!----><!---->
                                                        <button _ngcontent-pre-c8="" class="btn btn-block btn-success px-0 py-2"> 
                                                            <a href="my_baskit.php?total=<?=$total?>" class="text-white"> Checkout Rs.<?=$total?></a>
                                                           
                                                        </button><!---->
                                                    </div>
                                                    <?php }?>
                                        </div>
                                    </div>
        </div></app-basket-right>
</div>

<div  class="row">
    
                        <div _ngcontent-stv-c9="" class="row mx-0">
                            <div _ngcontent-stv-c9="" class="subtitle fancy col-12 mb-0 mt-4  text-center headingH1">
                                <span _ngcontent-stv-c9="" class="headingH"><h5>The Legends</h5></span>
                            </div>
                             
                            <div _ngcontent-stv-c9="" class="col-12 col-sm-12 px-0 mx-0 px-md-3 px-md-0">
                                <div _ngcontent-stv-c9="" class="row py-3 px-0 mb-0 mb-md-3 mt-n2"><!---->
                                    <?php 
                                    
                                    while($row= mysqli_fetch_assoc($select_product)){
                                                    $id=$row['id']; 
                                                    ?>
                                    <div  class="col-6 col-sm-4 col-md-4 col-lg-3 px-1 product-card-wrapper">
                                        
                                        <div _ngcontent-stv-c9="" class="card mt-2 product-card">
                                            <form action="pizzas.php" method="post">
                                            <div _ngcontent-stv-c9="" clas="crdTop">
                                                <img _ngcontent-stv-c9="" class="card-img-top bg-dark" min-height="100px" width="100%" src="<?='data:image/jpeg;charset=utf8;base64,'.base64_encode( $row['image'] );?>">
                                            </div>
                                            <div _ngcontent-stv-c9="" class="card-body px-2">
                                                <div _ngcontent-jiy-c16="" class="title h5 mb-1 text-capitalize product-name"><?=$row['name'];?></div>
                                                <div _ngcontent-stv-c9="" class="col-dblock product-descripton">
                                                    <p _ngcontent-stv-c9="" class="card-text col-12 px-1"><?=$row['product_description'];?></p></div>
                                                    <div _ngcontent-stv-c9="" class="d-block pt-4 pt-md-2 pb-1 "> Select Size &amp; Type </div>
                                                   
                                                    
                                                    <select class="browser-default custom-select size" name="product_id">
                                                         <?php
                                                     $sql="select * from product_details where product_id=$id" ;
                                                     $link= databaseCon();
                                                     $result= executeQuery($link, $sql);
                                                     $i = 0;
                                                      while($row1= mysqli_fetch_assoc($result)){
                                                          $i++;
                                                          if($i==1){
                                                          $price = $row1['price'];
                                                           $span_id = $row1['id'];
                                                          }
                                                    ?>
                                                        <option data="<?=$span_id?>"  value="<?=$row1['id']?>">  <?=$row1['size']?> </option>
                                                      <?php  }?>
                                                    </select>
                                                   
                                                    
                                            </div>
                                             
                                          <div _ngcontent-stv-c9="" class="card-footer bg-white border-0 px-2">
                                               
                                              <button type="submit" class="btn btn-sm btn-block btn-success d-block py-2">
                                                  <div _ngcontent-stv-c9="" class="row p-0 m-0">
                                                      <div _ngcontent-stv-c9="" class="col-6 p-0 m-0 text-center text-md-right"> Add </div>
                                                      
                                                      <div  class="col-6 p-0 m-0 float-right text-right"> Rs. <span id="<?=$span_id;?>" name=""><?=$price;?></span></div>
                                                          
                                                  </div>
                                             
                                              </button>
                                                          
                                          </div>
                                                
                                             </form>     
                                        </div>
                                                            
                                    </div> 
                                                      <?php }?>
                                   </div> 
                            </div>
                             
                        </div>
    
                </div>

  <?php include_once 'footer.php';   
  