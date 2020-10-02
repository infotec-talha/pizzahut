<?php
session_start();
include_once "header.php";
include_once 'functions.php';
if(isset($_SESSION["order_total"])){
   $order_id=$_SESSION["order_total"]["order_id"];
   $total=$_SESSION["order_total"]["total"];
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["account_number"]))
{

         $transaction=$_POST["transaction"];
         $description="'".$_POST["description"]."'";
         $account_number=$_POST["account_number"];
         if(isset($account_number)){
         $balance= get_current_balance($account_number);
         $withdrawal=withdrawal($description,$balance,$transaction,$account_number);
        
        if($withdrawal=="your balance amount is less then withdrawal")
        {
          $html='<small class="text-danger">your balance account is less then withdrawal!</small>';
        }
        else{
            $transaction= transaction($order_id,$transaction);
            unset($_SESSION["order_total"]);
            $html='<small class="text-success">you ordered  successfully!</small>';
        }
        }
        }
        }
?>

<div class="container">
    <h4>Check Out:</h4>

  
     <form action="amount_transaction.php" method="post">
 
    
<div class="row">
   
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
            
            
         </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <label for="name">Account Number:</label>
             <input required type="number" class="form-control" name="account_number">
         </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <label for="name">Checkout Amount:</label>
             <input required type="number" class="form-control" name="transaction" value="<?=$total=$total ??  ""?>">
         </div>
          <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <label for="name">Description:</label>
             <input required type="text" class="form-control" name="description">
         </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-1">
            
             
         </div>
         <div class="form-group col-1">
            
         </div>
         
         <div class="form-group col-6"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-1">
             <button type="submit" class="btn btn-primary ">Checkout</button>
             <?php if(isset($html)) echo $html;?>
         </div>
          
        
</div>
  </form> 
    
    </div>

    
  
 


<?php include_once 'footer.php';