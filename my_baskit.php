<?php
session_start();
include_once 'header.php';
include_once 'functions.php';

if(!empty($_SESSION["baskit_cart"]) && isset($_GET["total"]))
    {
    $total=$_GET["total"];
    }
    elseif(isset($_POST["total"]) && $_POST["total"]!='')
    {
        
        $total=$_POST["total"];
        $customer_name="'".$_POST['name']."'";
        $email="'".$_POST['email']."'";
        $cus_address="'".$_POST['address']."'";
        $delivery_note="'".$_POST['note']."'";
        $customer_id=get_customer_id($email,$customer_name,$cus_address);
        $status="'"."yet to be deliver"."'";
              
          $order_id=insert_order($customer_id,$delivery_note,$status);
          // if order is inserted
          if($order_id>0){
          foreach($_SESSION["baskit_cart"] as $product)
          {
              $pro_id=$product["product_id"];
              $product_size="'".$product["size"]."'";
              $time=$product["time"];
              $sql="insert into order_details (quantity,order_id,product_id,size) values(1,$order_id,$pro_id,$product_size)";
              $link= databaseCon();
              $result=executeQuery($link, $sql);
            unset($_SESSION["baskit_cart"][$time]);
          
          
          
         }
         $order_total=array('order_id'=>$order_id,'total'=>$total);
         $_SESSION["order_total"]=$order_total;
         header("location:amount_transaction.php");
         
       }
       
     
           
      
    }
    else
   
