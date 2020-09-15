<?php
include_once 'header.php';
include_once 'main_menu.php';
include_once 'functions.php';
$select_product=select_product("deals");
?>


<div _ngcontent-stv-c17="" class="row">
            <div _ngcontent-stv-c17="" class="col-12 col-sm-12 px-0 mx-0 px-md-3 ml-sm-3 ml-md-0 mb-5 mb-md-0">
                <div _ngcontent-stv-c17="" class="row py-3 px-0"><!---->
                     <?php while($row= mysqli_fetch_assoc($select_product)){?>
                    <div _ngcontent-stv-c17="" class="col-12 col-md-12 col-lg-6 px-1 product-card-wrapper">
                        <div _ngcontent-stv-c17="" class="card p-0 mt-2 mx-0 shadow-sm">
                            <img _ngcontent-stv-c17="" class="card-img-top bg-dark" src="<?='data:image/jpeg;base64,'.base64_encode( $row['image'] );?>" >
                            <div _ngcontent-stv-c17="" class="card-body px-2 pt-1">
                                <div _ngcontent-stv-c17="" class="d-inline bold deal-name"> <h5><?=$row['name']?></h5></div>
                                <div _ngcontent-stv-c17="" class="col-12 p-0 m-0 ">
                                    <p _ngcontent-stv-c17="" class="card-text col-12 px-1 px-0 deal-desc text-gray "> <?=$row['size']?></p>
                                </div>
                            </div>
                            <div _ngcontent-stv-c17="" class="col-12 pirceSectionDeal">
                                <div _ngcontent-stv-c17="" class="card-footer bg-white py-1">
                                    <span _ngcontent-stv-c17="" class="float-right py-2 px-0 mr-n2 bold"> Rs.<?=$row['price']?><!----></span></div></div></div>
                    </div>
                     <?php }?>
                                
</div>
            </div>
</div>


 <?php include_once 'footer.php';

