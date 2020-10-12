<?php
include_once 'header.php';
include_once 'functions.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 $date_from=$_POST["start_date"];
 $date_to=$_POST["end_date"];
 if(isset($date_from) && isset($date_to))
     {
     $link= databaseCon();
     $sql="select * from transactions where date between date('$date_from') and date('$date_to')";
     $transaction_result= executeQuery($link,$sql);
     }
}
?>
<h5>Select Date:</h5>
<form action="transaction_statemaent.php" method="post">
<div class="row">
    
         <div class="form-group col-4"></div>
        
         <div class="form-group col-4">
             
             <label for="name">From:</label>
             <input required type="date" class="form-control"  name="start_date">
            
         </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <label for="name">To:</label>
             <input required type="date" class="form-control"  name="end_date">
         </div>
     <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <input type="submit" value="Submit" name="submit" class="btnSubmit">
         </div>
</div>
</form>

<table id="example" class="table" style="width: 100%;">
    
        
            
        
    
  <thead>
   
    <tr role="row">
     
      <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th>
      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Order Id</th>
      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Cash In</th>
      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Date</th>
      
      
    </tr>
  </thead>
  <tbody>
      
    <?php if(isset($transaction_result))
    {while($row= mysqli_fetch_assoc($transaction_result)){?>
    <tr role="row" class="odd">
      <td><?=$row["id"]?></td>
      <td><?=$row["order_id"]?></td>
      <td><?=$row["cash_in"]?></td>
      <td><?=$row["date"]?></td>
      
   
    </tr>
    <?php }}?>
   
      
   
    
     
  </tbody>
</table>

 <div class="row">
     <div class="form-group col-4"></div>
     <div class="form-group col-4">
         <h6></h6>
     </div>
     <div class="form-group col-4"></div>
 </div>
 <br>
 <br>