?>
<div _ngcontent-vgl-c16="" style="overflow-x: hidden; ">
  <div _ngcontent-vgl-c16="" class="container">
   <div _ngcontent-vgl-c16="" class="row">
     <div _ngcontent-vgl-c16="" class="col-12">
      <div _ngcontent-vgl-c16="" class=" h4 text-center bolder mt-3">
        <span _ngcontent-vgl-c16="">
         <i _ngcontent-vgl-c16="" class="fa fa-chevron-left  text-gray   text-left float-left" style="cursor: pointer; "></i>
          </span>
          <span _ngcontent-vgl-c16="" class="headingH1"> CHECKOUT </span>
       </div>
     </div>
   </div>
  </div>
    <div _ngcontent-vgl-c16="" class="container-fluid bg-white">
        <div _ngcontent-vgl-c16="" class="row">
            
        </div>
        <div _ngcontent-vgl-c16="" class="container">
           
          <div _ngcontent-vgl-c16="" class="row px-0 px-sm-0">
        
          </div>
            <form class="was-invalidated is-invalid ng-untouched ng-pristine ng-invalid" action="my_baskit.php" method="post">
            <div _ngcontent-vgl-c16="" class=" row ">
                
            <div _ngcontent-vgl-c16="" class="container">
            <div _ngcontent-vgl-c16="" class="row px-0 px-sm-0">
            <div _ngcontent-vgl-c16="" class="col-12 col-md-6 mx-auto shadow-sm px-0 b-3 mt-1">
             <div _ngcontent-vgl-c16="" class=" card col-12 py-3 px-4 bg-white">
            <div _ngcontent-vgl-c16="" class="form-section">
             <div _ngcontent-vgl-c16="" class="form-section-head mb-4">
              <div _ngcontent-vgl-c16="" class="seperator-line mr-auto ml-auto">
                <div _ngcontent-vgl-c16="" class="bg-white seperator-text px-3 bold "> Who are we delivering to? 
                   </div>
                                                                                        
              </div>
                  
             </div>
                 
              <div _ngcontent-vgl-c16="" class="form-group">
                  <label _ngcontent-vgl-c16="" for="deliveryToName "> Name </label>
                  <input required type="text" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="deliveryToName"  name="name" placeholder="First name is fine" ><!---->
                  </div>
               <div _ngcontent-vgl-c16="" class="form-group">
               <label _ngcontent-vgl-c16="" for="emailAddress" required="">Email Address</label>
                <input required type="email" class="form-control ng-untouched ng-pristine ng-invalid" name="email" placeholder="To send your confirmation"><!----></div>
                   <div _ngcontent-vgl-c16="" class="form-section-head mb-4 mt-5">
                <div _ngcontent-vgl-c16="" class="seperator-line mr-auto ml-auto">
                  <div _ngcontent-vgl-c16="" class="bg-white seperator-text px-3 bold"> Where should we deliver it? 
                      </div>
                     </div>
                  </div><div _ngcontent-vgl-c16="" class="form-group">
                    <label _ngcontent-vgl-c16="" for="homeAddress">Full Address </label>
                   <input required type="text" class="form-control ng-untouched ng-pristine ng-invalid" name="address" placeholder="Address With House Number" ><!---->
                  
                  </div>
                   
                    <div _ngcontent-vgl-c16="" class="form-group">
                    <label _ngcontent-vgl-c16="" for="deliveryInstruction"> Delivery Note's </label>
                     <input _ngcontent-vgl-c16="" class="form-control ng-untouched ng-pristine ng-valid" name="note" placeholder="Any instructions for your driver" type="text"><!----></div>
            </div>
             </div>
            </div>
            <div _ngcontent-vgl-c16="" class="col-12 col-md-7 mx-auto  px-0 px-sm-5 b-3 mt-3"><div _ngcontent-vgl-c16="" class=" card col-12   py-3 px-4 bg-white">
            <div _ngcontent-vgl-c16="" class="form-section-head mb-4 mt-2">
            <div _ngcontent-vgl-c16="" class="seperator-line mr-auto ml-auto">
            <div _ngcontent-vgl-c16="" class="bg-white seperator-text px-3 bold"> How would you like to pay? </div>                                                                           
            </div>
            </div>
           <div _ngcontent-vgl-c16="" class="col-12 col-md-12 mx-auto shadow-sm px-0 mb-3 mt-2  ">
            <div _ngcontent-vgl-c16="" class=" card col-12 pt-3 pb-2 mb-2 ">
             <div _ngcontent-vgl-c16="" class="form-group col-12 align-middle row  ">
              <div  class="form-check">
                      
              <input type="radio" class="form-check-input" id="radio1" name="payment_type" value="bank">
              <label _ngcontent-vgl-c16="" class="pl-5   form-check-label col-6 px-0 " for="radio1"> Pay with card </label>
                  <span _ngcontent-vgl-c16="" class="text-right float-right col-6 px-0 pr-2">
                   <img _ngcontent-vgl-c16="" height="70%" src="visa.png" width="70%">
                  </span>
                 </div>
             </div>
            </div>
               <div _ngcontent-vgl-c16="" class=" card col-12 pt-3 pb-2 ">
                 <div _ngcontent-vgl-c16="" class="form-group col-12 align-middle row ">
                <div  class="form-check">
                
                <input type="radio" class="form-check-input" id="radio2" name="payment_type" value="cod">
                 <label _ngcontent-vgl-c16="" class=" pl-5 form-check-label col-5 px-0 " for="radio2">
                 <span _ngcontent-vgl-c16="" class="text-right float-left col-3 px-0 pr-3 cash d-none d-md-block  ">
                 <img _ngcontent-vgl-c16="" height="100%" src="money-bill.png" width="100%"></span> Cash </label>
               <span _ngcontent-vgl-c16="" class=" text-right col-7 px-0 pr-2"> Cash on delivery </span>
                </div>
                </div></div></div><!----><!----></div></div><div _ngcontent-vgl-c16="" class="col-12 col-md-6 mx-auto shadow-sm px-0 mb-3 mt-5 ">
               <div _ngcontent-vgl-c16="" class=" card col-12 py-3 px-4 bg-white">
                   <input type="hidden" name="total" value="<?=$total=$total ?? ''?>">
                <button _ngcontent-vgl-c16="" class="btn btn-success btn-block float-center mr-auto ml-auto btn-lg" id="submitBtn" type="submit" name="total" value="<?=$total=$total ?? ''?>"> Place your order (Rs.<?=$total?>) </button>
                 </div>
                 </div>
                 </div>
                 </div>
                </div>
                 </form>
                 </div>
               <div _ngcontent-vgl-c16="" class="col-12 mx-auto">
                 <p _ngcontent-vgl-c16="" class="mx-auto text-center text-gray"> By placing your order, you agree to our <br _ngcontent-vgl-c16="">
                    <a _ngcontent-vgl-c16="" class="text-gray" routerlink="/pizza-hut-privacy-policy" href="/pizza-hut-privacy-policy">terms &amp; conditions and privacy policy. </a></p>
                     </div>
                    </div>
                </div>

</div>
<?php include_once 'footer.php'; 