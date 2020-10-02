<?php

function databaseCon()
{
$database='pizzahut';
$host='localhost';
$user='root';
$pass='';
$link= mysqli_connect($host, $user, $pass, $database);
if($link===false)
  die(mysqli_connect_error ());
return $link;
}
function executeQuery($link,$query)
{
  $result=mysqli_query($link,$query);
  if($result===false)
     die(mysqli_error ($link));
  return $result;        
}
function product_insert($name,$price,$size,$type,$image_data,$description,$image_type)
{
   $link=databaseCon();
   $sql="insert into products(name,price,size,type,image,product_description,image_data) values($name,$price,$size,$type,'$image_data',$description,'$image_type')"; 
   $result= executeQuery($link, $sql);
   return $result;
}
function update_image_database($image_data,$image_type,$id)
{
      $link=databaseCon();
      $sql = "update products set image='$image_data',image_data='$image_type' where id=$id";
      $result= executeQuery($link, $sql);
      return $result;
}
function select_product($type)
{
    $link=databaseCon();
    $sql="select * from products where type='$type'";
    $result= executeQuery($link, $sql);
    return $result;
}
function add_product($id)
{
         $sql="select price,name,product_details.id,product_details.product_id,size from product_details 
            inner join products on products.id=product_details.product_id
            where product_details.id=$id";
$link= databaseCon();
$result_product_detail= executeQuery($link, $sql);
$row2= mysqli_fetch_assoc($result_product_detail);
$product_id=$row2['product_id'];
$name=$row2["name"];
$price=$row2["price"];
$size=$row2["size"];
$time=time();
$baskit = array(
$time=>array(    
 'id'=>$id,
 'product_id'=>$product_id,  
 'name'=>$name,
 'price'=>$price,
 'size'=>$size,   
 'time'=>$time       
));
return $baskit;
}
function insert_into_customer($name,$email,$address)
{
   $link= databaseCon();
   $sql="insert into customer(full_name,email,address) values($name,$email,$address)";
   $result= executeQuery($link, $sql);
   return $result;
}
function get_customer_id($email,$customer_name,$cus_address)
{
 $link= databaseCon();
 $sql="select id from customer where email=$email";
 $result=executeQuery($link, $sql);
 $row= mysqli_num_rows($result);
 // if customer already exists
 if($row>0)
 {
     $row_id= mysqli_fetch_assoc ($result);
     $customer_id=$row_id['id'];
     return $customer_id;
 }   
 else
 {
    $is_success= insert_into_customer($customer_name,$email,$cus_address);
     $customer_id = mysqli_insert_id($link);
     // close connection before return
     mysqli_close($link);
     return $customer_id;

 }
 
   
 
}
function insert_order($customer_id,$delivery_note,$status)
{
    $order_id = 0;
    $link= databaseCon();
    $sql="insert into orders(customer_id,delivery_note,status) values($customer_id,$delivery_note,$status)";
    $insert_obj=executeQuery($link, $sql);
    if($insert_obj ===false){
              
          }
          else{
             $order_id =  mysqli_insert_id($link);
          }
          
          mysqli_close($link);
    return $order_id;
}
function transaction($order_id,$total)
{
    $link= databaseCon();
    $sql="insert into transactions(order_id,cash_in) values($order_id,$total)";
    $transaction=executeQuery($link, $sql);
    return $transaction;
}
function withdrawal($description,$balance,$transaction,$account_number)
{
    if($balance<$transaction)
    {
        $html="your balance amount is less then withdrawal";
        return $html;  
    }
    else
    {
        $total=$balance-$transaction;
        $sql="insert into transactions(description,withdrawals,balance,account_number) values($description,$transaction,$total,$account_number)";
        $link= bank_database_con();
        $transaction_insert= executeQuery($link, $sql);
    }
}
function bank_database_con()
{
$database='talhaBank';
$host='localhost';
$user='root';
$pass='';
$link= mysqli_connect($host, $user, $pass, $database);
if($link===false)
  die(mysqli_connect_error ());
return $link;
}
function get_current_balance($account_number)
{
         $link= bank_database_con();
         $sql="SELECT sum(deposits) - sum(withdrawals) as current_bal FROM transactions WHERE transactions.account_number=$account_number";
         $result= executeQuery($link, $sql);
         $current_balance= mysqli_fetch_assoc($result);
         $balance=$current_balance["current_bal"];
         return $balance;
}