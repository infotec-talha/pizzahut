<?php
session_start();
include_once 'header.php';
if(isset($_SESSION["baskit_cart"]) && !empty($_SESSION["baskit_cart"]) && isset($_GET["total"]))
    {
    $total=$_GET["total"];
    }
    elseif(isset($_POST["total"]))
    {
        $total=$_POST["total"];
        echo $total;
    }
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
           <div _ngcontent-vgl-c16="" class="col-12 col-md-6 mx-auto shadow-sm px-0 mb-3 mt-3 ">
             <div _ngcontent-vgl-c16="" class=" card col-12 py-3 px-4 bg-white ">
              <span _ngcontent-vgl-c16="">
               <i _ngcontent-vgl-c16="" class="fa fa-map-marker text-dark"></i> Delivering to 12 ARMY AVIATION AIRPORT ROAD, Bahawalpur </span></div>
              <div _ngcontent-vgl-c16="" class=" card col-12 py-3 px-4 bg-white ">
                     <span _ngcontent-vgl-c16=""><i _ngcontent-vgl-c16="" aria-hidden="true" class="fa fa-clock-o text-dark"></i> Order for: ASAP </span>
              </div>
           </div>
          </div>
            <form action="my_baskit.php" method="post" autocomplete="off" class="was-invalidated is-invalid ng-untouched ng-pristine ng-invalid" novalidate="">
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
               <input _ngcontent-vgl-c16="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="deliveryToName" id="deliveryToName" placeholder="First name is fine" type="text"><!---->
                  </div>
                <div _ngcontent-vgl-c16="" class="form-group">
                  <label _ngcontent-vgl-c16="" for="phoneNo"> Mobile</label>
                    <input _ngcontent-vgl-c16="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="phoneNo" id="phoneNo" placeholder="So we can contact you (03xxxxxxxxx)" type="text"><!---->
                 </div><div _ngcontent-vgl-c16="" class="form-group">
               <label _ngcontent-vgl-c16="" for="emailAddress" required="">Email Address</label>
                <input _ngcontent-vgl-c16="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="emailAddress" id="emailAddress" placeholder="To send your confirmation" type="email"><!----></div>
                   <div _ngcontent-vgl-c16="" class="form-section-head mb-4 mt-5">
                <div _ngcontent-vgl-c16="" class="seperator-line mr-auto ml-auto">
                  <div _ngcontent-vgl-c16="" class="bg-white seperator-text px-3 bold"> Where should we deliver it? 
                      </div>
                     </div>
                  </div><div _ngcontent-vgl-c16="" class="form-group">
                    <label _ngcontent-vgl-c16="" for="homeAddress"> Address Line 1 </label>
                   <input _ngcontent-vgl-c16="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="homeAddress" id="homeAddress" placeholder="House number or name" required="" type="text"><!----></div>
                    <div _ngcontent-vgl-c16="" class="form-group">
                   <label _ngcontent-vgl-c16="" for="homeAddress2"> Address Line 2 </label>
                     <input _ngcontent-vgl-c16="" class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="homeAddress2" id="homeAddress2" placeholder="Address Line 2 (Optional)" type="text"><!----></div>
                    <div _ngcontent-vgl-c16="" class="form-group">
                    <label _ngcontent-vgl-c16="" for="deliveryInstruction"> Delivery Instructions (optional) </label>
                     <input _ngcontent-vgl-c16="" class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="deliveryInstructions" id="deliveryInstruction" placeholder="Any instructions for your driver" type="text"><!----></div>
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
              <div _ngcontent-vgl-c16="" class="col-12 form-check-inline px-0 ">
              <input _ngcontent-vgl-c16=""  id="paymentMode" type="radio" value="pwd">
              <span _ngcontent-vgl-c16="" checked="checked" class="checkmark "></span>
              <label _ngcontent-vgl-c16="" class="pl-5   form-check-label col-6 px-0 " for="paymentMode"> Pay with card </label>
                  <span _ngcontent-vgl-c16="" class="text-right float-right col-6 px-0 pr-2">
                   <img _ngcontent-vgl-c16="" height="70%" src="visa.png" width="70%"></span>
                 </div></div></div><div _ngcontent-vgl-c16="" class=" card col-12 pt-3 pb-2 ">
                 <div _ngcontent-vgl-c16="" class="form-group col-12 align-middle row ">
                <div _ngcontent-vgl-c16="" class="col-12 form-check-inline px-0">
               <input _ngcontent-vgl-c16="" class="form-check-input pl-2 col-2 hide ng-untouched ng-pristine ng-valid" formcontrolname="paymentMode" id="paymentMode2" type="radio" value="cod">
                 <span _ngcontent-vgl-c16="" class="checkmark   "></span>
                 <label _ngcontent-vgl-c16="" class=" pl-5 form-check-label col-5 px-0 " for="paymentMode2">
                 <span _ngcontent-vgl-c16="" class="text-right float-left col-3 px-0 pr-3 cash d-none d-md-block  ">
                 <img _ngcontent-vgl-c16="" height="100%" src="money-bill.png" width="100%"></span> Cash </label>
               <span _ngcontent-vgl-c16="" class=" text-right col-7 px-0 pr-2"> Cash on delivery </span></div>
                </div></div></div><!----><!----></div></div><div _ngcontent-vgl-c16="" class="col-12 col-md-6 mx-auto shadow-sm px-0 mb-3 mt-5 ">
               <div _ngcontent-vgl-c16="" class=" card col-12 py-3 px-4 bg-white"><!----><!---->
               <button _ngcontent-vgl-c16="" class="btn btn-success btn-block float-center mr-auto ml-auto btn-lg" id="submitBtn" type="submit" name="total" value="<?=$total?>"> Place your order (Rs.<?=$total?>) </button>
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