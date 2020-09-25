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
         $sql="select price,name,product_details.id from product_details 
            inner join products on products.id=product_details.product_id
            where product_details.id=$id";
$link= databaseCon();
$result_product_detail= executeQuery($link, $sql);
$row2= mysqli_fetch_assoc($result_product_detail);

$name=$row2["name"];
$price=$row2["price"];
$time=time();
$baskit = array(
$time=>array(    
 'id'=>$id,   
 'name'=>$name,
 'price'=>$price,
 'time'=>$time       
));
return $baskit;
}
//function remove_product()
//{
//    
//}