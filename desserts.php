<?php

include_once 'header.php';
include_once 'main_menu.php';
include_once 'functions.php';
$select_product=select_product("desserts");
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
                                    <div _ngcontent-pre-c8="" class="col-12 row py-auto pr-0 produduct-price-section">
                                     <div _ngcontent-pre-c8="" aria-expanded="true" class="col-7 card-header bg-white border-0 px-2 collapsed py-0" data-toggle="collapse" data-target="#collapseOne0">
                                         <span _ngcontent-pre-c8="" class="product-name pl-2"> Chicken Tikka </span>
                                     </div>
                                         <div _ngcontent-pre-c8="" class="col-4 px-0 text-right pr-2 product-price"> Rs.410 </div>
                                         <div _ngcontent-pre-c8="" class="col-1 px-0 btn p-0 mt-n1">
                                             <span  class="closeBtn opacity-25"> x </span></div>
                                    </div>
                                             <div  class="col-12 py-0 mt-n1">
                                                 <div  class="card-body collapse py-0 border-0" data-parent="#accordion" id="collapseOne0">
                                                     <p  class="d-inline text-dark small product-name opacity50">Pan Small</p></div></div>
                                </div></div></div></div></li><!----></ul>
            <div _ngcontent-pre-c8="" class="d-block mt-4">
                                   </div>
                                    <div _ngcontent-pre-c8="" class="col-12 mb-n3 p-2 py-4 basket-bottom-area">
                                                <div _ngcontent-pre-c8="" class="border mt-4 px-0 mx-0 px-auto shadow-sm w-100 border-left-0">
                                                <div _ngcontent-pre-c8="" class="col-12 row px-4 py-3">
                                                    <div class="col-6 text-left px-2 "> Subtotal </div>
                                                    <div _ngcontent-pre-c8="" class="col-6 text-right px-2"> Rs.410
                                                    </div>
                                                    
                                                </div>
                                                        
                                            </div>
                                        <div _ngcontent-pre-c8="" class="row h6 pb-1 text-light py-2"><!---->
                                    
                                                    <div _ngcontent-pre-c8="" class="col-12 px-4 mt-4 "><!----><!---->
                                                        <button _ngcontent-pre-c8="" class="btn btn-block btn-success px-0 py-2">
                                                            <span _ngcontent-pre-c8="" class="text-center"> Checkout </span><!---->
                                                            <span _ngcontent-pre-c8="" class="float-right pr-3"> Rs.410 </span></button><!----></div></div>
                                    </div>
        </div></app-basket-right>
</div>
<div _ngcontent-stv-c20="" class="row">
    <div _ngcontent-stv-c20="" class="col-12 col-sm-12 px-0 mx-0 px-md-3 px-md-0">
        <div _ngcontent-stv-c20="" class="row py-3 px-0 mb-5 mb-md-3 mt-n2"><!---->
            <?php while($row= mysqli_fetch_assoc($select_product)){?>
            
            <div _ngcontent-stv-c20="" class="col-6 col-sm-4 col-md-4 col-lg-3 px-1 product-card-wrapper">
                <div _ngcontent-stv-c20="" class="card mt-2 product-card">
                    <div _ngcontent-stv-c20="" clas="crdTop"><img _ngcontent-stv-c20="" class="card-img-top bg-dark" min-height="100px" width="100%" src="<?='data:image/jpeg;base64,'.base64_encode( $row['image'] );?>" ></div>
                    <div _ngcontent-stv-c20="" class="card-body px-2">
                        <div _ngcontent-stv-c20="" class="title h5 mb-1 text-capitalize product-name"><?=$row['name'];?></div>
                        <div _ngcontent-stv-c20="" class="col-dblock product-descripton">
                            <p _ngcontent-stv-c20="" class="card-text col-12 px-1"><?=$row['product_description'];?></p></div>
                            <div _ngcontent-stv-c20="" class="d-block pt-4 pt-md-2 pb-1 "> Select Size &amp; Type </div>
                            <select class="browser-default custom-select">
                                <option _ngcontent-stv-c20="" value="<?=$row['size'] ? 'selected' : ''; ?>"> <?=$row['size'];?> </option>
                            </select></div>
                    <div _ngcontent-stv-c20="" class="card-footer bg-white border-0 px-2"><button _ngcontent-stv-c20="" class="btn btn-sm btn-block btn-success d-block py-2">
                            <div _ngcontent-stv-c20="" class="row p-0 m-0"><div _ngcontent-stv-c20="" class="col-6 p-0 m-0 text-center text-md-right"> Add </div><!---->
                                <div _ngcontent-stv-c20="" class="col-6 p-0 m-0 float-right text-right"> Rs.<?=$row['price']?></div><!----></div>
                        </button></div>
                    
                </div>
            </div>
            <?php }?>
        </div>
</div>
</div>
<?php include_once 'footer.php';


